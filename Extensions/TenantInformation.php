<?php
namespace Annex\TenantBundle\Extensions;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManager;

/**
 * Class TenantInformation
 * @package TenantBundle\Extensions
 *
 * Make tenant information (from _core DB) available to controllers and templates
 */
class TenantInformation
{
    private $session;
    private $container;

    function __construct(Session $session, Container $container)
    {
        $this->session = $session;
        $this->container = $container;
    }

    /**
     * Session information is set in CustomConnectionFactory, when we go to _core DB
     * We don't use container in CustomConnectionFactory due to "Impossible to call set() on a frozen ParameterBag"
     * @return mixed
     */

    public function getAccountId()
    {
        return $this->session->get('account_id');
    }

    public function getAccountCode()
    {
        return $this->session->get('account_code');
    }

    public function getBrightpearlDataCentre()
    {
        return $this->session->get('brightpearl_data_centre');
    }

    public function getBrightpearlAccountCode()
    {
        return $this->session->get('brightpearl_account_code');
    }

    public function getBrightpearlToken()
    {
        return $this->session->get('brightpearl_token');
    }

    public function getAccountName()
    {
        return $this->session->get('account_name');
    }

    public function getAccountOwnerName()
    {
        return $this->session->get('account_owner_name');
    }

    public function getAccountOwnerEmail()
    {
        return $this->session->get('account_owner_email');
    }

    public function getAccountStatus()
    {
        return $this->session->get('account_status');
    }

    public function getAccountDomain()
    {
        return $this->session->get('account_domain');
    }

}