<?php

namespace Annex\TenantBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    /**
     * @Route("login_handler", name="login_handler")
     */
    public function loginAction(Request $request)
    {
        if ($tId = $this->get('session')->get('tenantId')) {
            // Successful login, update the tenant DB with login date

            /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
            $tenantService = $this->get('annex_tenant.tenant_information');

            /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
            if ($tenant = $tenantService->getTenant($tId)) {
                $tenant->setLastAccessAt(new \DateTime());
                $tenantService->updateTenant();
            }

            return $this->redirect($this->generateUrl('account_settings'));
        } else {
            // Logged in but no tenant, we are admin
            return $this->redirect($this->generateUrl('tenant_list'));
        }
    }

}