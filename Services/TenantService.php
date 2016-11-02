<?php

/**
 * Service used to fetch tenant info
 *
 */

namespace Annex\TenantBundle\Services;

use Annex\TenantBundle\Entity\Tenant;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;

class TenantService
{
    /** @var Session */
    public $session;

    /** @var EntityManager  */
    private $em;

    /** @var Tenant */
    private $tenant;

    public function __construct(Session $session, EntityManager $em)
    {
        $this->session = $session;
        $this->em = $em;
    }

    public function getTenant($tenantId)
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
                'dbname'   => 'notifier_core'
            );

            $tenantEm = \Doctrine\ORM\EntityManager::create(
                $conn,
                $this->em->getConfiguration(),
                $this->em->getEventManager()
            );

            /** @var $repo \Annex\TenantBundle\Repository\TenantRepository */
            $tenantRepo = $tenantEm->getRepository('AnnexTenantBundle:Tenant');

            if ($this->tenant = $tenantRepo->find($tenantId)) {
                return $this->tenant;
            } else {
                throw new \Exception("No tenant found");
            }

        } else {
            throw new \Exception("No username or password found");
        }

    }

    public function addTenant()
    {

    }

}