<?php

/**
 * Service used to fetch tenant info
 *
 */

namespace Annex\TenantBundle\Services;

use Symfony\Component\HttpFoundation\Session\Session;

class Tenant
{
    /**
     * @var Session
     */
    public $session;

    private $tenant;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function getTenant()
    {
        $this->tenant = unserialize($this->session->get('tenant'));
        return $this->tenant;
    }

    public function getBrightpearlAccountCode()
    {
        return $this->tenant['brightpearl_account_code'];
    }

    public function getBrightpearlToken()
    {
        return $this->tenant['brightpearl_token'];
    }

    public function getBrightpearlDataCentre()
    {
        return $this->tenant['brightpearl_data_centre'];
    }
}