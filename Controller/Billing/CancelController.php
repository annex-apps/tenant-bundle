<?php

namespace Annex\TenantBundle\Controller\Billing;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CancelController extends Controller
{

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

}
