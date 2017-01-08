<?php

namespace Annex\TenantBundle\Controller;

use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BrightpearlCallbackController extends Controller
{
    /**
     * Redirect requests coming in from Brightpearl App Store
     * @Route("setup", name="app_setup")
     */
    public function setupAction(Request $request)
    {
        $accountCode = $request->get("accountCode");
        $appDomain = $this->getParameter('app_info.tld');
        // Redirects user to login if not authenticated
        return $this->redirect("http://{$accountCode}.{$appDomain}");
    }

    /**
     * @Route("install", name="install_app")
     */
    public function installAction(Request $request)
    {

        // We install by querying Brightpearl post sign-up, so we don't need to use this call from BP
        $app = $request->get('app');
        $accountCode = $request->get('accountCode');

        try {
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'AnnexTenantBundle::emails/basic.html.twig',
                [
                    'message' => "Install request. App: {$app}, Account: {$accountCode}"
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                'hello@annex-apps.com',
                "Install request. App: {$app}, Account: {$accountCode}",
                $message
            );
        } catch (\Exception $generalException) {
//            return new JsonResponse($generalException->getMessage());
        }

        return new JsonResponse(['Installed']);

    }

    /**
     * @Route("un-install", name="uninstall_app")
     */
    public function unInstallAction(Request $request)
    {

        // We install by querying Brightpearl post sign-up, so we don't need to use this call from BP
        $app = $request->get('app');
        $accountCode = $request->get('accountCode');

        try {
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'AnnexTenantBundle::emails/basic.html.twig',
                [
                    'message' => "Un-install request. App: {$app}, Account: {$accountCode}"
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                'hello@annex-apps.com',
                "Un-install request. App: {$app}, Account: {$accountCode}",
                $message
            );
        } catch (\Exception $generalException) {
//            return new JsonResponse($generalException->getMessage());
        }

        return new JsonResponse(['Un-Installed']);

    }

}
