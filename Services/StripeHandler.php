<?php

namespace Annex\TenantBundle\Services;

use Stripe\Stripe;

class StripeHandler
{
    /** @var  string */
    private $currency;

    /** @var  string */
    private $apiKey;

    /** @var float  */
    private $fee = 0.01;

    /** @var array  */
    public $errors = [];

    public function __construct($apiKey, $currency)
    {
        if (!$apiKey) {
            throw new \Exception("No private API key found for Stripe");
        }

        if (!$currency) {
            throw new \Exception("No currency found for Stripe");
        }

        $this->currency = $currency;
        $this->apiKey   = $apiKey;

        if ($this->apiKey) {
            $this->setApiKey($this->apiKey);
        }

        Stripe::$apiBase = "https://api-tls12.stripe.com";
    }

    /**
     * Can be given in the controller each time this handler is called
     * Allows the controller to decide which Stripe account is charged
     * @param $apiKey
     */
    public function setApiKey($apiKey)
    {
        Stripe::setApiKey($apiKey);
    }

    /**
     * @param $customerStripeId
     * @return \Stripe\Customer
     */
    public function getCustomerById($customerStripeId)
    {
        return \Stripe\Customer::retrieve($customerStripeId);
    }

    /**
     * @param array $customer
     * @return \Stripe\Customer
     */
    public function createCustomer($customer)
    {
        try {
            $stripeCustomer = \Stripe\Customer::create($customer);
            return $stripeCustomer;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param string $stripeCustomerId
     * @param string $plan
     * @return bool|\Stripe\Subscription
     */
    public function createSubscription($stripeCustomerId, $plan)
    {
        try {
            $subscription = \Stripe\Subscription::create([
                'customer' => $stripeCustomerId,
                'plan' => $plan
            ]);
            return $subscription;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $token
     * @param $amount
     * @return \Stripe\Charge
     */
    public function chargeWithToken($token, $amount)
    {
        $params = [
            'amount'        => $amount,
            'currency'      => $this->currency,
            'source'        => $token,
            'description'   => 'Lend Engine charge',
            'application_fee' => round($amount * $this->fee, 0)
        ];
        try {
            $charge = \Stripe\Charge::create($params);
            return $charge;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $customerId
     * @param $amount
     * @return \Stripe\Charge
     */
    public function chargeCustomer($customerId, $amount)
    {
        $params = [
            'amount'        => $amount,
            'currency'      => $this->currency,
            'customer'      => $customerId,
            'description'   => 'Lend Engine charge',
            'application_fee' => round($amount * $this->fee, 0)
        ];
        try {
            $charge = \Stripe\Charge::create($params);
            return $charge;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $cardId
     * @param $customerId
     * @param $amount
     * @return bool|\Stripe\Charge
     */
    public function chargeWithCard($cardId, $customerId, $amount)
    {
        $params = [
            'amount'        => $amount,
            'currency'      => $this->currency,
            'customer'      => $customerId,
            'source'        => $cardId,
            'description'   => 'Lend Engine charge',
            'application_fee' => round($amount * $this->fee, 0)
        ];
        try {
            $charge = \Stripe\Charge::create($params);
            return $charge;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @return bool|\Stripe\Collection
     */
    public function getPlans()
    {
        try {
            $plans = \Stripe\Plan::all();
            return $plans;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

}