<?php

namespace Annex\TenantBundle\Services\Brightpearl;

use Annex\TenantBundle\Entity\App;
use Annex\TenantBundle\Extensions\TenantInformation;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class Utility
{

    private $container;
    private $tenantInformation;
    private $em;

    public $errors   = [];
    public $messages = [];

    public function __construct(Container $container, TenantInformation $tenantInformation, EntityManager $em)
    {
        $this->container = $container;
        $this->tenantInformation = $tenantInformation;
        $this->em = $em;
    }

    /**
     * @param $brightpearlAccountCode
     * @return bool
     */
    public function getBrightpearlToken($brightpearlAccountCode) {

        if ($this->container->getParameter('kernel.environment') == 'dev') {
            return 'token';
        }

        if ($installedAccounts = $this->getInstalledAccounts()) {
            foreach ($installedAccounts AS $account) {
                if ($account->accountCode == $brightpearlAccountCode) {
                    return $account->unsignedAccountToken;
                }
            }
        }

        die('Account '.$brightpearlAccountCode.' does not have this app installed.');
    }

    /**
     * @return bool
     */
//    public function activateApp()
//    {
//        /** @var \Annex\TenantBundle\Entity\TenantRepository $tenantRepo */
//        $tenantRepo = $this->em->getRepository('AnnexTenantBundle:Tenant');
//
//        // Account code comes from domain stub
//        $brightpearlAccountCode = $this->tenantInformation->getBrightpearlAccountCode();
//
//        /** @var $tenant \Annex\TenantBundle\Entity\Tenant */
//        if (!$tenant = $tenantRepo->findOneBy(['brightpearlAccountCode' => $brightpearlAccountCode])) {
//            return false;
//        }
//
//        // Install : update the tenant details with Brightpearl token
//        if ($installedAccounts = $this->getInstalledAccounts()) {
//            foreach ($installedAccounts AS $account) {
//                if ($account->accountCode == $brightpearlAccountCode) {
//                    $token = $account->unsignedAccountToken;
//
//                    $tenant->setBrightpearlToken($token);
//                    $this->em->persist($tenant);
//
//                    try {
//                        $this->em->flush();
//                    } catch (\Exception $e) {
//
//                    }
//                }
//            }
//        }
//
//        return true;
//    }

    /**
     * @return bool
     */
    public function unInstallApp()
    {

        /** @var \Annex\TenantBundle\Entity\TenantRepository $tenantRepo */
        $tenantRepo = $this->em->getRepository('AnnexTenantBundle:Tenant');

        $brightpearlAccountCode = $this->tenantInformation->getBrightpearlAccountCode();

        /** @var $tenant \Annex\TenantBundle\Entity\Tenant */
        if (!$tenant = $tenantRepo->findOneBy(['brightpearlAccountCode' => $brightpearlAccountCode])) {
            return false;
        }

        $tenant->setStatus('UNINSTALLED');

        try {
            $this->em->flush();
        } catch (\Exception $e) {

        }

        return true;

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