<?php

namespace Annex\TenantBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InvoicePrintController extends Controller
{
    /**
     * @Route("/account/invoice/{id}", name="invoice_print")
     * @param string $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function invoicePrintAction($id)
    {

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        if (!$invoices = $tenantService->getInvoices(['id' => $id])) {
            $this->addFlash('error', "Could not find an invoice with ID {$id}");
            return $this->redirectToRoute('account_billing');
        }

        // returns one so get the first
        $invoice = $invoices[0];

        /** @var $invoice \Annex\TenantBundle\Entity\Invoice */
        $stripeInvoiceId = $invoice->getStripeId();

        /** @var \Stripe\Invoice $stripeInvoice */
        if ($stripeInvoice = $stripeService->getInvoice($stripeInvoiceId)) {

            // Send user to the Stripe version of this invoice
            return $this->redirect($stripeInvoice->invoice_pdf);

//            return $this->render('AnnexTenantBundle::invoice.html.twig', [
//                'invoiceReference' => $id,
//                'tenant' => $tenant,
//                'invoice'  => $invoice,
//            ]);
        } else {
            $this->addFlash('error', "Could not find an invoice with ID {$stripeInvoiceId}");
            return $this->redirectToRoute('account_billing');
        }
    }

}
