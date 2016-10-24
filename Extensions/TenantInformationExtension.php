<?php
namespace Annex\TenantBundle\Extensions;

use Annex\TenantBundle\Extensions\TenantInformation;

class TenantInformationExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    protected $tenantInformation;

    function __construct(TenantInformation $tenantInformation) {
        $this->tenantInformation = $tenantInformation;
    }

    public function getGlobals() {
        return array(
            'tenantInformation' => $this->tenantInformation
        );
    }

    public function getName()
    {
        return 'tenantInformation';
    }

}