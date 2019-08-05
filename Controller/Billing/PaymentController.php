<?php

namespace Annex\TenantBundle\Controller\Billing;

use Annex\TenantBundle\Form\SubscribeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    /**
     * @Route("subscribe", name="card_form")
     */
    public function billingPaymentForm(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        $selectedPlan = null;
        if ($planCode = $request->get('planCode')) {
            $selectedPlan = $tenantService->getPlans(['code' => $planCode]);
            $task = 'subscribe';
            $title = 'Subscribe';
        } else if ($tenant->getSubscription()) {
            // Changing card
            $selectedPlan = $tenant->getSubscription()->getPlan();
            $task = 'addCard';
            $title = 'Add a new card';
        } else {
            $task = 'Not set';
            $title = 'Not set';
        }

        // Create the form to take card details
        $form = $this->createForm(SubscribeType::class, null, [
            'action' => $this->generateUrl('billing_payment_success', [
                'account' => $tenant->getBrightpearlAccountCode(),
                'task' => $task
            ])
        ]);

        $form->get('paymentAmount')->setData($selectedPlan->getAmount());
        $form->get('planCode')->setData($planCode);
        $form->get('account')->setData($tenant->getBrightpearlAccountCode());

        return $this->render('AnnexTenantBundle::billing/billing_payment.html.twig', array(
            'tenant' => $tenant,
            'form' => $form->createView(),
            'plan' => $selectedPlan,
            'billing_public_key' => $this->getParameter('stripe_public_key'),
            'title' => $title
        ));
    }

    /**
     * @Route("subscribe-handler", name="billing_payment_handler")
     */
    public function billingPaymentHandler(Request $request)
    {
        /** @var \Annex\TenantBundle\Services\StripeHandler $stripeService */
        $stripeService = $this->get('service.stripe');

        /** @var \Annex\TenantBundle\Services\TenantService $tenantService */
        $tenantService = $this->get('annex_tenant.tenant_information');

        $message = '';

        $data = json_decode($request->getContent(), true);

        /** @var \Annex\TenantBundle\Entity\Tenant $tenant */
        $tenant = $tenantService->getTenant($this->get('session')->get('tenantId'));

        if (isset($data['stripeTokenId']) && isset($data['planCode']) && $data['planCode'] != '') {

            $tokenId  = $data['stripeTokenId'];
            $planCode = $data['planCode'];

            if ($tokenId && $planCode) {

                // We're creating a new subscription in Stripe
                $subscriptionResponse = $stripeService->createSubscription($tenant, $tokenId, $planCode);

                if ($stripeCustomerId = $subscriptionResponse->customer) {
                    $tenant->setStripeCustomerId($stripeCustomerId);
                    $tenantService->updateTenant();
                }

                if (!$subscriptionResponse) {
                    $extraErrors = 'Failed to process card';
                    return new JsonResponse([
                        'error' => $extraErrors,
                        'message' => $message,
                        'errors' => $stripeService->errors
                    ]);
                } else if ($subscriptionResponse->status == 'active') {
                    return new JsonResponse([
                        'success' => true,
                        'subscription_id' => $subscriptionResponse->id,
                        'message' => $message,
                    ]);
                } else if ($subscriptionResponse->status == 'incomplete') {
                    return new JsonResponse([
                        'requires_action' => true,
                        'subscription_id' => $subscriptionResponse->id,
                        'payment_intent_client_secret' => $subscriptionResponse->latest_invoice->payment_intent->client_secret,
                        'message' => $message,
                    ]);
                } else {
                    return new JsonResponse([
                        'error' => "Unknown subscription status : ".$subscriptionResponse->status,
                        'message' => $message,
                        'errors' => $stripeService->errors
                    ]);
                }

            } else {
                return new JsonResponse([
                    'error' => "Invalid plan or token",
                    'message' => $message,
                    'errors' => $stripeService->errors
                ]);
            }

        } else if (isset($data['stripeTokenId'])) {

            $token = $data['stripeTokenId'];

            // Update customer's card
            if (!$stripeCustomerId = $tenant->getStripeCustomerId()) {
                return new JsonResponse([
                    'error' => "No Stripe customer",
                    'message' => $message,
                    'errors' => $stripeService->errors
                ]);
            }

            if (!$stripeService->changeCard($stripeCustomerId, $token)) {
                return new JsonResponse([
                    'error' => "Error trying to update your card.",
                    'message' => $message,
                    'errors' => $stripeService->errors
                ]);
            } else {
                // Tell the form to submit to billing_payment_success
                return new JsonResponse([
                    'success' => true,
                    'subscription_id' => '',
                    'message' => $message,
                ]);
            }

        } else {

            return new JsonResponse([
                'error' => "No planCode or Token",
                'message' => $message,
                'errors' => $stripeService->errors
            ]);

        }

    }

}