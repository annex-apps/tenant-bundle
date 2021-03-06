<?php
/**
 *
 */
namespace BrightpearlApiClient\Api;

use BrightpearlApiClient\Configuration;
use BrightpearlApiClient\ApiClient;
use BrightpearlApiClient\ApiException;
use BrightpearlApiClient\ObjectSerializer;

/**
 * Class AccountingServiceApi
 * @package BrightpearlApiClient\Api
 */
class AccountingServiceApi
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
     * @return AccountingServiceApi
     */
    public function setApiClient(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }
  
    
    /**
     * postAccountingAccountPayment
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\AccountPayment $account_payment  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingAccountPayment($account_code, $account_payment)
    {
        list($response, $statusCode, $httpHeader) = $this->postAccountingAccountPaymentWithHttpInfo ($account_code, $account_payment);
        return $response; 
    }


    /**
     * postAccountingAccountPaymentWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\AccountPayment $account_payment  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingAccountPaymentWithHttpInfo($account_code, $account_payment)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postAccountingAccountPayment');
        }
        // verify the required parameter 'account_payment' is set
        if ($account_payment === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_payment when calling postAccountingAccountPayment');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/account-payment";
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
        if (isset($account_payment)) {
            $_tempBody = $account_payment;
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
     * postAccountingAccountingPeriod
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\AccountingPeriod $accounting_period  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingAccountingPeriod($account_code, $accounting_period)
    {
        list($response, $statusCode, $httpHeader) = $this->postAccountingAccountingPeriodWithHttpInfo ($account_code, $accounting_period);
        return $response; 
    }


    /**
     * postAccountingAccountingPeriodWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\AccountingPeriod $accounting_period  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingAccountingPeriodWithHttpInfo($account_code, $accounting_period)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postAccountingAccountingPeriod');
        }
        // verify the required parameter 'accounting_period' is set
        if ($accounting_period === null) {
            throw new \InvalidArgumentException('Missing the required parameter $accounting_period when calling postAccountingAccountingPeriod');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/accounting-period";
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
        if (isset($accounting_period)) {
            $_tempBody = $accounting_period;
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
     * getAccountingAccountingPeriodIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return \BrightpearlApiClient\Model\InlineResponse2001
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingAccountingPeriodIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingAccountingPeriodIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getAccountingAccountingPeriodIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse2001, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingAccountingPeriodIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingAccountingPeriodIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getAccountingAccountingPeriodIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/accounting-period/{ID-SET}";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse2001'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse2001', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2001', $e->getResponseHeaders());
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
     * getAccountingCurrencySearch
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
    public function getAccountingCurrencySearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingCurrencySearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getAccountingCurrencySearchWithHttpInfo
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
    public function getAccountingCurrencySearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingCurrencySearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/currency-search";
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
     * postAccountingSalesInvoice
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\SalesInvoice $sales_invoice  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingSalesInvoice($account_code, $sales_invoice)
    {
        list($response, $statusCode, $httpHeader) = $this->postAccountingSalesInvoiceWithHttpInfo ($account_code, $sales_invoice);
        return $response; 
    }


    /**
     * postAccountingSalesInvoiceWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\SalesInvoice $sales_invoice  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingSalesInvoiceWithHttpInfo($account_code, $sales_invoice)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postAccountingSalesInvoice');
        }
        // verify the required parameter 'sales_invoice' is set
        if ($sales_invoice === null) {
            throw new \InvalidArgumentException('Missing the required parameter $sales_invoice when calling postAccountingSalesInvoice');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/invoice/sales-invoice";
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
        if (isset($sales_invoice)) {
            $_tempBody = $sales_invoice;
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
     * postAccountingJournal
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Journal $journal  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingJournal($account_code, $journal)
    {
        list($response, $statusCode, $httpHeader) = $this->postAccountingJournalWithHttpInfo ($account_code, $journal);
        return $response; 
    }


    /**
     * postAccountingJournalWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\Journal $journal  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingJournalWithHttpInfo($account_code, $journal)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postAccountingJournal');
        }
        // verify the required parameter 'journal' is set
        if ($journal === null) {
            throw new \InvalidArgumentException('Missing the required parameter $journal when calling postAccountingJournal');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/journal";
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
        if (isset($journal)) {
            $_tempBody = $journal;
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
     * getAccountingJournalSearch
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
    public function getAccountingJournalSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingJournalSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getAccountingJournalSearchWithHttpInfo
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
    public function getAccountingJournalSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingJournalSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/journal-search";
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
     * getAccountingJournalIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return \BrightpearlApiClient\Model\JournalGetResponse
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingJournalIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingJournalIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getAccountingJournalIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\JournalGetResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingJournalIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingJournalIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getAccountingJournalIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/journal/{ID-SET}";
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
                $headerParams, '\BrightpearlApiClient\Model\JournalGetResponse'
            );

            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\JournalGetResponse', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\JournalGetResponse', $e->getResponseHeaders());
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
     * getAccountingNominalCodeSearch
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
    public function getAccountingNominalCodeSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingNominalCodeSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getAccountingNominalCodeSearchWithHttpInfo
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
    public function getAccountingNominalCodeSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingNominalCodeSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/nominal-code-search";
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
     * getAccountingNominalCodeIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return \BrightpearlApiClient\Model\NominalCodeGetResponse
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingNominalCodeIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingNominalCodeIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getAccountingNominalCodeIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\NominalCode, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingNominalCodeIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingNominalCodeIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getAccountingNominalCodeIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/nominal-code/{ID-SET}";
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
                $headerParams, '\BrightpearlApiClient\Model\NominalCodeGetResponse'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\NominalCodeGetResponse', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\NominalCodeGetResponse', $e->getResponseHeaders());
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
     * postAccountingPaymentAuthorization
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\PaymentAuthorization $payment_auth  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingPaymentAuthorization($account_code, $payment_auth)
    {
        list($response, $statusCode, $httpHeader) = $this->postAccountingPaymentAuthorizationWithHttpInfo ($account_code, $payment_auth);
        return $response; 
    }


    /**
     * postAccountingPaymentAuthorizationWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\PaymentAuthorization $payment_auth  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingPaymentAuthorizationWithHttpInfo($account_code, $payment_auth)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postAccountingPaymentAuthorization');
        }
        // verify the required parameter 'payment_auth' is set
        if ($payment_auth === null) {
            throw new \InvalidArgumentException('Missing the required parameter $payment_auth when calling postAccountingPaymentAuthorization');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/payment-auth";
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
        if (isset($payment_auth)) {
            $_tempBody = $payment_auth;
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
     * getAccountingPaymentAuthSearch
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
    public function getAccountingPaymentAuthSearch($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingPaymentAuthSearchWithHttpInfo ($account_code, $columns, $filters, $sort, $page_size, $first_result);
        return $response; 
    }


    /**
     * getAccountingPaymentAuthSearchWithHttpInfo
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
    public function getAccountingPaymentAuthSearchWithHttpInfo($account_code, $columns = null, $filters = null, $sort = null, $page_size = null, $first_result = null)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingPaymentAuthSearch');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/payment-auth-search";
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
     * getAccountingPaymentAuthIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return \BrightpearlApiClient\Model\InlineResponse2004
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingPaymentAuthIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingPaymentAuthIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getAccountingPaymentAuthIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse2004, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingPaymentAuthIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingPaymentAuthIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getAccountingPaymentAuthIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/payment-auth/{ID-SET}";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse2004'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse2004', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2004', $e->getResponseHeaders());
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
     * postAccountingPurchasePayment
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\PurchasePayment $purchase_payment  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingPurchasePayment($account_code, $purchase_payment)
    {
        list($response, $statusCode, $httpHeader) = $this->postAccountingPurchasePaymentWithHttpInfo ($account_code, $purchase_payment);
        return $response; 
    }


    /**
     * postAccountingPurchasePaymentWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\PurchasePayment $purchase_payment  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingPurchasePaymentWithHttpInfo($account_code, $purchase_payment)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postAccountingPurchasePayment');
        }
        // verify the required parameter 'purchase_payment' is set
        if ($purchase_payment === null) {
            throw new \InvalidArgumentException('Missing the required parameter $purchase_payment when calling postAccountingPurchasePayment');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/purchase-payment";
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
        if (isset($purchase_payment)) {
            $_tempBody = $purchase_payment;
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
     * postAccountingSalesReceipt
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\SalesReceipt $sales_receipt  (required)
     * @return \BrightpearlApiClient\Model\InlineResponse200
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingSalesReceipt($account_code, $sales_receipt)
    {
        list($response, $statusCode, $httpHeader) = $this->postAccountingSalesReceiptWithHttpInfo ($account_code, $sales_receipt);
        return $response; 
    }


    /**
     * postAccountingSalesReceiptWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param \BrightpearlApiClient\Model\SalesReceipt $sales_receipt  (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse200, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function postAccountingSalesReceiptWithHttpInfo($account_code, $sales_receipt)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling postAccountingSalesReceipt');
        }
        // verify the required parameter 'sales_receipt' is set
        if ($sales_receipt === null) {
            throw new \InvalidArgumentException('Missing the required parameter $sales_receipt when calling postAccountingSalesReceipt');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/sales-receipt";
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
        if (isset($sales_receipt)) {
            $_tempBody = $sales_receipt;
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
     * getAccountingTaxCode
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return \BrightpearlApiClient\Model\InlineResponse2005
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingTaxCode($account_code)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingTaxCodeWithHttpInfo ($account_code);
        return $response; 
    }


    /**
     * getAccountingTaxCodeWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse2005, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingTaxCodeWithHttpInfo($account_code)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingTaxCode');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/tax-code";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse2005'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse2005', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2005', $e->getResponseHeaders());
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
     * getAccountingTaxCodeIDSet
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return \BrightpearlApiClient\Model\InlineResponse2005
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingTaxCodeIDSet($account_code, $id_set)
    {
        list($response, $statusCode, $httpHeader) = $this->getAccountingTaxCodeIDSetWithHttpInfo ($account_code, $id_set);
        return $response; 
    }


    /**
     * getAccountingTaxCodeIDSetWithHttpInfo
     *
     * 
     *
     * @param string $account_code The account code for the Brightpearl account (required)
     * @param string $id_set ID Set (required)
     * @return Array of Annex\TenantBundle\BrightpearlApiClient\Model\InlineResponse2005, HTTP status code, HTTP response headers (array of strings)
     * @throws \BrightpearlApiClient\ApiException on non-2xx response
     */
    public function getAccountingTaxCodeIDSetWithHttpInfo($account_code, $id_set)
    {
        
        // verify the required parameter 'account_code' is set
        if ($account_code === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_code when calling getAccountingTaxCodeIDSet');
        }
        // verify the required parameter 'id_set' is set
        if ($id_set === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id_set when calling getAccountingTaxCodeIDSet');
        }
  
        // parse inputs
        $resourcePath = "/{ACCOUNT-CODE}/accounting-service/tax-code/{ID-SET}";
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
                $headerParams, '\BrightpearlApiClient\Model\InlineResponse2005'
            );
            
            if (!$response) {
                return array(null, $statusCode, $httpHeader);
            }

            return array(\BrightpearlApiClient\ObjectSerializer::deserialize($response, '\BrightpearlApiClient\Model\InlineResponse2005', $httpHeader), $statusCode, $httpHeader);
            
        } catch (ApiException $e) {
            switch ($e->getCode()) { 
            case 200:
                $data = \BrightpearlApiClient\ObjectSerializer::deserialize($e->getResponseBody(), '\BrightpearlApiClient\Model\InlineResponse2005', $e->getResponseHeaders());
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
