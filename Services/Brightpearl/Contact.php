<?php

namespace Annex\TenantBundle\Services\Brightpearl;

use Annex\TenantBundle\AnnexTenantBundle;
use Annex\TenantBundle\Services\BrightpearlApiClient\Api\ContactServiceApi;
use Annex\TenantBundle\Services\BrightpearlApiClient\Api\IntegrationServiceApi;
use Annex\TenantBundle\Services\BrightpearlApiClient\ApiClient;
use Annex\TenantBundle\Services\BrightpearlApiClient\Configuration;
use Annex\TenantBundle\Entity\Tenant;
use Doctrine\ORM\EntityManager;
use Monolog\Logger;
use Symfony\Component\DependencyInjection\Container;

class Contact
{

    /** @var Container  */
    private $container;

    /** @var Logger */
    private $logger;

    /** @var Tenant */
    private $tenant;

    /** @var EntityManager */
    private $em;

    private $connection = [];

    private $brightpearlAccountCode;
    private $brightpearlAccountVersion = '0';
    private $brightpearlDataCentre = 'none';

    public $errors   = [];
    public $messages = [];

    /**
     * @param Container $container
     * @param Logger $logger
     */
    public function __construct(Container $container, Logger $logger)
    {
        $this->container = $container;
        $this->logger = $logger;
    }

    /**
     * @param Tenant $tenant
     * @param EntityManager $em
     */
    public function setTenant(Tenant $tenant, EntityManager $em = null)
    {
        $this->tenant = $tenant;
        if ($em) {
            $this->em = $em;
        }
    }

    /**
     * @param $contactIdSet
     * @return bool|\BrightpearlApiClient\Model\Contact[]
     * @throws \Exception
     */
    public function getContactsByIdSet($contactIdSet)
    {
        if ($contactService = $this->getService()) {

            try {
                $contactResponse = $contactService->getContactIDSet($this->brightpearlAccountCode, $contactIdSet);
                $results = $contactResponse->getResponse();
                return $results;

            } catch (\Exception $e) {
                // 404 can be common on bad data sets
                $this->errors[] = $e->getMessage();
                return false;
            }

        } else {
            return false;
        }
    }

    /**
     * @return bool|\BrightpearlApiClient\Api\ContactServiceApi
     * @throws \Exception
     */
    private function getService()
    {

        $this->logger->debug("Constructing contact service");

        if (!$this->tenant) {
            throw new \Exception("Set the tenant before calling Brightpearl API");
        }

        $this->brightpearlAccountCode  = $this->tenant->getBrightpearlAccountCode();
        $this->brightpearlDataCentre   = $this->tenant->getBrightpearlDataCentre();
        $brightpearlAccountToken       = $this->tenant->getBrightpearlToken();

        // We've already set up
        if (isset($this->connection[$this->brightpearlAccountCode])) {
            $this->logger->debug("Returning stored contact connection");
            return $this->connection[$this->brightpearlAccountCode];
        }

        if ($this->brightpearlAccountCode && $this->brightpearlDataCentre) {

            $config = new Configuration();
            $config->setHost("https://{$this->brightpearlDataCentre}.brightpearl.com/public-api");

            $secretKey = $this->container->getParameter('brightpearl_secret');
            $appRef    = $this->container->getParameter('app_info.brightpearl_ref');

            $token = base64_encode(hash_hmac('sha256', $brightpearlAccountToken, $secretKey, true));
            $config->addDefaultHeader("brightpearl-dev-ref", "christanner");
            $config->addDefaultHeader("brightpearl-app-ref", $appRef);
            $config->addDefaultHeader("brightpearl-account-token", $token);

            // Define whether we log API calls
            $config->setDebug(false);

            $client = new ApiClient($config, $this->logger);

            $integrationService = new IntegrationServiceApi($client);

            try {
                $config = $integrationService->getAccountConfiguration($this->brightpearlAccountCode);
                $this->brightpearlAccountVersion = $config->getResponse()->getConfiguration()->getAccountVersion();
            } catch (\Exception $e) {
                $this->errors[] = $e->getMessage();
                return false;
            }

            $this->logger->debug("Set up contact service OK");

            $this->connection[$this->brightpearlAccountCode] = new ContactServiceApi($client);
            return $this->connection[$this->brightpearlAccountCode];

        } else {
            $this->errors[] = 'Missing Brightpearl connection information';
            return false;
        }
    }

}