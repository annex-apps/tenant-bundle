<?php

namespace Annex\TenantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Setting
 *
 * @ORM\Table(options={"collate"="utf8mb4_unicode_ci", "charset"="utf8mb4"})
 * @ORM\Entity(repositoryClass="Annex\TenantBundle\Repository\SettingRepository")
 */
class Setting
{

    /**
     * @var string
     *
     * @ORM\Column(name="setup_key", type="string", length=128, unique=true)
     * @ORM\Id
     */
    private $setupKey;

    /**
     * @var string
     *
     * @ORM\Column(name="setup_value", type="string", length=128)
     */
    private $setupValue;

    /**
     * Set setupKey
     *
     * @param string $setupKey
     *
     * @return Setting
     */
    public function setSetupKey($setupKey)
    {
        $this->setupKey = $setupKey;

        return $this;
    }

    /**
     * Get setupKey
     *
     * @return string
     */
    public function getSetupKey()
    {
        return $this->setupKey;
    }

    /**
     * Set setupValue
     *
     * @param string $setupValue
     *
     * @return Setting
     */
    public function setSetupValue($setupValue)
    {
        $this->setupValue = $setupValue;

        return $this;
    }

    /**
     * Get setupValue
     *
     * @return string
     */
    public function getSetupValue()
    {
        return $this->setupValue;
    }
}