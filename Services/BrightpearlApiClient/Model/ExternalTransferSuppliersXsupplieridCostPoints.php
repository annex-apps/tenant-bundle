<?php
/**
 * ExternalTransferSuppliersXsupplieridCostPoints
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

namespace Annex\TenantBundle\Services\BrightpearlApiClient\Model;

use \ArrayAccess;
/**
 * ExternalTransferSuppliersXsupplieridCostPoints Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ExternalTransferSuppliersXsupplieridCostPoints implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'currency' => 'string',
        'cost_points' => '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\ExternalTransferSuppliersXsupplieridCostPointsCostPoints'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'currency' => 'currency',
        'cost_points' => 'costPoints'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'currency' => 'setCurrency',
        'cost_points' => 'setCostPoints'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'currency' => 'getCurrency',
        'cost_points' => 'getCostPoints'
    );
  
    
    /**
      * $currency 
      * @var string
      */
    protected $currency;
    
    /**
      * $cost_points 
      * @var \BrightpearlApiClient\Model\ExternalTransferSuppliersXsupplieridCostPointsCostPoints
      */
    protected $cost_points;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->currency = $data["currency"];
            $this->cost_points = $data["cost_points"];
        }
    }
    
    /**
     * Gets currency
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
  
    /**
     * Sets currency
     * @param string $currency 
     * @return $this
     */
    public function setCurrency($currency)
    {
        
        $this->currency = $currency;
        return $this;
    }
    
    /**
     * Gets cost_points
     * @return \BrightpearlApiClient\Model\ExternalTransferSuppliersXsupplieridCostPointsCostPoints
     */
    public function getCostPoints()
    {
        return $this->cost_points;
    }
  
    /**
     * Sets cost_points
     * @param \BrightpearlApiClient\Model\ExternalTransferSuppliersXsupplieridCostPointsCostPoints $cost_points
     * @return $this
     */
    public function setCostPoints($cost_points)
    {
        
        $this->cost_points = $cost_points;
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
            return json_encode(ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}
