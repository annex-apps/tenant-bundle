<?php

namespace Annex\TenantBundle\Controller;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Migrations\Configuration\Configuration;
use Doctrine\DBAL\Migrations\Migration;
use Doctrine\DBAL\Migrations\OutputWriter;

use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Filesystem\Filesystem;

use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

class LaunchController extends Controller
{

    /**
     * Need to clear the cache due strange Heroku behaviour where not all proxies come up with wake-up
     * @Route("update", name="auto_update")
     */
    public function updateDatabase(Request $request)
    {
        // Make any DB updates required
        $this->updateSchema();

        return $this->redirect($this->generateUrl('settings'));
    }

    /**
     * Signup is required before launch to create an empty database and entry in tenant
     * @Route("launch", name="launch")
     */
    public function deployNewDatabase(Request $request)
    {

        $accountCode = preg_replace("/[^a-z0-9]+/i", "", strtolower($request->get('accountCode')));

        $em = $this->getDoctrine()->getManager();

        /** @var \Annex\TenantBundle\Repository\TenantRepository $tenantRepo */
        $tenantRepo = $em->getRepository('AnnexTenantBundle:Tenant');

        /** @var \Annex\TenantBundle\Services\Brightpearl\Utility $utilityService */
        $utilityService = $this->get('service.brightpearl.utility');

        $appDomain = $this->getParameter('app_info.domain');

        /** @var $tenant \Annex\TenantBundle\Entity\Tenant */
        if (!$tenant = $tenantRepo->findOneBy(['brightpearlAccountCode' => $accountCode])) {
            die("Could not find an account for ".$accountCode);
        }

        // Go to Brightpearl to see if this user has installed the app
        if (!$token = $utilityService->getBrightpearlToken($accountCode)) {
            die("Failed to get install info from Brightpearl");
        }

        $tenant->setBrightpearlToken($token);
        $em->persist($tenant);

        try {
            $em->flush();

            // We need to already have an empty database
            // Run any migrations that need running
            $this->updateSchema();
            $this->addAdminUser();
            $this->addUser();

            $this->sendActivationEmail($tenant);

        } catch (\Exception $e) {

        }

        return $this->redirect("http://{$accountCode}.{$appDomain}/login?launched=1");
    }

    /**
     * @param \Annex\TenantBundle\Entity\Tenant $tenant
     */
    private function sendActivationEmail($tenant) {

        try {

            $client = new PostmarkClient($this->getParameter('postmark_api_key'));
            $message = $this->renderView(
                'emails/basic.html.twig',
                [
                    'message' => 'Account "'.$tenant->getName().'" activated'
                ]
            );
            $client->sendEmail(
                "system@annex-apps.com",
                "system@annex-apps.com",
                "Annex account activated",
                $message
            );

        } catch (\Exception $generalException) {

        }

    }

    /**
     * Add the root user (to a new account)
     */
    public function addAdminUser()
    {
        $manager = $this->get('fos_user.user_manager');

        /** @var \Annex\TenantBundle\Entity\Contact $user */
        $user = $manager->createUser();

        $user->setFirstName('Admin');
        $user->setLastName('Admin');
        $user->setUsername('admin@annex-apps.com');
        $user->setEmail('admin@annex-apps.com');
        $user->addRole("ROLE_ADMIN");
        $user->addRole("ROLE_SUPER_USER");
        $user->setEnabled(true);

        $pass  = $this->generatePassword();
        $user->setPlainPassword($pass);

        $this->addFlash('success', $pass);

        // Send the password to admin
        try {
            $client = new PostmarkClient($this->getParameter('postmark_api_key'));
            $message = $this->renderView(
                'TenantBundle::emails/welcome.html.twig',
                [
                    'email'    => 'admin@annex-apps.com',
                    'password' => $pass
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                'admin@annex-apps.com',
                "Annex Apps account ".$this->get('session')->get('account_code')." has been deployed.",
                $message
            );
        } catch (\Exception $generalException) {
            $this->addFlash('error', 'Failed to send admin email:' . $generalException->getMessage());
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

    }

    /**
     * Add the first staff member (using details from _core)
     */
    public function addUser()
    {

        $pass  = $this->generatePassword();
        $name  = explode(' ', $this->get('session')->get('account_owner_name'));
        $email = $this->get('session')->get('account_owner_email');

        $firstName = $name[0];
        $lastName  = '';
        if (isset($name[1])) {
            $lastName = $name[1];
        }

        $manager = $this->get('fos_user.user_manager');

        /** @var \Annex\TenantBundle\Entity\Contact $user */
        $user = $manager->createUser();

        $user->setFirstName( $firstName );
        $user->setLastName( $lastName );
        $user->setUsername( $email );
        $user->setEmail( $email );
        $user->addRole("ROLE_ADMIN");
        $user->setEnabled(true);
        $user->setPlainPassword($pass);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        try {
            $client = new PostmarkClient($this->getParameter('postmark_api_key'));
            $message = $this->renderView(
                'TenantBundle::emails/welcome.html.twig',
                [
                    'email' => $email,
                    'password' => $pass
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                $email,
                "Your Annex Apps account has been activated.",
                $message
            );
        } catch (\Exception $generalException) {
            $this->addFlash('error', 'Failed to send email:' . $generalException->getMessage());
        }

    }

    public function updateSchema()
    {
        $to = null;
        $nl = '<br>';

        $db = $this->get('database_connection');

        $config = new Configuration($db);

        $config->setMigrationsTableName('migration_versions');
        $config->setMigrationsNamespace('Application\\Migrations');
        $config->setMigrationsDirectory('../app/DoctrineMigrations');
        $config->registerMigrationsFromDirectory($config->getMigrationsDirectory());

        $migration = new Migration($config);

        try {
            $migration->migrate($to);
            return true;
        } catch (\Exception $ex) {
            echo 'ERROR: ' . $ex->getMessage() . $nl;
            die();
        }
    }

    /**
     * @return string
     */
    private function generatePassword()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * @Route("welcome-test", name="welcome_test")
     */
    public function welcomeTest()
    {
        try {
            $client = new PostmarkClient($this->getParameter('postmark_api_key'));
            $message = $this->renderView(
                'TenantBundle::emails/welcome.html.twig',
                [
                    'email' => 'hello@annex-apps.com',
                    'password' => 'testpass'
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                'hello@annex-apps.com',
                "Your Annex Apps account has been activated.",
                $message
            );
        } catch (\Exception $generalException) {
            $this->addFlash('error', 'Failed to send email:' . $generalException->getMessage());
        }

        return $this->redirect($this->generateUrl('fos_user_security_login'));
    }

}
