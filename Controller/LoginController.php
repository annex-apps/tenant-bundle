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
        if ($request->get('timestamp') && $request->get('userId') && $request->get('accountCode')) {
            // We're coming in from a Brightpearl app store login link, redirect to the appropriate tenant
            $accountCode = $request->get('accountCode');
            return $this->redirect('http://'.$accountCode.'.'.$this->getParameter('app_info.tld').'/login');
        }

        if ($this->get('session')->get('tenantId')) {
            return $this->redirect($this->generateUrl('account_settings'));
        } else {
            // Logged in but no tenant, we are admin
            return $this->redirect($this->generateUrl('tenant_list'));
        }
    }

}