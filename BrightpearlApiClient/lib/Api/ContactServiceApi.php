<?php

namespace BrightpearlApiClient\Api;

use BrightpearlApiClient\Configuration;
use BrightpearlApiClient\ApiClient;
use BrightpearlApiClient\ApiException;
use BrightpearlApiClient\ObjectSerializer;

/**
 * Class ContactServiceApi
 * @package BrightpearlApiClient\Api
 */
class ContactServiceApi
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
     * @return ContactServiceApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * postContact
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Contact $contact  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContact($account_code, $contact)
    {
        list($response, $statusCode, $httpHeader) = $this->postContactWithHttpInfo ($account_code, $contact);
        return $response; 
    }


    /**
     * postContactWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Contact $contact  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactWithHttpInfo($account_code, $contact)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postContact');
        }
        // verify the required parameter 'contact' is set
        if ($contact === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contact when calling postContact');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact";
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
        if (isset($contact)) {
            $_tempBody = $contact;
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse200'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse200', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse200', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postContactGroup
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\ContactGroup $contact_group  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactGroup($account_code, $contact_group)
    {
        list($response, $statusCode, $httpHeader) = $this->postContactGroupWithHttpInfo ($account_code, $contact_group);
        return $response; 
    }


    /**
     * postContactGroupWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\ContactGroup $contact_group  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactGroupWithHttpInfo($account_code, $contact_group)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postContactGroup');
        }
        // verify the required parameter 'contact_group' is set
        if ($contact_group === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contact_group when calling postContactGroup');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact-group";
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
        if (isset($contact_group)) {
            $_tempBody = $contact_group;
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse200'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse200', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse200', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactGroupMemberSearch
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $columns  (optional)
     * @param string $filters  (optional)
     * @param string $sort  (optional)
     * @param int $page_size  (optional)
     * @param int $first_result  (optional)
     * @return \BrightpearlApiClient\Model\SearchResponse
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactGroupMemberSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactGroupMemberSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getContactGroupMemberSearchWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $columns  (optional)
     * @param string $filters  (optional)
     * @param string $sort  (optional)
     * @param int $page_size  (optional)
     * @param int $first_result  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\SearchResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactGroupMemberSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactGroupMemberSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact-group-member-search";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        // query params
        
        if ($columns !== null) {
            $queryParams['columns'] = $this->apiClient->getSerializer()->toQueryValue($columns);
        }// query params
        
        if ($filters !== null) {
            $queryParams['filters'] = $this->apiClient->getSerializer()->toQueryValue($filters);
        }// query params
        
        if ($sort !== null) {
            $queryParams['sort'] = $this->apiClient->getSerializer()->toQueryValue($sort);
        }// query params
        
        if ($page_size !== null) {
            $queryParams['pageSize'] = $this->apiClient->getSerializer()->toQueryValue($page_size);
        }// query params
        
        if ($first_result !== null) {
            $queryParams['firstResult'] = $this->apiClient->getSerializer()->toQueryValue($first_result);
        }
        
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
                $headerParams, '\BrightpearlApiClient\Model\SearchResponse'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\SearchResponse', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\SearchResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactGroupSearch
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $columns  (optional)
     * @param string $filters  (optional)
     * @param string $sort  (optional)
     * @param int $page_size  (optional)
     * @param int $first_result  (optional)
     * @return \BrightpearlApiClient\Model\SearchResponse
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactGroupSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactGroupSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getContactGroupSearchWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $columns  (optional)
     * @param string $filters  (optional)
     * @param string $sort  (optional)
     * @param int $page_size  (optional)
     * @param int $first_result  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\SearchResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactGroupSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactGroupSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact-group-search";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        // query params
        
        if ($columns !== null) {
            $queryParams['columns'] = $this->apiClient->getSerializer()->toQueryValue($columns);
        }// query params
        
        if ($filters !== null) {
            $queryParams['filters'] = $this->apiClient->getSerializer()->toQueryValue($filters);
        }// query params
        
        if ($sort !== null) {
            $queryParams['sort'] = $this->apiClient->getSerializer()->toQueryValue($sort);
        }// query params
        
        if ($page_size !== null) {
            $queryParams['pageSize'] = $this->apiClient->getSerializer()->toQueryValue($page_size);
        }// query params
        
        if ($first_result !== null) {
            $queryParams['firstResult'] = $this->apiClient->getSerializer()->toQueryValue($first_result);
        }
        
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
                $headerParams, '\BrightpearlApiClient\Model\SearchResponse'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\SearchResponse', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\SearchResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactGroupIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return \BrightpearlApiClient\Model\InlineResponse2006
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactGroupIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactGroupIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getContactGroupIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse2006, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactGroupIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactGroupIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getContactGroupIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact-group/{ID-SET}";
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
        
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($id_set),
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse2006'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse2006', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2006', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * putContactGroup
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set Contact Group ID (required)
     * @param \BrightpearlApiClient\Model\ContactGroup $contact_group  (required)
     * @return \BrightpearlApiClient\Model\EmptyObjectResponseModel
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function putContactGroup($account_code, $id_set, $contact_group)
    {
        list($response, $statusCode, $httpHeader) = $this->putContactGroupWithHttpInfo ($account_code, $id_set, $contact_group);
        return $response; 
    }


    /**
     * putContactGroupWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set Contact Group ID (required)
     * @param \BrightpearlApiClient\Model\ContactGroup $contact_group  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\EmptyObjectResponseModel, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function putContactGroupWithHttpInfo($account_code, $id_set, $contact_group)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling putContactGroup');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling putContactGroup');
        }
        // verify the required parameter 'contact_group' is set
        if ($contact_group === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contact_group when calling putContactGroup');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact-group/{ID-SET}";
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
        
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($id_set),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // body params
        $_tempBody = null;
        if (isset($contact_group)) {
            $_tempBody = $contact_group;
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
                $resourcePath, 'PUT',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\EmptyObjectResponseModel'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\EmptyObjectResponseModel', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\EmptyObjectResponseModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 400:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactGroupMemberIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact ID (required)
     * @param string $include_optional Include Contacts as an IDSet (optional)
     * @param string $exclude_optional Include Contacts as an array of IDs (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse2007
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactGroupMemberIDSet($account_code, $id, $include_optional = null, $exclude_optional = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactGroupMemberIDSetWithHttpInfo ($account_code, $id, $include_optional, $exclude_optional);
        return $response; 
    }


    /**
     * getContactGroupMemberIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact ID (required)
     * @param string $include_optional Include Contacts as an IDSet (optional)
     * @param string $exclude_optional Include Contacts as an array of IDs (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse2007, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactGroupMemberIDSetWithHttpInfo($account_code, $id, $include_optional = null, $exclude_optional = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactGroupMemberIDSet');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getContactGroupMemberIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact-group/{ID}/member";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));
  
        // query params
        
        if ($include_optional !== null) {
            $queryParams['includeOptional'] = $this->apiClient->getSerializer()->toQueryValue($include_optional);
        }// query params
        
        if ($exclude_optional !== null) {
            $queryParams['excludeOptional'] = $this->apiClient->getSerializer()->toQueryValue($exclude_optional);
        }
        
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse2007'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse2007', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2007', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postContactGroupMembers
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact Group ID (required)
     * @param \BrightpearlApiClient\Model\ContactGroupMember $contact_group_members  (required)
     * @return \BrightpearlApiClient\Model\EmptyObjectResponseModel
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactGroupMembers($account_code, $id, $contact_group_members)
    {
        list($response, $statusCode, $httpHeader) = $this->postContactGroupMembersWithHttpInfo ($account_code, $id, $contact_group_members);
        return $response; 
    }


    /**
     * postContactGroupMembersWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact Group ID (required)
     * @param \BrightpearlApiClient\Model\ContactGroupMember $contact_group_members  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\EmptyObjectResponseModel, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactGroupMembersWithHttpInfo($account_code, $id, $contact_group_members)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postContactGroupMembers');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postContactGroupMembers');
        }
        // verify the required parameter 'contact_group_members' is set
        if ($contact_group_members === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contact_group_members when calling postContactGroupMembers');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact-group/{ID}/member";
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
        if (isset($contact_group_members)) {
            $_tempBody = $contact_group_members;
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
                $headerParams, '\BrightpearlApiClient\Model\EmptyObjectResponseModel'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\EmptyObjectResponseModel', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\EmptyObjectResponseModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * deleteContactGroupIDMemberContactID
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact Group ID (required)
     * @param string $contact_id Member ID (required)
     * @return \BrightpearlApiClient\Model\EmptyObjectResponseModel
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteContactGroupIDMemberContactID($account_code, $id, $contact_id)
    {
        list($response, $statusCode, $httpHeader) = $this->deleteContactGroupIDMemberContactIDWithHttpInfo ($account_code, $id, $contact_id);
        return $response; 
    }


    /**
     * deleteContactGroupIDMemberContactIDWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact Group ID (required)
     * @param string $contact_id Member ID (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\EmptyObjectResponseModel, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteContactGroupIDMemberContactIDWithHttpInfo($account_code, $id, $contact_id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling deleteContactGroupIDMemberContactID');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling deleteContactGroupIDMemberContactID');
        }
        // verify the required parameter 'contact_id' is set
        if ($contact_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contact_id when calling deleteContactGroupIDMemberContactID');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact-group/{ID}/member/{CONTACT-ID}";
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
        }// path params
        
        if ($contact_id !== null) {
            $resourcePath = str_replace(
                "{" . "CONTACT-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($contact_id),
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
                $headerParams, '\BrightpearlApiClient\Model\EmptyObjectResponseModel'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\EmptyObjectResponseModel', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\EmptyObjectResponseModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactSearch
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $columns  (optional)
     * @param string $filters  (optional)
     * @param string $sort  (optional)
     * @param int $page_size  (optional)
     * @param int $first_result  (optional)
     * @return \BrightpearlApiClient\Model\SearchResponse
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getContactSearchWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $columns  (optional)
     * @param string $filters  (optional)
     * @param string $sort  (optional)
     * @param int $page_size  (optional)
     * @param int $first_result  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\SearchResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact-search";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));

        if ($columns !== null) {
            $queryParams['columns'] = $this->apiClient->getSerializer()->toQueryValue($columns);
        }// query params
        
        if ($filters !== null) {
            $queryParams['filters'] = $filters;
        }// query params
        
        if ($sort !== null) {
            $queryParams['sort'] = $this->apiClient->getSerializer()->toQueryValue($sort);
        }// query params
        
        if ($page_size !== null) {
            $queryParams['pageSize'] = $this->apiClient->getSerializer()->toQueryValue($page_size);
        }// query params
        
        if ($first_result !== null) {
            $queryParams['firstResult'] = $this->apiClient->getSerializer()->toQueryValue($first_result);
        }

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
                $headerParams, '\BrightpearlApiClient\Model\SearchResponse'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\SearchResponse', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\SearchResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postContactIDSetTagID
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $contact_id_set CONTACT ID SET (required)
     * @param string $tag_id Tag ID (required)
     * @return \BrightpearlApiClient\Model\InlineResponse2008
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactIDSetTagID($account_code, $contact_id_set, $tag_id)
    {
        list($response, $statusCode, $httpHeader) = $this->postContactIDSetTagIDWithHttpInfo ($account_code, $contact_id_set, $tag_id);
        return $response; 
    }


    /**
     * postContactIDSetTagIDWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $contact_id_set CONTACT ID SET (required)
     * @param string $tag_id Tag ID (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse2008, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactIDSetTagIDWithHttpInfo($account_code, $contact_id_set, $tag_id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postContactIDSetTagID');
        }
        // verify the required parameter 'contact_id_set' is set
        if ($contact_id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contact_id_set when calling postContactIDSetTagID');
        }
        // verify the required parameter 'tag_id' is set
        if ($tag_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_id when calling postContactIDSetTagID');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact/{CONTACT-ID-SET}/tag/{TAG-ID}";
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
        
        if ($contact_id_set !== null) {
            $resourcePath = str_replace(
                "{" . "CONTACT-ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($contact_id_set),
                $resourcePath
            );
        }// path params
        
        if ($tag_id !== null) {
            $resourcePath = str_replace(
                "{" . "TAG-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($tag_id),
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
                $resourcePath, 'POST',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse2008'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse2008', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2008', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 207:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2008', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * deleteContactIDSetTagID
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $contact_id_set CONTACT ID SET (required)
     * @param string $tag_id Tag ID (required)
     * @return \BrightpearlApiClient\Model\InlineResponse2008
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteContactIDSetTagID($account_code, $contact_id_set, $tag_id)
    {
        list($response, $statusCode, $httpHeader) = $this->deleteContactIDSetTagIDWithHttpInfo ($account_code, $contact_id_set, $tag_id);
        return $response; 
    }


    /**
     * deleteContactIDSetTagIDWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $contact_id_set CONTACT ID SET (required)
     * @param string $tag_id Tag ID (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse2008, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteContactIDSetTagIDWithHttpInfo($account_code, $contact_id_set, $tag_id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling deleteContactIDSetTagID');
        }
        // verify the required parameter 'contact_id_set' is set
        if ($contact_id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contact_id_set when calling deleteContactIDSetTagID');
        }
        // verify the required parameter 'tag_id' is set
        if ($tag_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $tag_id when calling deleteContactIDSetTagID');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact/{CONTACT-ID-SET}/tag/{TAG-ID}";
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
        
        if ($contact_id_set !== null) {
            $resourcePath = str_replace(
                "{" . "CONTACT-ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($contact_id_set),
                $resourcePath
            );
        }// path params
        
        if ($tag_id !== null) {
            $resourcePath = str_replace(
                "{" . "TAG-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($tag_id),
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse2008'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse2008', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2008', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 207:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2008', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return \BrightpearlApiClient\Model\ContactSearchResponse
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getContactIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\ContactSearchResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getContactIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact/{ID-SET}";
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
        
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($id_set),
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
                $headerParams, '\BrightpearlApiClient\Model\ContactSearchResponse'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\ContactSearchResponse', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ContactSearchResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * optionsContactIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20010
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function optionsContactIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->optionsContactIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * optionsContactIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20010, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function optionsContactIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling optionsContactIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling optionsContactIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact/{ID-SET}";
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
        
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($id_set),
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
                $resourcePath, 'OPTIONS',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20010'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20010', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20010', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * putContactIDSetStatus
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set CONTACT ID SET (required)
     * @param \BrightpearlApiClient\Model\ContactStatus $status  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse2008
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function putContactIDSetStatus($account_code, $id_set, $status)
    {
        list($response, $statusCode, $httpHeader) = $this->putContactIDSetStatusWithHttpInfo ($account_code, $id_set, $status);
        return $response; 
    }


    /**
     * putContactIDSetStatusWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set CONTACT ID SET (required)
     * @param \BrightpearlApiClient\Model\ContactStatus $status  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse2008, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function putContactIDSetStatusWithHttpInfo($account_code, $id_set, $status)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling putContactIDSetStatus');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling putContactIDSetStatus');
        }
        // verify the required parameter 'status' is set
        if ($status === null) {
            throw new \InvalidArgumentException('Missing the required parameter $status when calling putContactIDSetStatus');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact/{ID-SET}/status";
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
        
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($id_set),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // body params
        $_tempBody = null;
        if (isset($status)) {
            $_tempBody = $status;
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
                $resourcePath, 'PUT',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse2008'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse2008', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 207:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2008', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactCustomField
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact ID (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20011
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactCustomField($account_code, $id)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactCustomFieldWithHttpInfo ($account_code, $id);
        return $response; 
    }


    /**
     * getContactCustomFieldWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact ID (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20011, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactCustomFieldWithHttpInfo($account_code, $id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactCustomField');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getContactCustomField');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact/{ID}/custom-field";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20011'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20011', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20011', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * patchContactCustomField
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param int $id  (required)
     * @param \BrightpearlApiClient\Model\Customfieldpatch[] $custom_field_patch  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function patchContactCustomField($account_code, $id, $custom_field_patch)
    {
        list($response, $statusCode, $httpHeader) = $this->patchContactCustomFieldWithHttpInfo ($account_code, $id, $custom_field_patch);
        return $response; 
    }


    /**
     * patchContactCustomFieldWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param int $id  (required)
     * @param \BrightpearlApiClient\Model\Customfieldpatch[] $custom_field_patch  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function patchContactCustomFieldWithHttpInfo($account_code, $id, $custom_field_patch)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling patchContactCustomField');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling patchContactCustomField');
        }
        // verify the required parameter 'custom_field_patch' is set
        if ($custom_field_patch === null) {
            throw new \InvalidArgumentException('Missing the required parameter $custom_field_patch when calling patchContactCustomField');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact/{ID}/custom-field";
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
        if (isset($custom_field_patch)) {
            $_tempBody = $custom_field_patch;
        }
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'PATCH',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20012'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20012', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20012', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 500:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postContactIDNote
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact ID (required)
     * @param \BrightpearlApiClient\Model\ContactNote $contact_note  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactIDNote($account_code, $id, $contact_note)
    {
        list($response, $statusCode, $httpHeader) = $this->postContactIDNoteWithHttpInfo ($account_code, $id, $contact_note);
        return $response; 
    }


    /**
     * postContactIDNoteWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Contact ID (required)
     * @param \BrightpearlApiClient\Model\ContactNote $contact_note  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactIDNoteWithHttpInfo($account_code, $id, $contact_note)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postContactIDNote');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postContactIDNote');
        }
        // verify the required parameter 'contact_note' is set
        if ($contact_note === null) {
            throw new \InvalidArgumentException('Missing the required parameter $contact_note when calling postContactIDNote');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/contact/{ID}/note";
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
        if (isset($contact_note)) {
            $_tempBody = $contact_note;
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse200'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse200', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse200', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactLeadSource
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20013
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactLeadSource($account_code)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactLeadSourceWithHttpInfo ($account_code);
        return $response; 
    }


    /**
     * getContactLeadSourceWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20013, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactLeadSourceWithHttpInfo($account_code)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactLeadSource');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/lead-source";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20013'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20013', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20013', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactLeadSourceIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID-SET (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20013
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactLeadSourceIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactLeadSourceIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getContactLeadSourceIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID-SET (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20013, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactLeadSourceIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactLeadSourceIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getContactLeadSourceIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/lead-source/{ID-SET}";
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
        
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($id_set),
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20013'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20013', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20013', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postContactPostalAddress
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\PostalAddress $address ID-SET (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactPostalAddress($account_code, $address)
    {
        list($response, $statusCode, $httpHeader) = $this->postContactPostalAddressWithHttpInfo ($account_code, $address);
        return $response; 
    }


    /**
     * postContactPostalAddressWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\PostalAddress $address ID-SET (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postContactPostalAddressWithHttpInfo($account_code, $address)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postContactPostalAddress');
        }
        // verify the required parameter 'address' is set
        if ($address === null) {
            throw new \InvalidArgumentException('Missing the required parameter $address when calling postContactPostalAddress');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/postal-address";
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
        if (isset($address)) {
            $_tempBody = $address;
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse200'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse200', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse200', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactPostalAddressIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID-SET (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20014
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactPostalAddressIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactPostalAddressIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getContactPostalAddressIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID-SET (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20014, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactPostalAddressIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactPostalAddressIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getContactPostalAddressIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/postal-address/{ID-SET}";
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
        
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($id_set),
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20014'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20014', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20014', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactProject
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20015
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactProject($account_code)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactProjectWithHttpInfo ($account_code);
        return $response; 
    }


    /**
     * getContactProjectWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20015, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactProjectWithHttpInfo($account_code)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactProject');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/project";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20015'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20015', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20015', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactProjectIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID-SET (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20015
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactProjectIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactProjectIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getContactProjectIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID-SET (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20015, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactProjectIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactProjectIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getContactProjectIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/project/{ID-SET}";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = ApiClient::selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = ApiClient::selectHeaderContentType(array('application/json'));

        if ($account_code !== null) {
            $resourcePath = str_replace(
                "{" . "ACCOUNT-CODE" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_code),
                $resourcePath
            );
        }// path params
        
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($id_set),
                $resourcePath
            );
        }

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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20015'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20015', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20015', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactTag
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return \BrightpearlApiClient\Model\ContactTag
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactTag($account_code)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactTagWithHttpInfo ($account_code);
        return $response; 
    }

    /**
     * getContactTagWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\ContactTag, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactTagWithHttpInfo($account_code)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactTag');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/tag";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20016'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20016', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20016', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactTagIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID-SET (required)
     * @return \BrightpearlApiClient\Model\ContactTagSearchResponse
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactTagIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactTagIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getContactTagIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID-SET (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\ContactTag, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactTagIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactTagIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getContactTagIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/tag/{ID-SET}";
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
        // path params
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($id_set),
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
                $headerParams, '\BrightpearlApiClient\Model\ContactTagSearchResponse'
            );

            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\ContactTagSearchResponse', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ContactTagSearchResponse', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getContactCustomerOrSupplierCustomFieldMetaData
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $customersupplier  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20017
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactCustomerOrSupplierCustomFieldMetaData($account_code, $customersupplier)
    {
        list($response, $statusCode, $httpHeader) = $this->getContactCustomerOrSupplierCustomFieldMetaDataWithHttpInfo ($account_code, $customersupplier);
        return $response; 
    }


    /**
     * getContactCustomerOrSupplierCustomFieldMetaDataWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $customersupplier  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20017, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getContactCustomerOrSupplierCustomFieldMetaDataWithHttpInfo($account_code, $customersupplier)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getContactCustomerOrSupplierCustomFieldMetaData');
        }
        // verify the required parameter 'customersupplier' is set
        if ($customersupplier === null) {
            throw new \InvalidArgumentException('Missing the required parameter $customersupplier when calling getContactCustomerOrSupplierCustomFieldMetaData');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/contact-service/{customer|supplier}/custom-field-meta-data";
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
        
        if ($customersupplier !== null) {
            $resourcePath = str_replace(
                "{" . "customer|supplier" . "}",
                $this->apiClient->getSerializer()->toPathValue($customersupplier),
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20017'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20017', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20017', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            case 404:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
}
