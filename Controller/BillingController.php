<?php

namespace Annex\TenantBundle\Controller;

use Annex\TenantBundle\Entity\Subscription;
use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BillingController extends Controller
{
    /**
     * Shows the page with cards and bills
     * @Route("/admin/billing", name="admin_billing")
     */
    public function billingPageAction(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        $plans = $tenantService->getPlans();

        $bills = [];
        return $this->render('AnnexTenantBundle::billing.html.twig', [
            'tenant' => $tenant,
            'bills'  => $bills,
            'plans'  => $plans,
            'stripe_public_key' => $this->getParameter('stripe_public_key')
        ]);
    }

    /**
     * @Route("/admin/billing/subscription/add", name="subscription_add")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addSubscriptionAction(Request $request)
    {

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        $plan = 'annex_notifier_basic';

        if ($token = $request->get('stripeToken') && $email = $request->get('stripeEmail')) {

            if (!$stripeCustomerId = $tenant->getStripeCustomerId()) {
                $newCustomerData = [
                    'description' => $tenant->getOwnerName(),
                    'email'       => $tenant->getOwnerEmail(),
                    'source'      => $token
                ];
                if (!$stripeCustomer = $stripeService->createCustomer($newCustomerData)) {
                    foreach ($stripeService->errors AS $error) {
                        $this->addFlash('error', $error);
                    }
                    return $this->redirectToRoute('admin_billing');
                }
                $stripeCustomerId = $stripeCustomer['id'];
            }

            // Update the tenant
            $tenant->setStripeCustomerId($stripeCustomerId);
            $tenantService->updateTenant();

            // Create a subscription
            if ($subscription = $stripeService->createSubscription($stripeCustomerId, $plan)) {
                $tenantService->addSubscription($subscription);
                $this->addFlash('success', "You're all set!");
            } else {
                foreach ($stripeService->errors AS $error) {
                    $this->addFlash('error', $error);
                }
            }

        }

        return $this->redirectToRoute('admin_billing');
    }

    /**
     * @Route("/admin/billing/subscription/{id}/cancel", name="subscription_cancel")
     */
    public function cancelSubscriptionAction($id)
    {

    }

}
