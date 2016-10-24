<?php

namespace Annex\TenantBundle\Repository;

/**
 * TenantRepository
 *
 */
class TenantRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * @return array
     */
    public function findOneBySchema($schema)
    {
        return $this->getEntityManager()
            ->createQuery("SELECT t FROM TenantBundle:Tenant t WHERE dbSchema = '{$schema}'")
            ->getResult();
    }

}
