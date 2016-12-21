<?php

namespace Annex\TenantBundle\Controller;

use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        if ($this->get('session')->get('tenantId')) {
            $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));
        } else {
            $tenant = null;
        }

        return $this->render('AnnexTenantBundle::dash.html.twig', [
            'tenant' => $tenant
        ]);
    }

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

        $plans = $tenantService->getPlans(['currency' => $currencyCode]);

        return $this->render('AnnexTenantBundle::plans.html.twig', [
            'plans' => $plans,
            'tenant' => $tenant
        ]);
    }

    /**
     * @Route("/account/not_installed", name="not_installed")
     */
    public function notInstalledAction(Request $request)
    {
        return $this->render('AnnexTenantBundle::not_installed.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..')
        ]);
    }

    /**
     * @Route("logout", name="logout", defaults={"_locale"="en"}, requirements = {"_locale" = "fr|en|nl"})
     */
    public function logoutAction()
    {
        return $this->redirect($this->generateUrl('homepage'));
    }

}
