<?php

namespace Annex\TenantBundle\Services;

use Annex\TenantBundle\Entity\Tenant;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Stripe\Stripe;

class StripeHandler
{

    /**
     * @var EntityManager
     */
    private $em;

    private $container;

    private $currency;

    private $apiKey;

    private $fee = 0.01;

    public $errors = [];

    public function __construct(EntityManager $em, Container $container)
    {
        $this->em        = $em;
        $this->container = $container;

        $this->currency = $this->container->get('settings')->getSettingValue('org_currency');
        $this->apiKey   = $this->container->get('settings')->getSettingValue('stripe_access_token');

        if ($this->apiKey) {
            $this->setApiKey($this->apiKey);
        }
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
     * @return \Stripe\Collection
     */
    public function getAllCustomers()
    {
        return \Stripe\Customer::all(array("limit" => 3));
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
    public function createCustomer($customer = array())
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
     * @param $token
     * @param $cardId
     * @param Tenant $contact
     * @param $amount
     * @return bool|\Stripe\Charge
     */
    public function processPayment($token, $cardId, Tenant $contact, $amount)
    {

        if (!$token && !$cardId) {
            $this->errors[] = 'Either Stripe checkout token or card ID is required.';
        }

        if (!$amount || $amount < 0) {
            $this->errors[] = 'Positive amount is required to charge via Stripe.';
        }

        if ($token && !$contact->getStripeCustomerId()) {

            // We don't yet have this customer in Stripe so create them
            $stripeCustomer = [
                'description' => $contact->getName(),
                'email' => $contact->getOwnerEmail(),
                'source' => $token
            ];

            if ($stripeCustomer = $this->createCustomer($stripeCustomer)) {

                $customerStripeId = $stripeCustomer['id'];
                $contact->setStripeCustomerId($customerStripeId);
                $this->em->persist($contact);

                // The card just used will have been set as the default for the new Stripe customer
                if (isset($stripeCustomer['sources']['data'])) {
                    foreach ($stripeCustomer['sources']['data'] AS $source) {
                        $cardId = $source['id'];
                    }
                }

                try {
                    $this->em->flush();
                } catch (\Exception $generalException) {
                    $this->errors[] = 'Failed to update member with Stripe details: '.$generalException->getMessage();
                }

            } else {

            }

        }

        if ($cardId && $contact->getStripeCustomerId()) {
            return $this->chargeWithCard($cardId, $contact->getStripeCustomerId(), $amount*100);
        } else if ($token) {
            return $this->chargeWithToken($token, $amount*100);
        }

        return true;
    }

}