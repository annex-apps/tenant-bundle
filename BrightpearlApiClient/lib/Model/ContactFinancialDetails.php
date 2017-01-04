<?php
/**
 * ContactFinancialDetails
 *
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

namespace BrightpearlApiClient\Model;

use \ArrayAccess;
/**
 * ContactFinancialDetails Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ContactFinancialDetails implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'credit_term_days' => 'int',
        'discount_percentage' => 'Number',
        'nominal_code' => 'string',
        'price_list_id' => 'int',
        'credit_limit' => 'string',
        'tax_number' => 'string',
        'tax_code_id' => 'string',
        'currency_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'credit_term_days' => 'creditTermDays',
        'discount_percentage' => 'discountPercentage',
        'nominal_code' => 'nominalCode',
        'price_list_id' => 'priceListId',
        'credit_limit' => 'creditLimit',
        'tax_number' => 'taxNumber',
        'tax_code_id' => 'taxCodeId',
        'currency_id' => 'currencyId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'credit_term_days' => 'setCreditTermDays',
        'discount_percentage' => 'setDiscountPercentage',
        'nominal_code' => 'setNominalCode',
        'price_list_id' => 'setPriceListId',
        'credit_limit' => 'setCreditLimit',
        'tax_number' => 'setTaxNumber',
        'tax_code_id' => 'setTaxCodeId',
        'currency_id' => 'setCurrencyId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'credit_term_days' => 'getCreditTermDays',
        'discount_percentage' => 'getDiscountPercentage',
        'nominal_code' => 'getNominalCode',
        'price_list_id' => 'getPriceListId',
        'credit_limit' => 'getCreditLimit',
        'tax_number' => 'getTaxNumber',
        'tax_code_id' => 'getTaxCodeId',
        'currency_id' => 'getCurrencyId'
    );
  
    
    /**
      * $credit_term_days 
      * @var int
      */
    protected $credit_term_days;
    
    /**
      * $discount_percentage 
      * @var Number
      */
    protected $discount_percentage;
    
    /**
      * $nominal_code 
      * @var string
      */
    protected $nominal_code;
    
    /**
      * $price_list_id 
      * @var int
      */
    protected $price_list_id;
    
    /**
      * $credit_limit 
      * @var string
      */
    protected $credit_limit;
    
    /**
      * $tax_number 
      * @var string
      */
    protected $tax_number;
    
    /**
      * $tax_code_id 
      * @var string
      */
    protected $tax_code_id;
    
    /**
      * $currency_id 
      * @var int
      */
    protected $currency_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->credit_term_days = $data["credit_term_days"];
            $this->discount_percentage = $data["discount_percentage"];
            $this->nominal_code = $data["nominal_code"];
            $this->price_list_id = $data["price_list_id"];
            $this->credit_limit = $data["credit_limit"];
            $this->tax_number = $data["tax_number"];
            $this->tax_code_id = $data["tax_code_id"];
            $this->currency_id = $data["currency_id"];
        }
    }
    
    /**
     * Gets credit_term_days
     * @return int
     */
    public function getCreditTermDays()
    {
        return $this->credit_term_days;
    }
  
    /**
     * Sets credit_term_days
     * @param int $credit_term_days 
     * @return $this
     */
    public function setCreditTermDays($credit_term_days)
    {
        
        $this->credit_term_days = $credit_term_days;
        return $this;
    }
    
    /**
     * Gets discount_percentage
     * @return Number
     */
    public function getDiscountPercentage()
    {
        return $this->discount_percentage;
    }
  
    /**
     * Sets discount_percentage
     * @param Number $discount_percentage 
     * @return $this
     */
    public function setDiscountPercentage($discount_percentage)
    {
        
        $this->discount_percentage = $discount_percentage;
        return $this;
    }
    
    /**
     * Gets nominal_code
     * @return string
     */
    public function getNominalCode()
    {
        return $this->nominal_code;
    }
  
    /**
     * Sets nominal_code
     * @param string $nominal_code 
     * @return $this
     */
    public function setNominalCode($nominal_code)
    {
        
        $this->nominal_code = $nominal_code;
        return $this;
    }
    
    /**
     * Gets price_list_id
     * @return int
     */
    public function getPriceListId()
    {
        return $this->price_list_id;
    }
  
    /**
     * Sets price_list_id
     * @param int $price_list_id 
     * @return $this
     */
    public function setPriceListId($price_list_id)
    {
        
        $this->price_list_id = $price_list_id;
        return $this;
    }
    
    /**
     * Gets credit_limit
     * @return string
     */
    public function getCreditLimit()
    {
        return $this->credit_limit;
    }
  
    /**
     * Sets credit_limit
     * @param string $credit_limit 
     * @return $this
     */
    public function setCreditLimit($credit_limit)
    {
        
        $this->credit_limit = $credit_limit;
        return $this;
    }
    
    /**
     * Gets tax_number
     * @return string
     */
    public function getTaxNumber()
    {
        return $this->tax_number;
    }
  
    /**
     * Sets tax_number
     * @param string $tax_number 
     * @return $this
     */
    public function setTaxNumber($tax_number)
    {
        
        $this->tax_number = $tax_number;
        return $this;
    }
    
    /**
     * Gets tax_code_id
     * @return string
     */
    public function getTaxCodeId()
    {
        return $this->tax_code_id;
    }
  
    /**
     * Sets tax_code_id
     * @param string $tax_code_id 
     * @return $this
     */
    public function setTaxCodeId($tax_code_id)
    {
        
        $this->tax_code_id = $tax_code_id;
        return $this;
    }
    
    /**
     * Gets currency_id
     * @return int
     */
    public function getCurrencyId()
    {
        return $this->currency_id;
    }
  
    /**
     * Sets currency_id
     * @param int $currency_id 
     * @return $this
     */
    public function setCurrencyId($currency_id)
    {
        
        $this->currency_id = $currency_id;
        return $this;
    }
    
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(\BrightpearlApiClient\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(\BrightpearlApiClient\ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}