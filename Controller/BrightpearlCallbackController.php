<?php

namespace Annex\TenantBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BrightpearlCallbackController extends Controller
{
    /**
     * Redirect requests coming in from Brightpearl App Store
     * @Route("setup/", name="app_setup")
     */
    public function setupAction(Request $request)
    {
        $accountCode = $request->get("accountCode");
        $appDomain = $this->getParameter('app_info.domain');

        // If we don't have tenant information for this account we need to go to sign up
        $accountId = $this->get('session')->get('accountId');
        if (!$accountId) {
            if ($this->getParameter("kernel.environment") == 'prod') {
                return $this->redirect("http://{$accountCode}.{$appDomain}/signup");
            } else {
                return $this->redirect("http://localhost:8000/signup?accountCode={$accountCode}");
            }
        }

        // Redirects user to login if not authenticated
        return $this->redirect("http://{$accountCode}.{$appDomain}/settings");
    }

    /**
     * @Route("install/", name="install_app")
     */
    public function installAction(Request $request)
    {

        // We install by querying Brightpearl post sign-up, so we don't need to use this call from BP
        return new JsonResponse(['Installed']);

//        /** @var \Annex\TenantBundle\Services\Brightpearl\Utility $utilityService */
//        $utilityService = $this->get('service.brightpearl.utility');
//
//        if ($utilityService->installApp()) {
//            return new JsonResponse(['Installed']);
//        } else {
//            return new JsonResponse(['Install failed']);
//        }
    }

    /**
     * @Route("un-install/", name="uninstall_app")
     */
    public function unInstallAction(Request $request)
    {

        // We install by querying Brightpearl post sign-up, so we don't need to use this call from BP
        return new JsonResponse(['Un-Installed']);

//        /** @var \Annex\TenantBundle\Services\Brightpearl\Utility $utilityService */
//        $utilityService = $this->get('service.brightpearl.utility');
//
//        if ($utilityService->unInstallApp()) {
//            return new JsonResponse(['Un installed']);
//        } else {
//            return new JsonResponse(['Un install failed']);
//        }
    }

}
