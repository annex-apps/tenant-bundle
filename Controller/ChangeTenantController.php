<?php

namespace Annex\TenantBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChangeTenantController extends Controller
{
    /**
     * @Route("change_tenant", name="change_tenant")
     */
    public function loginAction(Request $request)
    {
        $this->get('session')->set('tenantId', null);
        $this->get('session')->set('tenantCode', null);
        return $this->redirectToRoute('fos_user_security_login');
    }

}