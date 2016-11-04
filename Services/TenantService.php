<?php

/**
 * Service used to fetch tenant info
 *
 */

namespace Annex\TenantBundle\Services;

use Annex\TenantBundle\Entity\Tenant;
use Doctrine\ORM\EntityManager;

class TenantService
{
    /** @var string */
    private $tenantDb;

    /** @var EntityManager  */
    private $em;

    /** @var EntityManager  */
    private $tenantEntityManager;

    /** @var Tenant */
    private $tenant;

    public function __construct(EntityManager $em, $tenantDb)
    {
        $this->em = $em;
        $this->tenantDb = $tenantDb;

        $this->getTenantEntityManager();
    }

    /**
     * @param $tenantId
     * @return Tenant|null|object
     * @throws \Exception
     */
    public function getTenant($tenantId)
    {
        /** @var $repo \Annex\TenantBundle\Repository\TenantRepository */
        $tenantRepo = $this->tenantEntityManager->getRepository('AnnexTenantBundle:Tenant');

        if ($this->tenant = $tenantRepo->find($tenantId)) {
            return $this->tenant;
        } else {
            throw new \Exception("No tenant found for {$tenantId}");
        }
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Exception
     */
    private function getTenantEntityManager()
    {
        if ($url = getenv('RDS_URL')) {
            // Production
            $dbparts = parse_url($url);
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
        } else if (getenv('DEV_DB_USER')) {
            // Dev
            $username = getenv('DEV_DB_USER');
            $password = getenv('DEV_DB_PASS');
        }

        if (isset($username) && isset($password)) {

            $conn = array(
                'driver'   => 'pdo_mysql',
                'user'     => $username,
                'password' => $password,
                'dbname'   => $this->tenantDb
            );

            $this->tenantEntityManager = \Doctrine\ORM\EntityManager::create(
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
    public function persist()
    {
        $this->tenantEntityManager->persist($this->tenant);
        try {
            $this->tenantEntityManager->flush();
            return true;
        } catch (\Exception $e) {
            throw new \Exception("Could not save tenant: ".$e->getMessage());
        }
    }

}