<?php

namespace Annex\TenantBundle\Controller\Billing;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BillingPageController extends Controller
{
    /**
     * Shows the page with cards and bills
     * @Route("/account/billing", name="account_billing")
     */
    public function billingPageAction(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        if ($tenant->getBrightpearlDataCentre() == 'ws-eu1') {
            $currencyCode = 'gbp';
        } else {
            $currencyCode = 'usd';
        }
        $plans = $tenantService->getPlans([
            'currency' => $currencyCode,
            'isActive' => 1
        ]);

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        $cards = [];
        $invoices = [];

        if ($stripeCustomerId = $tenant->getStripeCustomerId()) {

            try {

                $stripeCustomer = $stripeService->getCustomerById($stripeCustomerId);
                if (isset($stripeCustomer->sources->data)) {
                    foreach($stripeCustomer->sources->data AS $source) {
                        $isDefault = false;
                        if ($stripeCustomer->default_source == $source->id) {
                            $isDefault = true;
                        }
                        $cards[] = [
                            'last4'     => $source->last4,
                            'exp_month' => $source->exp_month,
                            'exp_year'  => $source->exp_year,
                            'brand'     => $source->brand,
                            'id'        => $source->id,
                            'isDefault' => $isDefault
                        ];
                    }
                }

                $invoices = $tenantService->getInvoices();

            } catch (\Exception $e) {
                $this->addFlash('error', $e->getMessage());
            }

        }

        return $this->render('AnnexTenantBundle::billing/billing.html.twig', [
            'tenant' => $tenant,
            'cards'  => $cards,
            'plans'  => $plans,
            'invoices'  => $invoices,
            'stripe_public_key' => $this->getParameter('stripe_public_key')
        ]);
    }

}
