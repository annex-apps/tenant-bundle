<?php

/**
 * Service used to fetch tenant info
 *
 */

namespace Annex\TenantBundle\Services;

use Annex\TenantBundle\Entity\Subscription;
use Annex\TenantBundle\Entity\Tenant;
use Doctrine\ORM\EntityManager;

class TenantService
{
    /** @var EntityManager  */
    private $coreEntityManager;

    /** @var string */
    private $coreDbName;

    /** @var EntityManager  */
    private $em;

    /** @var Tenant */
    private $tenant;

    public function __construct(EntityManager $em, $coreDbName)
    {
        $this->em = $em;
        $this->coreDbName = $coreDbName;

        $this->getCoreEntityManager();
    }

    /**
     * @param $tenantId
     * @return Tenant|null|object
     * @throws \Exception
     */
    public function getTenant($tenantId)
    {
        /** @var $repo \Annex\TenantBundle\Repository\TenantRepository */
        $tenantRepo = $this->coreEntityManager->getRepository('AnnexTenantBundle:Tenant');

        if ($this->tenant = $tenantRepo->find($tenantId)) {
            return $this->tenant;
        } else {
            throw new \Exception("No tenant found for {$tenantId}");
        }
    }

    /**
     * @param $subscriptionData
     * @return bool
     * @throws \Exception
     */
    public function addSubscription($subscriptionData)
    {
        // Create the subscription locally
        $subscription = new Subscription();
        $subscription->setTenant($this->tenant);
        $subscription->setAmount($subscriptionData['amount']);
        $subscription->setStatus(Subscription::STATUS_ACTIVE);
        $subscription->setCurrency($subscriptionData['currency']);

        // Save a new subscription
        $this->coreEntityManager->persist($subscription);

        // Also update the tenant
//        $this->coreEntityManager->persist($this->tenant);

        try {
            $this->coreEntityManager->flush();
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Could not save subscription: ".$e->getMessage());
        }
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Exception
     */
    private function getCoreEntityManager()
    {
        if ($url = getenv('RDS_URL')) {
            // Production
            $dbparts  = parse_url($url);
            $server   = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
        } else if (getenv('DEV_DB_USER')) {
            // Dev
            $server   = '127.0.0.1';
            $username = getenv('DEV_DB_USER');
            $password = getenv('DEV_DB_PASS');
        }

        if (isset($username) && isset($password)) {

            $conn = array(
                'driver'   => 'pdo_mysql',
                'port'     => 3306,
                'host'     => $server,
                'user'     => $username,
                'password' => $password,
                'dbname'   => $this->coreDbName
            );

            $this->coreEntityManager = \Doctrine\ORM\EntityManager::create(
                $conn,
                $this->em->getConfiguration(),
                $this->em->getEventManager()
            );

        } else {
            throw new \Exception("No username or password found.");
        }
    }

    /**
     * Save the tenant back into the tenant DB
     * @return bool
     * @throws \Exception
     */
    public function updateTenant()
    {
        $this->coreEntityManager->persist($this->tenant);
        try {
            $this->coreEntityManager->flush();
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Could not save tenant: ".$e->getMessage());
        }
    }

    /**
     * @return array
     */
    public function getPlans()
    {
        /** @var $repo \Annex\TenantBundle\Repository\PlanRepository */
        $repo = $this->coreEntityManager->getRepository('AnnexTenantBundle:Plan');

        $plans = $repo->findAll();

        return $plans;
    }

}