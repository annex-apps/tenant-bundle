<?php

namespace Annex\TenantBundle\Controller;

use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class StripeWebhookController extends Controller
{
    /**
     * @Route("/stripe/webhook", name="stripe_webhook")
     */
    public function stripeWebhookAction(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        $input = @file_get_contents("php://input");
        $event_json = json_decode($input);

        $this->sendWebhookNotification($event_json);

        // Thank you Stripe
        return new JsonResponse(array('status' => 'ok'));
    }

    private function sendWebhookNotification($messageBody)
    {
        try {
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'AnnexTenantBundle::emails/basic.html.twig',
                [
                    'message' => $messageBody
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                'hello@annex-apps.com',
                "Webhook notification",
                $message
            );
        } catch (\Exception $generalException) {
//            $this->addFlash('error', 'Failed to send email:' . $generalException->getMessage());
        }
    }
}
