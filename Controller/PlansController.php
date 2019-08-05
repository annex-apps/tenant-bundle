<?php

namespace Annex\TenantBundle\Controller;

use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlansController extends Controller
{
    /**
     * @Route("/plans", name="plans")
     */
    public function plansAction(Request $request)
    {
        $currencyCode = 'gbp';
        $tenant       = null;

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        if ($this->get('session')->get('tenantId')) {
            $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));
            if ($tenant->getBrightpearlDataCentre() == 'ws-eu1') {
                $currencyCode = 'gbp';
            } else {
                $currencyCode = 'usd';
            }
        }

        $plans = $tenantService->getPlans([
            'currency' => $currencyCode,
            'isActive' => true
        ]);

        return $this->render('AnnexTenantBundle::plans.html.twig', [
            'plans' => $plans,
            'tenant' => $tenant
        ]);
    }
}
