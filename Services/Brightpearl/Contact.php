<?php

namespace Annex\TenantBundle\Services\Brightpearl;

use Annex\TenantBundle\Entity\Tenant;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class Contact
{

    /** @var Container  */
    private $container;

    /** @var Tenant */
    private $tenant;

    private $brightpearlAccountCode;
    private $brightpearlAccountVersion = '0';
    private $brightpearlDataCentre = 'none';

    public $errors   = [];
    public $messages = [];

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * @param $emailAddress
     * @param $mode
     * @return array|bool
     */
    public function findContactByEmail($emailAddress, $mode)
    {

        if ($mode == 'test') {

            $contact = [
                'id'        => 1000,
                'name'      => 'TEST CONTACT',
                'company'   => 'TEST COMPANY',
                'tel'       => '415 776 6485',
                'totalOrders' => 12,
                'totalSpend' => 'GBP 1345.56',
                'status'    => 'TEST STATUS',
                'url'       => $this->buildContactUrl(1000)
            ];

            return $contact;

        } else if ($contactService = $this->getService()) {

            try {
                $columns = ['contactId', 'firstName', 'lastName'];
                $filters = ['primaryEmail' => $emailAddress];

                $contacts  = $contactService->getContactSearch($this->brightpearlAccountCode, $columns, $filters);
                $results   = $contacts->getResponse()->getResults();

                if (count($results) == 0) {
                    return false;
                } else if (count($results) == 1) {
                    $contactId = $results[0][0]->scalar;

                    $contactResponse = $contactService->getContactIDSet($this->brightpearlAccountCode, $contactId);
                    $contacts = $contactResponse->getResponse();

                    $contact = [
                        'id'          => $contactId,
                        'name'        => $results[0][1]->scalar.' '.$results[0][2]->scalar,
                        'company'     => $contacts[0]->getOrganisation()->getName(),
                        'tel'         => $contacts[0]->getCommunication()->getTelephones()->getPri(),
                        'totalOrders' => 12,
                        'totalSpend'  => 'GBP 1345.56',
                        'status'      => $contacts[0]->getContactStatus()->getCurrent()->getContactStatusName(),
                        'url'         => $this->buildContactUrl($contactId)
                    ];
                    return $contact;
                } else {
                    $this->messages[] = count($results).' contacts found for this email address.';
                    return false;
                }
            } catch (\Exception $e) {
                $this->errors[] = $e->getMessage();
                return false;
            }

        } else {
            return false;
        }


    }

    /**
     * @param integer $contactId
     * @param string $mode
     * @return array|bool|\Brightpearl\Client\Model\Contact
     */
    public function getContactById($contactId, $mode)
    {

        if (!$contactId) {
            $this->errors[] = "No contact ID passed";
            return false;
        }

        if ($mode == 'test') {

            $contact = [
                'id'        => 1000,
                'name'      => 'TEST CONTACT',
                'company'   => 'TEST COMPANY',
                'tel'       => '415 776 6485',
                'totalOrders' => 12,
                'totalSpend' => 'GBP 1345.56',
                'status'    => 'TEST STATUS',
                'url'       => $this->buildContactUrl(1000)
            ];

            return $contact;

        } else if ($contactService = $this->getService()) {

            try {

                $contacts  = $contactService->getContactIDSet($this->brightpearlAccountCode, $contactId);
                $results = $contacts->getResponse();

                if (count($results) == 0) {
                    return false;
                } else if (count($results) == 1) {

                    $contactResponse = $contactService->getContactIDSet($this->brightpearlAccountCode, $contactId);
                    $results = $contactResponse->getResponse();

                    /** @var \Brightpearl\Client\Model\Contact $contact */
                    $contact = $results[0];

                    $c = [
                        'id'          => $contactId,
                        'name'        => $contact->getFirstName().' '.$contact->getLastName(),
                        'company'     => $contact->getOrganisation()->getName(),
                        'tel'         => $contact->getCommunication()->getTelephones()->getPri(),
                        'totalOrders' => 0,
                        'totalSpend'  => '',
                        'status'      => $contact->getContactStatus()->getCurrent()->getContactStatusName(),
                        'url'         => $this->buildContactUrl($contactId)
                    ];

                    return $c;

                } else {
                    $this->messages[] = count($results).' contacts found for this ID.';
                    return false;
                }
            } catch (\Exception $e) {
                $this->errors[] = $e->getMessage();
                return false;
            }

        } else {
            return false;
        }
    }

    /**
     * @return bool|\Brightpearl\Client\Api\ContactServiceApi
     */
    private function getService()
    {
        $this->brightpearlAccountCode  = $this->tenant->getBrightpearlAccountCode();
        $this->brightpearlDataCentre   = $this->tenant->getBrightpearlDataCentre();
        $brightpearlAccountToken       = $this->tenant->getBrightpearlToken();

        if ($this->brightpearlAccountCode && $this->brightpearlDataCentre) {

            $config = new \Brightpearl\Client\Configuration();
            $config->setHost("https://{$this->brightpearlDataCentre}.brightpearl.com/public-api");
            $secretKey = $this->container->getParameter('brightpearl_secret');
            $token = base64_encode(hash_hmac('sha256', $brightpearlAccountToken, $secretKey, true));
            $config->addDefaultHeader("brightpearl-dev-ref", "christanner");
            $config->addDefaultHeader("brightpearl-app-ref", "brightzen");
            $config->addDefaultHeader("brightpearl-account-token", $token);
            $client = new \Brightpearl\Client\ApiClient($config);

            $integrationService = new \Brightpearl\Client\Api\IntegrationServiceApi($client);

            try {
                $config = $integrationService->getAccountConfiguration($this->brightpearlAccountCode);
                $this->brightpearlAccountVersion = $config->getResponse()->getConfiguration()->getAccountVersion();
            } catch (\Exception $e) {
                $this->errors[] = $e->getMessage();
                return false;
            }

            return new \Brightpearl\Client\Api\ContactServiceApi($client);

        } else {
            $this->errors[] = 'Missing Brightpearl connection information';
            return false;
        }
    }

    /**
     * @param $contactId
     * @return string
     */
    private function buildContactUrl($contactId)
    {
        $domain = '';
        switch ($this->brightpearlDataCentre) {
            case "ws-eu1":
                $domain = 'euw1.brightpearl.com';
                break;
            case "ws-use":
                $domain = 'use.brightpearl.com';
                break;
        }
        return 'https://'.$domain.'/'.$this->brightpearlAccountVersion.'/patt-op.php?scode=contact&cID='.(int)$contactId;
    }

}