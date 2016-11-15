<?php

namespace Annex\TenantBundle\Services\Brightpearl;

use Annex\TenantBundle\Entity\Tenant;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class Utility
{

    /** @var Container  */
    private $container;

    /** @var Tenant */
    private $tenant;

    private $em;

    public $errors   = [];
    public $messages = [];

    public function __construct(Container $container, EntityManager $em)
    {
        $this->container = $container;
        $this->em = $em;
    }

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * @param $brightpearlAccountCode
     * @return bool
     */
    public function getBrightpearlToken($brightpearlAccountCode) {
        if ($installedAccounts = $this->getInstalledAccounts()) {
            foreach ($installedAccounts AS $account) {
                if ($account->accountCode == $brightpearlAccountCode) {
                    return $account->unsignedAccountToken;
                }
            }
        }
        die('Brightpearl account <strong>'.$brightpearlAccountCode.'</strong> does not have this app installed. Please install the app and try again.');
    }

    /**
     * @return bool
     */
    public function unInstallApp()
    {

//        /** @var \Annex\TenantBundle\Repository\TenantRepository $tenantRepo */
//        $tenantRepo = $this->em->getRepository('AnnexTenantBundle:Tenant');
//
//        $brightpearlAccountCode = $this->tenant->getBrightpearlAccountCode();
//
//        /** @var $tenant \Annex\TenantBundle\Entity\Tenant */
//        if (!$tenant = $tenantRepo->findOneBy(['brightpearlAccountCode' => $brightpearlAccountCode])) {
//            return false;
//        }
//
//        $tenant->setStatus('UNINSTALLED');
//
//        try {
//            $this->em->flush();
//        } catch (\Exception $e) {
//
//        }
//
//        return true;

    }

    /**
     * Get the Brightpearl accounts which have this app installed
     * @return array|bool
     */
    public function getInstalledAccounts()
    {
        if ($installedAccounts = $this->installedAccountsApiGet()) {
            return $installedAccounts;
        } else {
            return false;
        }
    }

    /**
     * @return object
     */
    function installedAccountsApiGet() {

        // Developer token
        $token      = 'WvzbxtcU9VLMIr7geVQIMSC5219Mvi0960EyEePjGeM=';
        $appRef     = $this->container->getParameter('app_info.brightpearl_ref');
        $secretKey  = $this->container->getParameter('brightpearl_secret');
        $devToken   = base64_encode(hash_hmac('sha256', $token, $secretKey, true));

        $ch = curl_init();

        $url = 'https://ws-eu1.brightpearl.com/developer-tools/christanner/installed-accounts/'.$appRef;

        $headers = array(
            "brightpearl-dev-ref: christanner",
            "brightpearl-dev-token: {$devToken}",
            "brightpearl-app-ref: {$appRef}",
            'Content-Type: application/json;charset=utf-8'
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        try {

            $result = curl_exec($ch);

            $responseCode    = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $responseContent = json_decode($result);

            curl_close($ch);

            if ( 200 == $responseCode || 207 == $responseCode ) {
                return $responseContent->response;
            } else {
                // FAIL
                if ( is_array($responseContent->errors) && count($responseContent->errors) > 0 ) {
                    foreach ($responseContent->errors as $error) {
                        $this->errors[] = $error->code . ':' . $error->message;
                    }
                } else if ( isset($responseContent) ) {
                    // Auth message
                    $this->errors[] = $responseContent;
                }
                return false;
            }

        } catch (\Exception $e) {
            die($e->getMessage());
        }

    }

}