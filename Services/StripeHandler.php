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

//        $curl = new \Stripe\HttpClient\CurlClient(array(CURLOPT_SSLVERSION => 6));
//        \Stripe\ApiRequestor::setHttpClient($curl);
//        Stripe::$apiBase = "https://api-tls12.stripe.com";
    }

    /**
     * Can be given in the controller each time this service is called
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
     * @param $customer
     * @param bool $searchExistingCustomers
     * @return bool|\Stripe\Customer
     */
    public function createCustomer($customer, $searchExistingCustomers = true)
    {
        if (!$customer['email']) {
            $this->errors[] = "Customer requires an email address.";
            return false;
        }

        // First find if we have this email address already
        if ($searchExistingCustomers == true) {
            if ($existingCustomer = $this->getCustomerByEmail($customer['email'])) {
                return $existingCustomer;
            }
        }

        try {
            $response = \Stripe\Customer::create($customer);
            if (isset($response->error)) {
                $this->errors[] = $response->error->type.' : '.$response->error->message;
                return false;
            }
            return $response;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $email
     * @return bool
     */
    public function getCustomerByEmail($email)
    {
        try {
            $response = \Stripe\Customer::all(['limit' => 100]);
            if (isset($response->error)) {
                $this->errors[] = $response->error->type.' : '.$response->error->message;
                return false;
            }
            if (isset($response->data) && count($response->data) > 0) {
                foreach ($response->data AS $customer) {
                    if ($customer->email == $email) {
                        return $customer;
                    }
                }
                // No matches
                return false;
            } else {
                // No customers found
                return false;
            }
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param string $stripeCustomerId
     * @param string $token
     * @param string $planCode
     * @return bool|\Stripe\Subscription
     */
    public function createSubscription($stripeCustomerId, $token, $planCode)
    {
        try {
            $response = \Stripe\Subscription::create([
                'customer' => $stripeCustomerId,
                'plan'     => $planCode,
                'source'   => $token
            ]);
            if (isset($response->error)) {
                $this->errors[] = $response->error->type.' : '.$response->error->message;
                return false;
            }
            return $response;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $subscriptionId
     * @return bool
     */
    public function cancelSubscription($subscriptionId)
    {
        try {
            $sub = \Stripe\Subscription::retrieve($subscriptionId);
            $sub->cancel();
            return true;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $subscriptionId
     * @param $newPlanCode
     * @return bool
     */
    public function changePlan($subscriptionId, $newPlanCode)
    {
        try {
            $subscription = \Stripe\Subscription::retrieve($subscriptionId);
            $subscription->plan = $newPlanCode;
            $subscription->save();
            return true;
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
            $response = \Stripe\Plan::all();
            if (isset($response->data)) {
                $plans = [];
                foreach ($response->data AS $plan) {
                    $plans[] = [
                        'id'     => $plan->id,
                        'name'   => $plan->name,
                        'amount' => $plan->amount
                    ];
                }
                return $plans;
            } else {
                throw new \Exception("No plans found in Stripe");
            }
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $customerId
     * @param $cardId
     * @return bool
     */
    public function deleteCard($customerId, $cardId)
    {
        try {
            $customer = \Stripe\Customer::retrieve($customerId);
            $response = $customer->sources->retrieve($cardId)->delete();
            if (isset($response->deleted) && $response->deleted == true) {
                return true;
            } else {
                throw new \Exception("Could not delete");
            }
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $customerId
     * @param $token
     * @return bool
     */
    public function changeCard($customerId, $token)
    {
        try {
            $cu = \Stripe\Customer::retrieve($customerId);
            $cu->source = $token;
            $response = $cu->save();
            if (isset($response->object) && $response->object == 'customer') {
                return true;
            } else {
                throw new \Exception("Could not replace your card");
            }
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $stripeCustomerId
     * @return array|bool
     */
    public function getInvoices($stripeCustomerId)
    {
        try {
            $response = \Stripe\Invoice::all(["customer" => $stripeCustomerId]);
            if (isset($response->data)) {
                $invoices = [];
                foreach ($response->data AS $invoice) {
                    $invoices[] = [
                        'id'     => $invoice->id,
                        'date'   => $invoice->date,
                        'currency' => strtoupper($invoice->currency),
                        'amount' => $invoice->total/100,
                        'isPaid' => $invoice->paid ? "Yes" : "No",
                    ];
                }
                return $invoices;
            } else {
                throw new \Exception("No invoices found in Stripe for this customer");
            }
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $stripeInvoiceId
     * @return bool|\Stripe\Invoice
     */
    public function getInvoice($stripeInvoiceId)
    {
        try {
            $invoice = \Stripe\Invoice::retrieve($stripeInvoiceId);
            return $invoice;
        } catch (\Exception $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

}