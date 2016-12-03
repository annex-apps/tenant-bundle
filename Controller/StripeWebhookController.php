<?php

namespace Annex\TenantBundle\Controller;

use Annex\TenantBundle\Entity\Invoice;
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
        $em = $this->getDoctrine()->getManager();

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        $input = @file_get_contents("php://input");
        $event_json = json_decode($input);

        $event = $event_json->data->object;

        $status = 'OK';
        switch ($event_json->type) {
            case "customer.subscription.created":
                /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
                if (!$tenant = $tenantService->getTenantByStripeCustomerId($event->customer)) {
                    $status = 'Failed to find tenant for new subscription using '.$event->customer;
                }
                break;
            case "invoice.created":
                if ($tenant = $tenantService->getTenantByStripeCustomerId($event->customer)) {

                    $date = \DateTime::createFromFormat("U", $event->date);

                    /** @var \Stripe\Invoice $event */
                    $invoice = new Invoice();
                    $invoice->setCurrency($event->currency);
                    $invoice->setTenant($tenant);
                    $invoice->setStripeId($event->id);
                    $invoice->setAmount($event->total);
                    $invoice->setIsPaid($event->paid);
                    $invoice->setTaxDate($date);

                    if ($tenantService->addInvoice($invoice)) {
                        $status = 'Added invoice OK';
                    } else {
                        $status = 'Failed to add invoice';
                    }

                } else {
                    $status = 'Failed to find tenant for invoice using '.$event->customer;
                }
                break;
        }

        $responseJson = [
            'status' => $status,
            'id'     => $event->id,
            'event'  => $event->object
        ];

        $subject = "Webhook: ".$event_json->type;
        $this->sendWebhookNotification($subject, print_r($responseJson, true).'<hr>'.print_r($input, true) );

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
