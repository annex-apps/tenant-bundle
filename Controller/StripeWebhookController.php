<?php

namespace Annex\TenantBundle\Controller;

use Annex\TenantBundle\Entity\Invoice;
use Annex\TenantBundle\Entity\Tenant;
use Postmark\Models\PostmarkAttachment;
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

        if ($input = $request->get('webhook-data')) {
            $event_json = json_decode($input);
            $event = $event_json->object;
            $event_type = $request->get('event-type');
            $sendInvoice = (bool)$request->get('send-invoice');
        } else {
            $input = @file_get_contents("php://input");
            $event_json = json_decode($input);
            $event = $event_json->data->object;
            $event_type = $event_json->type;
            $sendInvoice = true;
        }

        $status = 'Received OK';
        switch ($event_type) {
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

                    if ($invoiceId = $tenantService->addInvoice($invoice)) {
                        $status = 'Added invoice OK';

                        if ($sendInvoice == true) {
                            $this->getAndSendInvoice($tenant, $event->id);
                            $status .= '. Sent by email.';
                        }
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

        $subject = "Webhook: ".$event_type;
        $this->sendWebhookNotification($subject, print_r($responseJson, true).'<hr>'.print_r($input, true) );

        // Thank you Stripe
        return new JsonResponse($responseJson);
    }

    /**
     * @param Tenant $tenant
     * @param $stripeInvoiceId
     */
    private function getAndSendInvoice(Tenant $tenant, $stripeInvoiceId)
    {

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        if ($invoice = $stripeService->getInvoice($stripeInvoiceId)) {

            try {
                $client = new PostmarkClient($this->getParameter('annex.postmark_api_key'));

                $appName = ucfirst($this->getParameter('app_info.name'));

                $message = $this->renderView(
                    'AnnexTenantBundle::emails/invoice_attached.html.twig',
                    [
                        'title' => "",
                        'heading' => "Your Annex Apps Invoice",
                        'appName' => $appName,
                        'link' => $invoice->invoice_pdf
                    ]
                );

                $client->sendEmail(
                    "Annex Apps <system@annex-apps.com>",
                    $tenant->getOwnerEmail(),
                    "Annex Apps Invoice for ".$tenant->getName(),
                    $message,
                    NULL, NULL, true, NULL, NULL, 'hello@annex-apps.com'
                );

            } catch (\Exception $generalException) {
//                die("error: ".$generalException->getMessage());
            }

        } else {

//            $this->addFlash('error', "Could not find an invoice with ID {$stripeInvoiceId}");
//            return $this->redirectToRoute('account_billing');
//            $e = '';
//            foreach ($stripeService->errors AS $error) {
//                $e .= $error;
//            }
//            die("error: could not get invoice {$stripeInvoiceId} from Stripe ... ".$e);

        }

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

    /**
     * @Route("/stripe/test-webhook", name="test_webhook")
     */
    public function webhookDataForm(Request $request) {

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        if ($this->get('session')->get('tenantId')) {
            $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));
        } else {
            $tenant = null;
        }

        return $this->render('AnnexTenantBundle::webhook_form.html.twig', [
            'tenant' => $tenant
        ]);

    }
}
