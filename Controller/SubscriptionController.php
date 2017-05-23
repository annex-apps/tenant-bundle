<?php

namespace Annex\TenantBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SubscriptionController extends Controller
{

    /**
     * @Route("/account/subscription/add", name="subscription_add")
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

        $planCode = $request->request->get('planCode');

        /** @var $plan \Annex\TenantBundle\Entity\Plan */
        if (!$plan = $tenantService->getPlans(['code' => $planCode])) {
            $this->addFlash('error', "Cannot find a plan with code {$planCode}");
            return $this->redirectToRoute('account_billing');
        }

        $token = $request->request->get('stripeToken');
        $email = $request->request->get('stripeEmail');

        if ($token && $email) {

            // We don't yet have this tenant in Stripe, create them
            // The same email address could exist for another tenant on another app, but that's OK
            if (!$stripeCustomerId = $tenant->getStripeCustomerId()) {
                $newCustomerData = [
                    'description' => $tenant->getOwnerName(),
                    'email'       => $email
                ];
                if (!$stripeCustomer = $stripeService->createCustomer($newCustomerData)) {
                    foreach ($stripeService->errors AS $error) {
                        $this->addFlash('error', $error);
                    }
                    return $this->redirectToRoute('admin_billing');
                }
                $stripeCustomerId = $stripeCustomer['id'];

                // Update the tenant to add the Stripe ID
                $tenantService->tenant->setStripeCustomerId($stripeCustomerId);
                $tenantService->updateTenant();
            }

            // Create a subscription
            if ($subscription = $stripeService->createSubscription($stripeCustomerId, $token, $planCode)) {
                // Add to tenant and make tenant LIVE
                $tenantService->addSubscription($subscription, $plan);
                $this->addFlash('success', "You're all set!");
            } else {
                foreach ($stripeService->errors AS $error) {
                    $this->addFlash('error', $error);
                }
            }

        }

        return $this->redirectToRoute('account_billing');
    }

    /**
     * @Route("/account/subscription/cancel", name="subscription_cancel")
     */
    public function cancelSubscriptionAction()
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        if (!$stripeService->cancelSubscription( $tenant->getSubscription()->getStripeId() )) {
            foreach ($stripeService->errors AS $error) {
                $this->addFlash('error', $error);
            }
        }

        if ($tenantService->cancelSubscription( $tenant->getSubscription()->getId() )) {
            $this->addFlash('success', "Your subscription was cancelled");
        }

        return $this->redirectToRoute('account_billing');
    }

    /**
     * @Route("/account/subscription/change-plan", name="change_plan")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function changePlanAction(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        $newPlanCode = $request->get('to');
        if ($newPlanCode) {
            if ($stripeService->changePlan($tenant->getSubscription()->getStripeId(), $newPlanCode)) {
                // Change it locally
                if ($tenantService->changePlan($newPlanCode)) {
                    $this->addFlash('success', "We've changed your plan.");
                } else {
                    $this->addFlash('error', "problem trying to change plan.");
                }
            } else {
                foreach ($stripeService->errors AS $error) {
                    $this->addFlash('error', $error);
                }
            }
        }

        return $this->redirectToRoute('account_billing');
    }

}
