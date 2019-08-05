<?php

namespace Annex\TenantBundle\Controller\Billing;

use Annex\TenantBundle\Entity\Subscription;
use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CardDeleteController extends Controller
{
    /**
     * @Route("/account/card/{cardId}/delete", name="card_delete")
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

        return $this->redirectToRoute('account_billing');
    }
}
