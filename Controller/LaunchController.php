<?php

namespace Annex\TenantBundle\Controller;

use Annex\TenantBundle\Entity\Setting;
use Annex\TenantBundle\Entity\Tenant;
use Doctrine\DBAL\Migrations\Configuration\Configuration;
use Doctrine\DBAL\Migrations\Migration;
use Doctrine\DBAL\Migrations\OutputWriter;

use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LaunchController extends Controller
{
    /**
     * Signup is required before launch to create an empty database and entry in tenant
     * @Route("launch", name="launch")
     */
    public function launchTenant(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->container->get('annex_tenant.tenant_information');

        /** @var $tenant \Annex\TenantBundle\Entity\Tenant */
        if (!$tenant = $tenantService->getTenant($this->get('session')->get('tenantId'))) {
            die("Could not find an account for ".$request->get('accountCode'));
        }

        /** @var \Annex\TenantBundle\Services\Brightpearl\Utility $utilityService */
        $utilityService = $this->get('service.brightpearl.utility');
        $utilityService->setTenant($tenant);

        $appDomain = $this->getParameter('app_info.tld');

        // Go to Brightpearl to see if this user has installed the app
        if (strstr($tenant->getBrightpearlAccountCode(), 'testsignup')) {
            $token = 'none';
        } else if (!$token = $utilityService->getBrightpearlToken($tenant->getBrightpearlAccountCode())) {
            die("Failed to get installation data from Brightpearl - please ensure you have installed the app via Brightpearl before activating.");
        }

        // Already activated
        if ($tenant->getStatus() != 'PENDING') {
            return $this->redirect("http://{$tenant->getBrightpearlAccountCode()}.{$appDomain}/login");
        }

        // Save the token into the tenant database
        $tenant->setBrightpearlToken($token);
        $tenant->setStatus('TRIAL');

        if ($tenantService->updateTenant()) {

            // We need to already have an empty database
            // Run any migrations that need running
            $this->updateSchema();
            $this->addAdminUser($tenant);
            $this->addUser($tenant);
            $this->sendActivationEmail($tenant);

            if ($this->getParameter("kernel.environment") == 'prod') {
                return $this->redirect("http://{$tenant->getBrightpearlAccountCode()}.{$appDomain}/login?launched=1");
            } else {
                return $this->redirect("http://{$tenant->getBrightpearlAccountCode()}.localhost:8000/login?launched=1");
            }
        } else {
            die("Could not update tenant with token");
        }

    }

    /**
     * @param \Annex\TenantBundle\Entity\Tenant $tenant
     */
    private function sendActivationEmail($tenant) {

        try {

            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'emails/basic.html.twig',
                [
                    'tenant' => $tenant,
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
     * @param $tenant Tenant
     * Add the root user (to a new account)
     */
    public function addAdminUser($tenant)
    {
        $manager = $this->get('fos_user.user_manager');

        /** @var \AppBundle\Entity\Contact $user */
        $user = $manager->createUser();

        $user->setFirstName('Admin');
        $user->setLastName('Admin');
        $user->setUsername('admin@annex-apps.com');
        $user->setEmail('admin@annex-apps.com');
        $user->addRole("ROLE_ADMIN");
        $user->addRole("ROLE_SUPER_USER");
        $user->setEnabled(true);

        if ($this->getParameter("kernel.environment") == 'prod') {
            $pass = $this->generatePassword();
        } else {
            $pass = 'test123';
        }
        $user->setPlainPassword($pass);

        // Send the password to admin
        try {
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'AnnexTenantBundle::emails/welcome.html.twig',
                [
                    'tenant' => $tenant,
                    'email'    => 'admin@annex-apps.com',
                    'password' => $pass
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                'admin@annex-apps.com',
                "Annex Apps account ".$tenant->getBrightpearlAccountCode()." has been deployed.",
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
     * Add the first staff member (using details from tenant table)
     * @param Tenant $tenant
     */
    public function addUser(Tenant $tenant)
    {

        $pass  = $this->generatePassword();
        $name  = explode(' ', $tenant->getOwnerName());
        $email = $tenant->getOwnerEmail();

        $firstName = $name[0];
        $lastName  = '';
        if (isset($name[1])) {
            $lastName = $name[1];
        }

        $manager = $this->get('fos_user.user_manager');

        /** @var \AppBundle\Entity\Contact $user */
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
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'AnnexTenantBundle::emails/welcome.html.twig',
                [
                    'tenant' => $tenant,
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

    /**
     * @return bool
     */
    public function updateSchema()
    {
        $to = null;
        $nl = '<br>';

        $db = $this->get('database_connection');

        $config = new Configuration($db);

        $config->setMigrationsTableName('migration_versions');
        $config->setMigrationsNamespace('Application\\Migrations');

        $appPath = $this->container->getParameter('kernel.root_dir');
        $config->setMigrationsDirectory($appPath.'/DoctrineMigrations');
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
     * @Route("email-test", name="email_test")
     */
    public function welcomeTest()
    {
        try {
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'AnnexTenantBundle::emails/welcome.html.twig',
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
