<?php
/**
 * OrderRowRowValue
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
 * OrderRowRowValue Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class OrderRowRowValue implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'tax_rate' => 'string',
        'row_net' => '\BrightpearlApiClient\Model\OrderRowItemCost',
        'tax_code' => 'string',
        'row_tax' => '\BrightpearlApiClient\Model\OrderRowItemCost'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'tax_rate' => 'taxRate',
        'row_net' => 'rowNet',
        'tax_code' => 'taxCode',
        'row_tax' => 'rowTax'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'tax_rate' => 'setTaxRate',
        'row_net' => 'setRowNet',
        'tax_code' => 'setTaxCode',
        'row_tax' => 'setRowTax'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'tax_rate' => 'getTaxRate',
        'row_net' => 'getRowNet',
        'tax_code' => 'getTaxCode',
        'row_tax' => 'getRowTax'
    );
  
    
    /**
      * $tax_rate 
      * @var string
      */
    protected $tax_rate;
    
    /**
      * $row_net 
      * @var \BrightpearlApiClient\Model\OrderRowItemCost
      */
    protected $row_net;
    
    /**
      * $tax_code 
      * @var string
      */
    protected $tax_code;
    
    /**
      * $row_tax 
      * @var \BrightpearlApiClient\Model\OrderRowItemCost
      */
    protected $row_tax;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->tax_rate = $data["tax_rate"];
            $this->row_net = $data["row_net"];
            $this->tax_code = $data["tax_code"];
            $this->row_tax = $data["row_tax"];
        }
    }
    
    /**
     * Gets tax_rate
     * @return string
     */
    public function getTaxRate()
    {
        return $this->tax_rate;
    }
  
    /**
     * Sets tax_rate
     * @param string $tax_rate 
     * @return $this
     */
    public function setTaxRate($tax_rate)
    {
        
        $this->tax_rate = $tax_rate;
        return $this;
    }
    
    /**
     * Gets row_net
     * @return \BrightpearlApiClient\Model\OrderRowItemCost
     */
    public function getRowNet()
    {
        return $this->row_net;
    }
  
    /**
     * Sets row_net
     * @param \BrightpearlApiClient\Model\OrderRowItemCost $row_net
     * @return $this
     */
    public function setRowNet($row_net)
    {
        
        $this->row_net = $row_net;
        return $this;
    }
    
    /**
     * Gets tax_code
     * @return string
     */
    public function getTaxCode()
    {
        return $this->tax_code;
    }
  
    /**
     * Sets tax_code
     * @param string $tax_code 
     * @return $this
     */
    public function setTaxCode($tax_code)
    {
        
        $this->tax_code = $tax_code;
        return $this;
    }
    
    /**
     * Gets row_tax
     * @return \BrightpearlApiClient\Model\OrderRowItemCost
     */
    public function getRowTax()
    {
        return $this->row_tax;
    }
  
    /**
     * Sets row_tax
     * @param \BrightpearlApiClient\Model\OrderRowItemCost $row_tax
     * @return $this
     */
    public function setRowTax($row_tax)
    {
        
        $this->row_tax = $row_tax;
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