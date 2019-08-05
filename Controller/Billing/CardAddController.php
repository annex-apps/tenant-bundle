<?php

namespace Annex\TenantBundle\Controller\Billing;

use Annex\TenantBundle\Entity\Tenant;
use Annex\TenantBundle\Form\SubscribeType;
use Postmark\Models\PostmarkException;
use Postmark\PostmarkClient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CardAddController extends Controller
{

    /**
     * @Route("new-card-success", name="new_card_success")
     */
    public function billingPaymentSuccess(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        // Create the same form we have on the billing page
        $form = $this->createForm(SubscribeType::class, null, [
            'action' => $this->generateUrl('billing_payment_success', ['account' => $tenant->getBrightpearlAccountCode()])
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $planCode       = $form->get('planCode')->getData();
            $subscriptionId = $form->get('subscriptionId')->getData();

            /** @var $plan \Annex\TenantBundle\Entity\Plan */
            if (!$plan = $tenantService->getPlans(['code' => $planCode])) {
                $this->addFlash('error', "Cannot find a plan with code {$planCode}");
                return $this->redirectToRoute('account_billing');
            }

            // Create a Subscription in local DB
            // Add to tenant and make tenant LIVE
            if ($tenantService->addSubscription($subscriptionId, $plan)) {
                $this->addFlash("success", "You're subscribed!");
            } else {
                $this->addFlash("error", "There was a problem activating your subscription. We've taken payment OK - please get in touch.");
            }

            $this->sendBillingConfirmationEmail($tenant);
        }

        return $this->redirectToRoute('account_billing');
    }

    /**
     * @param Tenant $tenant
     */
    private function sendBillingConfirmationEmail(Tenant $tenant)
    {
        try {
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView('AnnexTenantBundle::emails/billing_welcome.html.twig',
                ['tenant' => $tenant]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                $tenant->getOwnerEmail(),
                "Thanks for signing up",
                $message
            );

            // And one to admin
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                "hello@annex-apps.com",
                "Thanks for signing up",
                $message
            );
        } catch (PostmarkException $ex) {
            $this->addFlash('error', 'Failed to send email:' . $ex->message . ' : ' . $ex->postmarkApiErrorCode);
        } catch (\Exception $generalException) {
            $this->addFlash('error', 'Failed to send email:' . $generalException->getMessage());
        }
    }
}