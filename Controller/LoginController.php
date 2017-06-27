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
        if ($this->get('session')->get('tenantId')) {
            return $this->redirect($this->generateUrl('account_settings'));
        } else {
            // Logged in but no tenant, we are admin
            return $this->redirect($this->generateUrl('tenant_list'));
        }
    }

}