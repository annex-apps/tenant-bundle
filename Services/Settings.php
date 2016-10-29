<?php

/**
 * Service used to fetch all the settings from the DB
 *
 */

namespace Annex\TenantBundle\Services;

use Doctrine\ORM\EntityManager;

class Settings
{

    protected $em;

    public $settings = array();

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getSettingValue($key)
    {
        if ($key && isset($this->settings[$key])) {
            return $this->settings[$key];
        } else {
            /** @var $repo \Annex\TenantBundle\Repository\SettingRepository */
            $repo =  $this->em->getRepository('AnnexTenantBundle:Setting');
            if ($setting = $repo->findOneBy(['setupKey' => $key])) {
                $this->settings[$key] = $setting->getSetupValue();
                return $setting->getSetupValue();
            } else {
                return '';
            }
        }
    }
}