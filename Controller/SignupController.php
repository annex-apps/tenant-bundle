<?php

namespace Annex\TenantBundle\Controller;

use Annex\TenantBundle\Entity\Tenant;
use Annex\TenantBundle\Form\SignupType;
use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SignupController extends Controller
{

    /**
     * @Route("signup", name="signup")
     */
    public function signupAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        /** @var \Annex\TenantBundle\Repository\TenantRepository $repo */
        $repo = $em->getRepository('AnnexTenantBundle:Tenant');

        $appDomain = $this->getParameter('app_info.domain');

        if (!$trialDays = $this->getParameter('app_info.trial_days')) {
            $trialDays = 30;
        }

        $form = $this->createForm(SignupType::class, null, []);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            // Create a new tenant
            $tenant = new Tenant();

            // Clean / get the input
            $subDomain  = strtolower($form->get('brightpearlAccount')->getData());
            $dataCentre = $form->get('brightpearlDataCentre')->getData();
            $subDomain  = preg_replace('/[^a-z0-9]+/i', "", $subDomain);

            $toEmail   = $form->get('email')->getData();
            $ownerName = $form->get('name')->getData();
            $ownerCompany = $form->get('company')->getData();

            // Remove any common typos from the email
            $toEmail = str_replace(" .Com", ".com", $toEmail);

            /** @var $existingTenant \Annex\TenantBundle\Entity\Tenant */
            if ($existingTenant = $repo->findOneBy(['stub' => $subDomain])) {

                // Use it and re-send information
                $status   = $existingTenant->getStatus();

                if ($status == 'PENDING' || $status == 'DEPLOYING') {
                    $this->addFlash('error', "There's already an account for {$subDomain}. Please contact us to activate it.");
                } else {
                    $this->addFlash('error', "That account has already been activated.");
                    return $this->redirectToRoute('signup');
                }

            } else {

                $tenant->setCreatedAt(new \DateTime());

                $dbSchema = $this->getParameter('app_info.tenant_db_stub').'_'.$subDomain;
                $tenant->setDbSchema($dbSchema);

                $tenant->setStub($subDomain);
                $tenant->setBrightpearlAccountCode($subDomain);
                $tenant->setBrightpearlDataCentre($dataCentre);

                // User info
                $tenant->setName($ownerCompany);
                $tenant->setOwnerEmail($toEmail);
                $tenant->setOwnerName($ownerName);

                // Trial expiry
                $trialExpiresAt = new \DateTime();
                $trialExpiresAt->modify("+{$trialDays} days");
                $tenant->setTrialExpiresAt($trialExpiresAt);

                $em->persist($tenant);

                try {
                    $em->flush();

                    $activationUrl = 'http://'.$appDomain.'/launch?accountCode='.$subDomain;
                    $this->sendActivationEmail($activationUrl, $toEmail);

                    // Send email to admin
                    $this->sendAdminEmail($activationUrl, $subDomain, $toEmail);

                    // Create them an empty database
                    if (isset($dbSchema)) {
                        $db = $this->get('database_connection');
                        $db->executeQuery('CREATE DATABASE '.$dbSchema.' CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
                    }

                    $this->addFlash('success', "We've sent an email to ".$toEmail." with a link to activate your account.");

                } catch (\Exception $e) {
                    $this->addFlash('debug', $e->getMessage());
                    $this->addFlash('error', "There was an error creating your account.");
                }

            }

            return $this->redirectToRoute('signup_success');

        }

        return $this->render('AnnexTenantBundle::signup.html.twig', array(
            'form' => $form->createView()
        ));

    }

    /**
     * Show the signup success page
     * @Route("signup/success", name="signup_success")
     */
    public function signupSuccessAction(Request $request)
    {
        return $this->render('AnnexTenantBundle::signup_success.html.twig', array(

        ));
    }

    /**
     * @param $activationUrl
     * @param $toEmail
     */
    private function sendActivationEmail($activationUrl, $toEmail)
    {

        try {
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'AnnexTenantBundle::emails/activate.html.twig',
                [
                    'activationUrl' => $activationUrl
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                $toEmail,
                "Activate your Annex Apps account",
                $message
            );
        } catch (\Exception $generalException) {
            $this->addFlash('error', 'Failed to send email:' . $generalException->getMessage());
        }
    }

    /**
     * @param $activationUrl
     */
    private function sendAdminEmail($activationUrl, $domain, $email)
    {
        try {
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'AnnexTenantBundle::emails/activate.html.twig',
                [
                    'activationUrl' => $activationUrl
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                'system@annex-apps.com',
                "Annex sign up {$domain} / {$email}",
                $message
            );
        } catch (\Exception $generalException) {
            $this->addFlash('error', 'Failed to send email:' . $generalException->getMessage());
        }
    }

}
