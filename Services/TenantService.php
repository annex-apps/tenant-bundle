<?php

/**
 * Service used to fetch tenant info
 *
 */

namespace Annex\TenantBundle\Services;

use Annex\TenantBundle\Entity\Invoice;
use Annex\TenantBundle\Entity\Plan;
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
    public $tenant;

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
     * @param $customerId
     * @return Tenant|null|object
     * @throws \Exception
     */
    public function getTenantByStripeCustomerId($customerId)
    {
        /** @var $tenantRepo \Annex\TenantBundle\Repository\TenantRepository */
        $tenantRepo = $this->coreEntityManager->getRepository('AnnexTenantBundle:Tenant');

        if ($this->tenant = $tenantRepo->findOneBy(['stripeCustomerId' => $customerId])) {
            return $this->tenant;
        } else {
            return false;
//            throw new \Exception("No tenant found");
        }
    }

    /**
     * @param $subscriptionData
     * @param Plan $plan
     * @return bool
     * @throws \Exception
     */
    public function addSubscription($subscriptionData, Plan $plan)
    {
        // Create the subscription locally
        $subscription = new Subscription();
        $subscription->setTenant($this->tenant);
        $subscription->setAmount($subscriptionData['plan']['amount']);
        $subscription->setCurrency($subscriptionData['plan']['currency']);
        $subscription->setStatus(Subscription::STATUS_ACTIVE);
        $subscription->setStripeId($subscriptionData['id']);
        $subscription->setPlan($plan);

        // Save a new subscription
        $this->coreEntityManager->persist($subscription);

        try {
            $this->coreEntityManager->flush();

            // Also update the tenant
            $this->tenant->setSubscription($subscription);
            $this->tenant->setStatus(Tenant::STATUS_LIVE);

            $this->coreEntityManager->persist($this->tenant);
            $this->coreEntityManager->flush();

            return true;
        } catch (\Exception $e) {
            throw new \Exception("Could not save subscription: ".$e->getMessage());
        }
    }

    /**
     * @param \Annex\TenantBundle\Entity\Invoice $invoice
     * @return bool
     * @throws \Exception
     */
    public function addInvoice($invoice)
    {
        // Create the invoice in local DB
        $this->coreEntityManager->persist($invoice);
        try {
            $this->coreEntityManager->flush();
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Could not save invoice: ".$e->getMessage());
        }
    }

    /**
     * @param array $filter
     * @return array|null|object
     */
    public function getInvoices($filter = [])
    {
        /** @var $repo \Annex\TenantBundle\Repository\InvoiceRepository */
        $repo = $this->coreEntityManager->getRepository('AnnexTenantBundle:Invoice');

        if (isset($filter['id'])) {
            $criteria = [
                'tenant' => $this->tenant->getId(),
                'id'     => $filter['id']
            ];
        } else {
            $criteria = [
                'tenant' => $this->tenant->getId()
            ];
        }

        $invoices = $repo->findBy($criteria);

        return $invoices;
    }

    /**
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function cancelSubscription($id)
    {
        /** @var $repo \Annex\TenantBundle\Repository\SubscriptionRepository */
        $repo = $this->coreEntityManager->getRepository('AnnexTenantBundle:Subscription');

        /** @var $subscription \Annex\TenantBundle\Entity\Subscription */
        if (!$subscription = $repo->find($id)) {
            throw new \Exception("Could not find a subscription with ID {$id}");
        }

        // Update the status
        $subscription->setStatus(Subscription::STATUS_CANCELED);
        $this->coreEntityManager->persist($subscription);

        // Also update the tenant
        $this->tenant->setSubscription(null);
        $this->tenant->setStatus(Tenant::STATUS_CANCELED);
        $this->coreEntityManager->persist($this->tenant);

        try {
            $this->coreEntityManager->flush();
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Could not save subscription: ".$e->getMessage());
        }
    }

    /**
     * @param string $newPlanCode
     * @return bool
     * @throws \Exception
     */
    public function changePlan($newPlanCode)
    {
        /** @var $repo \Annex\TenantBundle\Repository\PlanRepository */
        $repo = $this->coreEntityManager->getRepository('AnnexTenantBundle:Plan');

        /** @var $plan \Annex\TenantBundle\Entity\Plan */
        if (!$plan = $repo->findOneBy(['code' => $newPlanCode])) {
            throw new \Exception("Could not find a plan with code {$newPlanCode}");
        }

        $subscription = $this->tenant->getSubscription();
        $subscription->setPlan($plan);
        $this->coreEntityManager->persist($subscription);

        try {
            $this->coreEntityManager->flush();
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Could not update subscription: ".$e->getMessage());
        }
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Exception
     */
    private function getCoreEntityManager()
    {
        $server = null;

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

            $this->coreEntityManager = EntityManager::create(
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
     * @param array $filter
     * @return array|null|object
     */
    public function getPlans($filter = [])
    {
        /** @var $repo \Annex\TenantBundle\Repository\PlanRepository */
        $repo = $this->coreEntityManager->getRepository('AnnexTenantBundle:Plan');

        if (isset($filter['code'])) {
            $plans = $repo->findOneBy(['code' => $filter['code']]);
        } else if (count($filter) > 0) {
            $plans = $repo->findBy($filter, ['amount' => 'ASC']);
        } else {
            $plans = $repo->findBy([], ['amount' => 'ASC']);
        }

        return $plans;
    }

}