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

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        $cards = [];
        $bills = [];

        if ($stripeCustomerId = $tenant->getStripeCustomerId()) {
            $stripeCustomer = $stripeService->getCustomerById($stripeCustomerId);

            if (isset($stripeCustomer['sources']['data'])) {
                foreach($stripeCustomer['sources']['data'] AS $source) {
                    $cards[] = [
                        'last4' => $source['last4'],
                        'exp_month' => $source['exp_month'],
                        'exp_year' => $source['exp_year'],
                        'brand' => $source['brand'],
                        'id' => $source['id']
                    ];
                }
            }

            $bills = $stripeService->getInvoices($stripeCustomerId);
        }

//        if (!$plans = $stripeService->getPlans()) {
//            foreach ($stripeService->errors AS $error) {
//                $this->addFlash('error', $error);
//            }
//        }

        return $this->render('AnnexTenantBundle::billing.html.twig', [
            'tenant' => $tenant,
            'cards'  => $cards,
            'plans'  => $plans,
            'bills'  => $bills,
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

        $planCode = 'notifier_basic';
        $plan = $tenantService->getPlans(['code' => $planCode]);

        $token = $request->request->get('stripeToken');
        $email = $request->request->get('stripeEmail');

        if ($token && $email) {

            // We don't yet have this customer in Stripe, create them
            if (!$stripeCustomerId = $tenant->getStripeCustomerId()) {
                $newCustomerData = [
                    'description' => $tenant->getOwnerName(),
                    'email'       => $email,
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
            $tenantService->tenant->setStripeCustomerId($stripeCustomerId);
            $tenantService->updateTenant();

            // Create a subscription
            if ($subscription = $stripeService->createSubscription($stripeCustomerId, $token, $planCode)) {
                $tenantService->addSubscription($subscription, $plan);
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
     * @Route("/admin/billing/subscription/cancel", name="subscription_cancel")
     */
    public function cancelSubscriptionAction()
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        if ($stripeService->cancelSubscription( $tenant->getSubscription()->getStripeId() )) {
            $this->addFlash('success', "Your subscription was cancelled");
            $tenantService->cancelSubscription( $tenant->getSubscription()->getId() );
        } else {
            foreach ($stripeService->errors AS $error) {
                $this->addFlash('error', $error);
            }
        }

        return $this->redirectToRoute('admin_billing');
    }

    /**
     * @Route("/admin/billing/card/{cardId}/delete", name="card_delete")
     */
    public function deleteCardAction($cardId)
    {

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        if ($stripeService->deleteCard($tenant->getStripeCustomerId(), $cardId)) {
            $this->addFlash('success', "Removed card OK.");
        } else {
            foreach ($stripeService->errors AS $error) {
                $this->addFlash('error', $error);
            }
        }

        return $this->redirectToRoute('admin_billing');

    }

}
