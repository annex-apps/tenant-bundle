<?php

namespace Annex\TenantBundle\Controller;

use Annex\TenantBundle\Entity\Subscription;
use Postmark\PostmarkClient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BillingController extends Controller
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

        $plans = $tenantService->getPlans();

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        $cards = [];
        $invoices = [];

        if ($stripeCustomerId = $tenant->getStripeCustomerId()) {

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

        }

        return $this->render('AnnexTenantBundle::billing.html.twig', [
            'tenant' => $tenant,
            'cards'  => $cards,
            'plans'  => $plans,
            'invoices'  => $invoices,
            'stripe_public_key' => $this->getParameter('stripe_public_key')
        ]);
    }

    /**
     * @Route("/account/card/{cardId}/delete", name="card_delete")
     */
    public function deleteCardAction($cardId)
    {

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        if ($stripeService->deleteCard($tenant->getStripeCustomerId(), $cardId)) {
            $this->addFlash('success', "Removed card OK.");
        } else {
            foreach ($stripeService->errors AS $error) {
                $this->addFlash('error', $error);
            }
        }

        return $this->redirectToRoute('account_billing');
    }

    /**
     * @Route("/account/card/add", name="card_add")
     */
    public function addCardAction(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        $token = $request->request->get('stripeToken');
        $email = $request->request->get('stripeEmail');

        if ($token && $email) {

            // We don't yet have this tenant in Stripe, create them
            // The same email address could exist for another tenant on another app, but that's OK
            if (!$stripeCustomerId = $tenant->getStripeCustomerId()) {
                $newCustomerData = [
                    'description' => $tenant->getOwnerName(),
                    'email'       => $email
                ];
                if (!$stripeCustomer = $stripeService->createCustomer($newCustomerData)) {
                    foreach ($stripeService->errors AS $error) {
                        $this->addFlash('error', $error);
                    }
                    return $this->redirectToRoute('admin_billing');
                }
                $stripeCustomerId = $stripeCustomer->id;

                // Update the tenant
                $tenantService->tenant->setStripeCustomerId($stripeCustomerId);
                $tenantService->updateTenant();
            }

            // Change the card to be used
            if ($stripeService->changeCard($stripeCustomerId, $token)) {
                $this->addFlash('success', "Your card details were updated OK");
            } else {
                foreach ($stripeService->errors AS $error) {
                    $this->addFlash('error', $error);
                }
            }

        } else {
            $this->addFlash('error', "No token or email");
        }

        return $this->redirectToRoute('account_billing');
    }
}
