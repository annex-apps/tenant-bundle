<?php
/**
 * IntegrationServiceApi
 * PHP version 5
 *
 * @category Class
 * @package  BrightpearlApiClient
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
/**
 *  Copyright 2016 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program. 
 * https://github.com/swagger-api/swagger-codegen 
 * Do not edit the class manually.
 */

namespace Annex\TenantBundle\Services\BrightpearlApiClient\Api;

use Annex\TenantBundle\Services\BrightpearlApiClient\Configuration;
use Annex\TenantBundle\Services\BrightpearlApiClient\ApiClient;
use Annex\TenantBundle\Services\BrightpearlApiClient\ApiException;
use Annex\TenantBundle\Services\BrightpearlApiClient\ObjectSerializer;

/**
 * IntegrationServiceApi Class Doc Comment
 *
 * @category Class
 * @package  BrightpearlApiClient
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class IntegrationServiceApi
{

    /**
     * API Client
     * @var \BrightpearlApiClient\ApiClient instance of the ApiClient
     */
    protected $apiClient;
  
    /**
     * Constructor
     * @param \BrightpearlApiClient\ApiClient|null $apiClient The api client to use
     */
    function __construct($apiClient = null)
    {
        $this->apiClient = $apiClient;
    }
  
    /**
     * Get API client
     * @return \BrightpearlApiClient\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }
  
    /**
     * Set the API client
     * @param \BrightpearlApiClient\ApiClient $apiClient set the API client
     * @return IntegrationServiceApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * getAccountConfiguration
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20018
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountConfiguration($account_code)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountConfigurationWithHttpInfo ($account_code);
        return $response; 
    }


    /**
     * getAccountConfigurationWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20018, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountConfigurationWithHttpInfo($account_code)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountConfiguration');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/integration-service/account-configuration";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        
        
        // path params
        
        if ($account_code !== null) {
            $resourcePath = str_replace(
                "{" . "ACCOUNT-CODE" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_code),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-dev-ref');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-dev-ref'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20018'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(ObjectSerializer::deserialize($response, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20018', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20018', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getWebhook
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20019
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWebhook($account_code)
    {
        list($response, $statusCode, $httpHeader) = $this->getWebhookWithHttpInfo ($account_code);
        return $response; 
    }


    /**
     * getWebhookWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20019, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWebhookWithHttpInfo($account_code)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWebhook');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/integration-service/webhook";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        
        
        // path params
        
        if ($account_code !== null) {
            $resourcePath = str_replace(
                "{" . "ACCOUNT-CODE" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_code),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-dev-ref');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-dev-ref'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20019'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(ObjectSerializer::deserialize($response, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20019', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20019', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postWebhook
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Webhook $webhook  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWebhook($account_code, $webhook)
    {
        list($response, $statusCode, $httpHeader) = $this->postWebhookWithHttpInfo ($account_code, $webhook);
        return $response; 
    }


    /**
     * postWebhookWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Webhook $webhook  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWebhookWithHttpInfo($account_code, $webhook)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWebhook');
        }
        // verify the required parameter 'webhook' is set
        if ($webhook === null) {
            throw new \InvalidArgumentException('Missing the required parameter $webhook when calling postWebhook');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/integration-service/webhook";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
        
        // path params
        if ($account_code !== null) {
            $resourcePath = str_replace(
                "{" . "ACCOUNT-CODE" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_code),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);
        
        // body params
        $_tempBody = null;
        if (isset($webhook)) {
            $_tempBody = $webhook;
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-dev-ref');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-dev-ref'] = $apiKey;
        }

        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'POST',
                $queryParams, $httpBody,
                $headerParams, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse200'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(ObjectSerializer::deserialize($response, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse200', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse200', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getWebhookIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $idid_set ID Set (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20019
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWebhookIDSet($account_code, $idid_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getWebhookIDSetWithHttpInfo ($account_code, $idid_set);
        return $response; 
    }


    /**
     * getWebhookIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $idid_set ID Set (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20019, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWebhookIDSetWithHttpInfo($account_code, $idid_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWebhookIDSet');
        }
        // verify the required parameter 'idid_set' is set
        if ($idid_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $idid_set when calling getWebhookIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/integration-service/webhook/{ID/ID-SET}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
        
        // path params
        
        if ($account_code !== null) {
            $resourcePath = str_replace(
                "{" . "ACCOUNT-CODE" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_code),
                $resourcePath
            );
        }// path params
        
        if ($idid_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID/ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($idid_set),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-dev-ref');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-dev-ref'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20019'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(ObjectSerializer::deserialize($response, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20019', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20019', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * deleteWebhookID
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $idid_set ID (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWebhookID($account_code, $idid_set)
    {
        list($response, $statusCode, $httpHeader) = $this->deleteWebhookIDWithHttpInfo ($account_code, $idid_set);
        return $response; 
    }


    /**
     * deleteWebhookIDWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $idid_set ID (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWebhookIDWithHttpInfo($account_code, $idid_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling deleteWebhookID');
        }
        // verify the required parameter 'idid_set' is set
        if ($idid_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $idid_set when calling deleteWebhookID');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/integration-service/webhook/{ID/ID-SET}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        
        
        // path params
        
        if ($account_code !== null) {
            $resourcePath = str_replace(
                "{" . "ACCOUNT-CODE" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_code),
                $resourcePath
            );
        }// path params
        
        if ($idid_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID/ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($idid_set),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-dev-ref');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-dev-ref'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'DELETE',
                $queryParams, $httpBody,
                $headerParams, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20012'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(ObjectSerializer::deserialize($response, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20012', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\InlineResponse20012', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postWebhookIDSimulate
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID (required)
     * @param \BrightpearlApiClient\Model\SimulateWebhook $webhook  (required)
     * @return \BrightpearlApiClient\Model\EmptyObjectResponseModel
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWebhookIDSimulate($account_code, $id, $webhook)
    {
        list($response, $statusCode, $httpHeader) = $this->postWebhookIDSimulateWithHttpInfo ($account_code, $id, $webhook);
        return $response; 
    }


    /**
     * postWebhookIDSimulateWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID (required)
     * @param \BrightpearlApiClient\Model\SimulateWebhook $webhook  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\EmptyObjectResponseModel, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWebhookIDSimulateWithHttpInfo($account_code, $id, $webhook)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWebhookIDSimulate');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWebhookIDSimulate');
        }
        // verify the required parameter 'webhook' is set
        if ($webhook === null) {
            throw new \InvalidArgumentException('Missing the required parameter $webhook when calling postWebhookIDSimulate');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/integration-service/webhook/{ID}/simulate";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        
        
        // path params
        
        if ($account_code !== null) {
            $resourcePath = str_replace(
                "{" . "ACCOUNT-CODE" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_code),
                $resourcePath
            );
        }// path params
        
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // body params
        $_tempBody = null;
        if (isset($webhook)) {
            $_tempBody = $webhook;
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-dev-ref');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-dev-ref'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'POST',
                $queryParams, $httpBody,
                $headerParams, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\EmptyObjectResponseModel'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(ObjectSerializer::deserialize($response, '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\EmptyObjectResponseModel', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\EmptyObjectResponseModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = ObjectSerializer::deserialize($e->getResponseBody(), '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
}
