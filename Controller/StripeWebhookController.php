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

        $input = @file_get_contents("php://input");
        $event_json = json_decode($input);

        $event = $event_json->data->object;

        $status = 'OK';
        switch ($event->object) {
            case "subscription":
                /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
                if (!$tenant = $tenantService->getTenantBySubscriptionId($event->id)) {
                    $status = 'Failed to find by subscription';
                }
                break;
        }

        $responseJson = [
            'status' => $status,
            'id'     => $event->id,
            'event'  => $event->object
        ];

        $subject = "Webhook: ".$event_json->type;
        $this->sendWebhookNotification($subject, print_r($event_json, true) );

        // Thank you Stripe
        return new JsonResponse($responseJson);
    }

    private function sendWebhookNotification($subject, $messageBody)
    {
        try {
            $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));
            $message = $this->renderView(
                'AnnexTenantBundle::emails/basic.html.twig',
                [
                    'message' => '<pre>'.$messageBody.'</pre>'
                ]
            );
            $client->sendEmail(
                "Annex Apps <system@annex-apps.com>",
                'hello@annex-apps.com',
                $subject,
                $message
            );
        } catch (\Exception $generalException) {
            die("error: ".$generalException->getMessage());
        }
    }
}
