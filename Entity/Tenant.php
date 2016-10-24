<?php

namespace Annex\TenantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tenant
 *
 * @ORM\Table(name="notifier_core.tenant", options={"collate"="utf8mb4_unicode_ci", "charset"="utf8mb4"})
 * @ORM\Entity(repositoryClass="Annex\TenantBundle\Repository\TenantRepository")
 */
class Tenant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="stub", type="string", length=32, unique=true)
     */
    private $stub;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_name", type="string", length=255)
     */
    private $ownerName;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_email", type="string", length=255)
     */
    private $ownerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="db_schema", type="string", length=255, nullable=true)
     */
    private $dbSchema;

    /**
     * @var string
     *
     * @ORM\Column(name="brightpearl_account_code", type="string", length=128)
     */
    private $brightpearlAccountCode;

    /**
     * @var string
     *
     * @ORM\Column(name="brightpearl_data_centre", type="string", length=4)
     */
    private $brightpearlDataCentre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_access_at", type="datetime", nullable=true)
     */
    private $lastAccessAt;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status = 'PENDING';

    /**
     * @var string
     *
     * @ORM\Column(name="brightpearl_token", type="string", length=255, nullable=true)
     */
    private $brightpearlToken;

    /**
     * @var string
     *
     * @ORM\Column(name="plan", type="string", length=128)
     */
    private $plan = 'BETA';

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set stub
     *
     * @param string $stub
     *
     * @return Tenant
     */
    public function setStub($stub)
    {
        $this->stub = $stub;

        return $this;
    }

    /**
     * Get stub
     *
     * @return string
     */
    public function getStub()
    {
        return $this->stub;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tenant
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set dbSchema
     *
     * @param string $dbSchema
     *
     * @return Tenant
     */
    public function setDbSchema($dbSchema)
    {
        $this->dbSchema = $dbSchema;

        return $this;
    }

    /**
     * Get dbSchema
     *
     * @return string
     */
    public function getDbSchema()
    {
        return $this->dbSchema;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Tenant
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set lastAccessAt
     *
     * @param \DateTime $lastAccessAt
     *
     * @return Tenant
     */
    public function setLastAccessAt($lastAccessAt)
    {
        $this->lastAccessAt = $lastAccessAt;

        return $this;
    }

    /**
     * Get lastAccessAt
     *
     * @return \DateTime
     */
    public function getLastAccessAt()
    {
        return $this->lastAccessAt;
    }

    /**
     * Set ownerName
     *
     * @param string $ownerName
     *
     * @return Tenant
     */
    public function setOwnerName($ownerName)
    {
        $this->ownerName = $ownerName;

        return $this;
    }

    /**
     * Get ownerName
     *
     * @return string
     */
    public function getOwnerName()
    {
        return $this->ownerName;
    }

    /**
     * Set ownerEmail
     *
     * @param string $ownerEmail
     *
     * @return Tenant
     */
    public function setOwnerEmail($ownerEmail)
    {
        $this->ownerEmail = $ownerEmail;

        return $this;
    }

    /**
     * Get ownerEmail
     *
     * @return string
     */
    public function getOwnerEmail()
    {
        return $this->ownerEmail;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Tenant
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set brightpearlAccountCode
     *
     * @param string $brightpearlAccountCode
     *
     * @return Tenant
     */
    public function setBrightpearlAccountCode($brightpearlAccountCode)
    {
        $this->brightpearlAccountCode = $brightpearlAccountCode;

        return $this;
    }

    /**
     * Get brightpearlAccountCode
     *
     * @return string
     */
    public function getBrightpearlAccountCode()
    {
        return $this->brightpearlAccountCode;
    }

    /**
     * Set brightpearlDataCentre
     *
     * @param string $brightpearlDataCentre
     *
     * @return Tenant
     */
    public function setBrightpearlDataCentre($brightpearlDataCentre)
    {
        $this->brightpearlDataCentre = $brightpearlDataCentre;

        return $this;
    }

    /**
     * Get brightpearlDataCentre
     *
     * @return string
     */
    public function getBrightpearlDataCentre()
    {
        return $this->brightpearlDataCentre;
    }

    /**
     * Set brightpearlToken
     *
     * @param string $brightpearlToken
     *
     * @return Tenant
     */
    public function setBrightpearlToken($brightpearlToken)
    {
        $this->brightpearlToken = $brightpearlToken;

        return $this;
    }

    /**
     * Get brightpearlToken
     *
     * @return string
     */
    public function getBrightpearlToken()
    {
        return $this->brightpearlToken;
    }

    /**
     * Set plan
     *
     * @param string $plan
     *
     * @return Tenant
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return string
     */
    public function getPlan()
    {
        return $this->plan;
    }
}
