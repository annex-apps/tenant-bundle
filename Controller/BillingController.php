<?php

namespace Annex\TenantBundle\Controller;

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
        $cards = [];
        return $this->render('AnnexTenantBundle::billing.html.twig', [
            'tenant' => $tenant,
            'bills'  => $bills,
            'cards'  => $cards,
            'plans'  => $plans
        ]);
    }

    /**
     * @Route("/admin/billing/card/add", name="card_add")
     */
    public function billingAddCardAction()
    {

    }

    /**
     * @Route("/admin/billing/card/{id}/remove", name="card_remove")
     */
    public function billingRemoveCardAction($id)
    {

    }

}
