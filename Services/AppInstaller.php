<?php

/**
 * Handles the communication with Brightpearl to get an account token when installing an app
 *
 */

namespace Annex\TenantBundle\Services;

use Postmark\PostmarkClient;
use Postmark\Models\PostmarkException;
use Doctrine\DBAL\Driver\PDOException;
use Symfony\Component\DependencyInjection\Container;
use Doctrine\ORM\EntityManager;


class AppInstaller
{

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var Container
     */
    private $container;

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(Container $container, EntityManager $em, \Twig_Environment $twig)
    {
        $this->container = $container;
        $this->em        = $em;
        $this->twig      = $twig;
    }

    public function installApp($accountCode, $appCode)
    {

    }

}
