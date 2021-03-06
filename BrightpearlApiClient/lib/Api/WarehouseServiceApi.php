<?php

namespace BrightpearlApiClient\Api;

use BrightpearlApiClient\Configuration;
use BrightpearlApiClient\ApiClient;
use BrightpearlApiClient\ApiException;
use BrightpearlApiClient\ObjectSerializer;

/**
 * Class WarehouseServiceApi
 * @package BrightpearlApiClient\Api
 */
class WarehouseServiceApi
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
     * @return WarehouseServiceApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * postWarehouseStockTransfer
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Warehouse $warehouse  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseStockTransfer($account_code, $warehouse = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseStockTransferWithHttpInfo ($account_code, $warehouse);
        return $response; 
    }


    /**
     * postWarehouseStockTransferWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Warehouse $warehouse  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseStockTransferWithHttpInfo($account_code, $warehouse = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseStockTransfer');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service";
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
        if (isset($warehouse)) {
            $_tempBody = $warehouse;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseFulfilmentSource
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set IDSet of the warehouse(s) (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20040
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseFulfilmentSource($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseFulfilmentSourceWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getWarehouseFulfilmentSourceWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set IDSet of the warehouse(s) (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20040, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseFulfilmentSourceWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseFulfilmentSource');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getWarehouseFulfilmentSource');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/fulfilment-source/{ID-SET}";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20040'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20040', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20040', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseGoodsInNoteSearch
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
    public function getWarehouseGoodsInNoteSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseGoodsInNoteSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getWarehouseGoodsInNoteSearchWithHttpInfo
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
    public function getWarehouseGoodsInNoteSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseGoodsInNoteSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/goods-in-search";
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
     * getWarehouseGoodsMovementSearch
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
    public function getWarehouseGoodsMovementSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseGoodsMovementSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getWarehouseGoodsMovementSearchWithHttpInfo
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
    public function getWarehouseGoodsMovementSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseGoodsMovementSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/goods-movement-search";
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
     * postWarehouseDropShipNoteEvent
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID the drop ship note to delete (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseDropShipNoteEvent($account_code, $id)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseDropShipNoteEventWithHttpInfo ($account_code, $id);
        return $response; 
    }


    /**
     * postWarehouseDropShipNoteEventWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID the drop ship note to delete (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseDropShipNoteEventWithHttpInfo($account_code, $id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseDropShipNoteEvent');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWarehouseDropShipNoteEvent');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/goods-note/drop-ship/{ID}/event";
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
                $resourcePath, 'POST',
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
            }
  
            throw $e;
        }
    }
    
    /**
     * deleteWarehouseGoodsNoteGoodsIn
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The order id to associate the goods in note with (required)
     * @return void
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouseGoodsNoteGoodsIn($account_code, $id)
    {
        list($response, $statusCode, $httpHeader) = $this->deleteWarehouseGoodsNoteGoodsInWithHttpInfo ($account_code, $id);
        return $response; 
    }


    /**
     * deleteWarehouseGoodsNoteGoodsInWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The order id to associate the goods in note with (required)
     * @return Array of null, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouseGoodsNoteGoodsInWithHttpInfo($account_code, $id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling deleteWarehouseGoodsNoteGoodsIn');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling deleteWarehouseGoodsNoteGoodsIn');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/goods-note/goods-in/{ID}";
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
                $resourcePath, 'DELETE',
                $queryParams, $httpBody,
                $headerParams
            );
            
            return array(null, $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseGoodsInCorrection
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID of the goods in note (required)
     * @param \BrightpearlApiClient\Model\Correction $correction  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseGoodsInCorrection($account_code, $id, $correction)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseGoodsInCorrectionWithHttpInfo ($account_code, $id, $correction);
        return $response; 
    }


    /**
     * postWarehouseGoodsInCorrectionWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID of the goods in note (required)
     * @param \BrightpearlApiClient\Model\Correction $correction  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseGoodsInCorrectionWithHttpInfo($account_code, $id, $correction)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseGoodsInCorrection');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWarehouseGoodsInCorrection');
        }
        // verify the required parameter 'correction' is set
        if ($correction === null) {
            throw new \InvalidArgumentException('Missing the required parameter $correction when calling postWarehouseGoodsInCorrection');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/goods-note/goods-in/{ID}/correction";
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
        if (isset($correction)) {
            $_tempBody = $correction;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * putWarehouseGoodsOutNote
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Goodsoutnote $goods_out_note  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function putWarehouseGoodsOutNote($account_code, $id, $goods_out_note = null)
    {
        list($response, $statusCode, $httpHeader) = $this->putWarehouseGoodsOutNoteWithHttpInfo ($account_code, $id, $goods_out_note);
        return $response; 
    }


    /**
     * putWarehouseGoodsOutNoteWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Goodsoutnote $goods_out_note  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function putWarehouseGoodsOutNoteWithHttpInfo($account_code, $id, $goods_out_note = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling putWarehouseGoodsOutNote');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling putWarehouseGoodsOutNote');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/goods-note/goods-out/{ID}";
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
        if (isset($goods_out_note)) {
            $_tempBody = $goods_out_note;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseGoodsOutNoteEvent
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Goodsoutnote1 $goods_out_note  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseGoodsOutNoteEvent($account_code, $id, $goods_out_note = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseGoodsOutNoteEventWithHttpInfo ($account_code, $id, $goods_out_note);
        return $response; 
    }


    /**
     * postWarehouseGoodsOutNoteEventWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Goodsoutnote1 $goods_out_note  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseGoodsOutNoteEventWithHttpInfo($account_code, $id, $goods_out_note = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseGoodsOutNoteEvent');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWarehouseGoodsOutNoteEvent');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/goods-note/goods-out/{ID}/event";
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
        if (isset($goods_out_note)) {
            $_tempBody = $goods_out_note;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseGoodsOutNoteSearch
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
    public function getWarehouseGoodsOutNoteSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseGoodsOutNoteSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getWarehouseGoodsOutNoteSearchWithHttpInfo
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
    public function getWarehouseGoodsOutNoteSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseGoodsOutNoteSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/goods-note/goods-out-search";
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
//            $queryParams['filters'] = $this->apiClient->getSerializer()->toQueryValue($filters);
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
     * postWarehouseOrderGoodsNoteGoodsIn
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The order id to associate the goods in note with (required)
     * @param \BrightpearlApiClient\Model\PostGoodsInNote $goods_in_note  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseOrderGoodsNoteGoodsIn($account_code, $id, $goods_in_note)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseOrderGoodsNoteGoodsInWithHttpInfo ($account_code, $id, $goods_in_note);
        return $response; 
    }


    /**
     * postWarehouseOrderGoodsNoteGoodsInWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The order id to associate the goods in note with (required)
     * @param \BrightpearlApiClient\Model\PostGoodsInNote $goods_in_note  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseOrderGoodsNoteGoodsInWithHttpInfo($account_code, $id, $goods_in_note)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseOrderGoodsNoteGoodsIn');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWarehouseOrderGoodsNoteGoodsIn');
        }
        // verify the required parameter 'goods_in_note' is set
        if ($goods_in_note === null) {
            throw new \InvalidArgumentException('Missing the required parameter $goods_in_note when calling postWarehouseOrderGoodsNoteGoodsIn');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ID}/goods-note/goods-in";
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
        if (isset($goods_in_note)) {
            $_tempBody = $goods_in_note;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseGoodsOutNote
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Goodsoutnote2 $goods_out_note  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse20041
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseGoodsOutNote($account_code, $id, $goods_out_note = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseGoodsOutNoteWithHttpInfo ($account_code, $id, $goods_out_note);
        return $response; 
    }


    /**
     * postWarehouseGoodsOutNoteWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Goodsoutnote2 $goods_out_note  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20041, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseGoodsOutNoteWithHttpInfo($account_code, $id, $goods_out_note = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseGoodsOutNote');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWarehouseGoodsOutNote');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ID}/goods-note/goods-out";
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
        if (isset($goods_out_note)) {
            $_tempBody = $goods_out_note;
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20041'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20041', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20041', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * deleteWarehouseOrderReservation
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouseOrderReservation($account_code, $id)
    {
        list($response, $statusCode, $httpHeader) = $this->deleteWarehouseOrderReservationWithHttpInfo ($account_code, $id);
        return $response; 
    }


    /**
     * deleteWarehouseOrderReservationWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouseOrderReservationWithHttpInfo($account_code, $id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling deleteWarehouseOrderReservation');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling deleteWarehouseOrderReservation');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ID}/reservation";
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
                $resourcePath, 'DELETE',
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
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseDropShipNote
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id_set ID Set for the order (required)
     * @param string $drop_ship_note_id_set ID Set for the drop ship notes (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20042
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseDropShipNote($account_code, $order_id_set, $drop_ship_note_id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseDropShipNoteWithHttpInfo ($account_code, $order_id_set, $drop_ship_note_id_set);
        return $response; 
    }


    /**
     * getWarehouseDropShipNoteWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id_set ID Set for the order (required)
     * @param string $drop_ship_note_id_set ID Set for the drop ship notes (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20042, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseDropShipNoteWithHttpInfo($account_code, $order_id_set, $drop_ship_note_id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseDropShipNote');
        }
        // verify the required parameter 'order_id_set' is set
        if ($order_id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $order_id_set when calling getWarehouseDropShipNote');
        }
        // verify the required parameter 'drop_ship_note_id_set' is set
//        if ($drop_ship_note_id_set === null) {
//            throw new \InvalidArgumentException('Missing the required parameter $drop_ship_note_id_set when calling getWarehouseDropShipNote');
//        }
  
        // parse inputs
        if ($drop_ship_note_id_set !== null) {
            $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ORDER-ID-SET}/goods-note/drop-ship/{DROP-SHIP-NOTE-ID-SET}";
        } else {
            $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ORDER-ID-SET}/goods-note/drop-ship/";
        }
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
        
        if ($order_id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ORDER-ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($order_id_set),
                $resourcePath
            );
        }// path params
        
        if ($drop_ship_note_id_set !== null) {
            $resourcePath = str_replace(
                "{" . "DROP-SHIP-NOTE-ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($drop_ship_note_id_set),
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
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-auth');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-auth'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20042'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20042', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20042', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseGoodsInNotes
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id_set The order(s) to select goods in notes for (required)
     * @param string $goods_in_note_id_set Goods in note(s) to retrieve (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20043
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseGoodsInNotes($account_code, $order_id_set, $goods_in_note_id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseGoodsInNotesWithHttpInfo ($account_code, $order_id_set, $goods_in_note_id_set);
        return $response; 
    }


    /**
     * getWarehouseGoodsInNotesWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id_set The order(s) to select goods in notes for (required)
     * @param string $goods_in_note_id_set Goods in note(s) to retrieve (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20043, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseGoodsInNotesWithHttpInfo($account_code, $order_id_set, $goods_in_note_id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseGoodsInNotes');
        }
        // verify the required parameter 'order_id_set' is set
        if ($order_id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $order_id_set when calling getWarehouseGoodsInNotes');
        }
        // verify the required parameter 'goods_in_note_id_set' is set
        if ($goods_in_note_id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $goods_in_note_id_set when calling getWarehouseGoodsInNotes');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ORDER-ID-SET}/goods-note/goods-in/{GOODS-IN-NOTE-ID-SET}";
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
        
        if ($order_id_set !== null) {
            $resourcePath = str_replace(
                "{" . "ORDER-ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($order_id_set),
                $resourcePath
            );
        }// path params
        
        if ($goods_in_note_id_set !== null) {
            $resourcePath = str_replace(
                "{" . "GOODS-IN-NOTE-ID-SET" . "}",
                $this->apiClient->getSerializer()->toPathValue($goods_in_note_id_set),
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20043'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20043', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20043', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseDropShipNote
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id  (required)
     * @param \BrightpearlApiClient\Model\Warehouse $warehouse  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse20044
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseDropShipNote($account_code, $order_id, $warehouse = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseDropShipNoteWithHttpInfo ($account_code, $order_id, $warehouse);
        return $response; 
    }


    /**
     * postWarehouseDropShipNoteWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id  (required)
     * @param \BrightpearlApiClient\Model\Warehouse $warehouse  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20044, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseDropShipNoteWithHttpInfo($account_code, $order_id, $warehouse = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseDropShipNote');
        }
        // verify the required parameter 'order_id' is set
        if ($order_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $order_id when calling postWarehouseDropShipNote');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ORDER-ID}/goods-note/drop-ship";
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
        
        if ($order_id !== null) {
            $resourcePath = str_replace(
                "{" . "ORDER-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($order_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // body params
        $_tempBody = null;
        if (isset($warehouse)) {
            $_tempBody = $warehouse;
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20044'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20044', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20044', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseGoodsOutNote
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id The order idSet (required)
     * @param string $goods_out_note_id The goods out note idSet (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20045
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseGoodsOutNote($account_code, $order_id, $goods_out_note_id)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseGoodsOutNoteWithHttpInfo ($account_code, $order_id, $goods_out_note_id);
        return $response; 
    }


    /**
     * getWarehouseGoodsOutNoteWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id The order idSet (required)
     * @param string $goods_out_note_id The goods out note idSet (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20045, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseGoodsOutNoteWithHttpInfo($account_code, $order_id, $goods_out_note_id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseGoodsOutNote');
        }
        // verify the required parameter 'order_id' is set
        if ($order_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $order_id when calling getWarehouseGoodsOutNote');
        }
        // verify the required parameter 'goods_out_note_id' is set
        if ($goods_out_note_id === null) {
            $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ORDER-ID}/goods-note/goods-out/";
        } else {
            $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ORDER-ID}/goods-note/goods-out/{GOODS-OUT-NOTE-ID}";
        }
  
        // parse inputs
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
        
        if ($order_id !== null) {
            $resourcePath = str_replace(
                "{" . "ORDER-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($order_id),
                $resourcePath
            );
        }// path params
        
        if ($goods_out_note_id !== null) {
            $resourcePath = str_replace(
                "{" . "GOODS-OUT-NOTE-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($goods_out_note_id),
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20045'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20045', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20045', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * deleteWarehouseGoodsOutNote
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id  (required)
     * @param string $goods_out_note_id  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouseGoodsOutNote($account_code, $order_id, $goods_out_note_id)
    {
        list($response, $statusCode, $httpHeader) = $this->deleteWarehouseGoodsOutNoteWithHttpInfo ($account_code, $order_id, $goods_out_note_id);
        return $response; 
    }


    /**
     * deleteWarehouseGoodsOutNoteWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id  (required)
     * @param string $goods_out_note_id  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouseGoodsOutNoteWithHttpInfo($account_code, $order_id, $goods_out_note_id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling deleteWarehouseGoodsOutNote');
        }
        // verify the required parameter 'order_id' is set
        if ($order_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $order_id when calling deleteWarehouseGoodsOutNote');
        }
        // verify the required parameter 'goods_out_note_id' is set
        if ($goods_out_note_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $goods_out_note_id when calling deleteWarehouseGoodsOutNote');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ORDER-ID}/goods-note/goods-out/{GOODS-OUT-NOTE-ID}";
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
        
        if ($order_id !== null) {
            $resourcePath = str_replace(
                "{" . "ORDER-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($order_id),
                $resourcePath
            );
        }// path params
        
        if ($goods_out_note_id !== null) {
            $resourcePath = str_replace(
                "{" . "GOODS-OUT-NOTE-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($goods_out_note_id),
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
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'DELETE',
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
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseOrderReservation
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id  (required)
     * @param string $warehouse_id  (required)
     * @param \BrightpearlApiClient\Model\Reservation $reservation  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseOrderReservation($account_code, $order_id, $warehouse_id, $reservation = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseOrderReservationWithHttpInfo ($account_code, $order_id, $warehouse_id, $reservation);
        return $response; 
    }


    /**
     * postWarehouseOrderReservationWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $order_id  (required)
     * @param string $warehouse_id  (required)
     * @param \BrightpearlApiClient\Model\Reservation $reservation  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseOrderReservationWithHttpInfo($account_code, $order_id, $warehouse_id, $reservation = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseOrderReservation');
        }
        // verify the required parameter 'order_id' is set
        if ($order_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $order_id when calling postWarehouseOrderReservation');
        }
        // verify the required parameter 'warehouse_id' is set
        if ($warehouse_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $warehouse_id when calling postWarehouseOrderReservation');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/order/{ORDER-ID}/reservation/warehouse/{WAREHOUSE-ID}";
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
        
        if ($order_id !== null) {
            $resourcePath = str_replace(
                "{" . "ORDER-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($order_id),
                $resourcePath
            );
        }// path params
        
        if ($warehouse_id !== null) {
            $resourcePath = str_replace(
                "{" . "WAREHOUSE-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($warehouse_id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // body params
        $_tempBody = null;
        if (isset($reservation)) {
            $_tempBody = $reservation;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseProductAvailability
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20046
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseProductAvailability($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseProductAvailabilityWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getWarehouseProductAvailabilityWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20046, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseProductAvailabilityWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseProductAvailability');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getWarehouseProductAvailability');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/product-availability/{/ID-SET}";
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
                "{" . "/ID-SET" . "}",
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20046'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20046', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20046', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseOrderReservations
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20047
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseOrderReservations($account_code)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseOrderReservationsWithHttpInfo ($account_code);
        return $response; 
    }


    /**
     * getWarehouseOrderReservationsWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20047, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseOrderReservationsWithHttpInfo($account_code)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseOrderReservations');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/reservations";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20047'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20047', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20047', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseShippingMethod
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Warehouse1 $warehouse  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseShippingMethod($account_code, $warehouse = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseShippingMethodWithHttpInfo ($account_code, $warehouse);
        return $response; 
    }


    /**
     * postWarehouseShippingMethodWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Warehouse1 $warehouse  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseShippingMethodWithHttpInfo($account_code, $warehouse = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseShippingMethod');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/shipping-method";
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
        if (isset($warehouse)) {
            $_tempBody = $warehouse;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseShippingMethodSearch
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
    public function getWarehouseShippingMethodSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseShippingMethodSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getWarehouseShippingMethodSearchWithHttpInfo
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
    public function getWarehouseShippingMethodSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseShippingMethodSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/shipping-method-search";
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
     * getWarehouseShippingMethods
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20048
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseShippingMethods($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseShippingMethodsWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getWarehouseShippingMethodsWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20048, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseShippingMethodsWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseShippingMethods');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getWarehouseShippingMethods');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/shipping-method/{/ID-SET}";
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
                "{" . "/ID-SET" . "}",
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20048'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20048', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20048', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * putWarehouse
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Warehouses $warehouses  (required)
     * @return \BrightpearlApiClient\Model\EmptyObjectResponseModel
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function putWarehouse($account_code, $warehouses)
    {
        list($response, $statusCode, $httpHeader) = $this->putWarehouseWithHttpInfo ($account_code, $warehouses);
        return $response; 
    }


    /**
     * putWarehouseWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Warehouses $warehouses  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\EmptyObjectResponseModel, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function putWarehouseWithHttpInfo($account_code, $warehouses)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling putWarehouse');
        }
        // verify the required parameter 'warehouses' is set
        if ($warehouses === null) {
            throw new \InvalidArgumentException('Missing the required parameter $warehouses when calling putWarehouse');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse";
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
        if (isset($warehouses)) {
            $_tempBody = $warehouses;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouse
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Warehouse $warehouse  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouse($account_code, $warehouse = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseWithHttpInfo ($account_code, $warehouse);
        return $response; 
    }


    /**
     * postWarehouseWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Warehouse $warehouse  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseWithHttpInfo($account_code, $warehouse = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouse');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse";
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
        if (isset($warehouse)) {
            $_tempBody = $warehouse;
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
                $resourcePath, 'POST',
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
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehousesBundleAbailability
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $product_id IDSet of the warehouse(s) (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20049
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehousesBundleAbailability($account_code, $product_id)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehousesBundleAbailabilityWithHttpInfo ($account_code, $product_id);
        return $response; 
    }


    /**
     * getWarehousesBundleAbailabilityWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $product_id IDSet of the warehouse(s) (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20049, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehousesBundleAbailabilityWithHttpInfo($account_code, $product_id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehousesBundleAbailability');
        }
        // verify the required parameter 'product_id' is set
        if ($product_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $product_id when calling getWarehousesBundleAbailability');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/bundle-availability/{PRODUCT-ID}";
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
        
        if ($product_id !== null) {
            $resourcePath = str_replace(
                "{" . "PRODUCT-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($product_id),
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
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-auth');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-auth'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20049'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20049', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20049', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * deleteWarehouse
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The ID of the warehouse to delete (required)
     * @return \BrightpearlApiClient\Model\EmptyObjectResponseModel
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouse($account_code, $id)
    {
        list($response, $statusCode, $httpHeader) = $this->deleteWarehouseWithHttpInfo ($account_code, $id);
        return $response; 
    }


    /**
     * deleteWarehouseWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The ID of the warehouse to delete (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\EmptyObjectResponseModel, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouseWithHttpInfo($account_code, $id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling deleteWarehouse');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling deleteWarehouse');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{ID}";
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
            case 400:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\ErrorModel', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseAssetValueCorrection
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID of the warehouse (required)
     * @param \BrightpearlApiClient\Model\AssetValueCorrection $asset_value_correction  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseAssetValueCorrection($account_code, $id, $asset_value_correction)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseAssetValueCorrectionWithHttpInfo ($account_code, $id, $asset_value_correction);
        return $response; 
    }


    /**
     * postWarehouseAssetValueCorrectionWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID of the warehouse (required)
     * @param \BrightpearlApiClient\Model\AssetValueCorrection $asset_value_correction  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseAssetValueCorrectionWithHttpInfo($account_code, $id, $asset_value_correction)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseAssetValueCorrection');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWarehouseAssetValueCorrection');
        }
        // verify the required parameter 'asset_value_correction' is set
        if ($asset_value_correction === null) {
            throw new \InvalidArgumentException('Missing the required parameter $asset_value_correction when calling postWarehouseAssetValueCorrection');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{ID}/asset-value-correction";
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
        if (isset($asset_value_correction)) {
            $_tempBody = $asset_value_correction;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseInternalTransfer
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Internaltransfer $internal_transfer  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseInternalTransfer($account_code, $id, $internal_transfer = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseInternalTransferWithHttpInfo ($account_code, $id, $internal_transfer);
        return $response; 
    }


    /**
     * postWarehouseInternalTransferWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Internaltransfer $internal_transfer  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseInternalTransferWithHttpInfo($account_code, $id, $internal_transfer = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseInternalTransfer');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWarehouseInternalTransfer');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{ID}/internal-transfer";
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
        if (isset($internal_transfer)) {
            $_tempBody = $internal_transfer;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * deleteWarehouseLocation
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The ID of the warehouse to delete (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouseLocation($account_code, $id)
    {
        list($response, $statusCode, $httpHeader) = $this->deleteWarehouseLocationWithHttpInfo ($account_code, $id);
        return $response; 
    }


    /**
     * deleteWarehouseLocationWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The ID of the warehouse to delete (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function deleteWarehouseLocationWithHttpInfo($account_code, $id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling deleteWarehouseLocation');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling deleteWarehouseLocation');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{ID}/location/";
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
                $resourcePath, 'DELETE',
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
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseDefaultLocation
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Warehouse ID (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20050
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseDefaultLocation($account_code, $id)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseDefaultLocationWithHttpInfo ($account_code, $id);
        return $response; 
    }


    /**
     * getWarehouseDefaultLocationWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Warehouse ID (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20050, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseDefaultLocationWithHttpInfo($account_code, $id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseDefaultLocation');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getWarehouseDefaultLocation');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{ID}/location/default";
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
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-auth');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-auth'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20050'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20050', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20050', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseQuarantineLocation
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Warehouse ID (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20050
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseQuarantineLocation($account_code, $id)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseQuarantineLocationWithHttpInfo ($account_code, $id);
        return $response; 
    }


    /**
     * getWarehouseQuarantineLocationWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id Warehouse ID (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20050, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseQuarantineLocationWithHttpInfo($account_code, $id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseQuarantineLocation');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getWarehouseQuarantineLocation');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{ID}/location/quarantine";
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
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-auth');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-auth'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20050'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20050', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20050', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouseLocation
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID of the warehouse (required)
     * @param string $id_set IDSet of the location(s) (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20046
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseLocation($account_code, $id, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehouseLocationWithHttpInfo ($account_code, $id, $id_set);
        return $response; 
    }


    /**
     * getWarehouseLocationWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id ID of the warehouse (required)
     * @param string $id_set IDSet of the location(s) (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20046, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouseLocationWithHttpInfo($account_code, $id, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouseLocation');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getWarehouseLocation');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getWarehouseLocation');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{ID}/location{/ID-SET}";
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
        
        if ($id_set !== null) {
            $resourcePath = str_replace(
                "{" . "/ID-SET" . "}",
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20046'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20046', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20046', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseQuarantineRelease
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Location $location  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse20012
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseQuarantineRelease($account_code, $id, $location = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseQuarantineReleaseWithHttpInfo ($account_code, $id, $location);
        return $response; 
    }


    /**
     * postWarehouseQuarantineReleaseWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id  (required)
     * @param \BrightpearlApiClient\Model\Location $location  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20012, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseQuarantineReleaseWithHttpInfo($account_code, $id, $location = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseQuarantineRelease');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWarehouseQuarantineRelease');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{ID}/quarantine/release";
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
        if (isset($location)) {
            $_tempBody = $location;
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
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseStockCorrection
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The ID (required)
     * @param \BrightpearlApiClient\Model\Warehouse2 $warehouse  (optional)
     * @return \BrightpearlApiClient\Model\InlineResponse20041
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseStockCorrection($account_code, $id, $warehouse = null)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseStockCorrectionWithHttpInfo ($account_code, $id, $warehouse);
        return $response; 
    }


    /**
     * postWarehouseStockCorrectionWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id The ID (required)
     * @param \BrightpearlApiClient\Model\Warehouse2 $warehouse  (optional)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20041, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseStockCorrectionWithHttpInfo($account_code, $id, $warehouse = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseStockCorrection');
        }
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling postWarehouseStockCorrection');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{ID}/stock-correction";
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
        if (isset($warehouse)) {
            $_tempBody = $warehouse;
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20041'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20041', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20041', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * postWarehouseExternalTransfer
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $source_warehouse_id The ID of the warehouse from which the transfer originates. (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20044
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseExternalTransfer($account_code, $source_warehouse_id)
    {
        list($response, $statusCode, $httpHeader) = $this->postWarehouseExternalTransferWithHttpInfo ($account_code, $source_warehouse_id);
        return $response; 
    }


    /**
     * postWarehouseExternalTransferWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $source_warehouse_id The ID of the warehouse from which the transfer originates. (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20044, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postWarehouseExternalTransferWithHttpInfo($account_code, $source_warehouse_id)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postWarehouseExternalTransfer');
        }
        // verify the required parameter 'source_warehouse_id' is set
        if ($source_warehouse_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $source_warehouse_id when calling postWarehouseExternalTransfer');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse/{SOURCE-WAREHOUSE-ID}/external-transfer";
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
        
        if ($source_warehouse_id !== null) {
            $resourcePath = str_replace(
                "{" . "SOURCE-WAREHOUSE-ID" . "}",
                $this->apiClient->getSerializer()->toPathValue($source_warehouse_id),
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20044'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20044', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20044', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
    /**
     * getWarehouses
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set IDSet of the warehouse(s) (required)
     * @return \BrightpearlApiClient\Model\InlineResponse20051
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehouses($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getWarehousesWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getWarehousesWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set IDSet of the warehouse(s) (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse20051, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getWarehousesWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getWarehouses');
        }
        // verify the required parameter 'id_set' is set
//        if ($id_set === null) {
//            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getWarehouses');
//        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/warehouse-service/warehouse";
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
        
//        if ($id_set !== null) {
//            $resourcePath = str_replace(
//                "{" . "/ID-SET" . "}",
//                $this->apiClient->getSerializer()->toPathValue($id_set),
//                $resourcePath
//            );
//        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        
  
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        
        // this endpoint requires API key authentication
        $apiKey = $this->apiClient->getApiKeyWithPrefix('brightpearl-account-token');
        if (strlen($apiKey) !== 0) {
            $headerParams['brightpearl-account-token'] = $apiKey;
        }
        
        
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath, 'GET',
                $queryParams, $httpBody,
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse20051'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse20051', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse20051', $e->getResponseHeaders());
                $e->setResponseObject($data);
                break;
            }
  
            throw $e;
        }
    }
    
}
