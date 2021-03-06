<?php
/**
 * ACCOUNTCODEwarehouseservicegoodsnotegoodsoutIDShipping
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
 * ACCOUNTCODEwarehouseservicegoodsnotegoodsoutIDShipping Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ACCOUNTCODEwarehouseservicegoodsnotegoodsoutIDShipping implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'reference' => 'string',
        'boxes' => 'int',
        'weight' => 'string',
        'shipping_method_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'reference' => 'reference',
        'boxes' => 'boxes',
        'weight' => 'weight',
        'shipping_method_id' => 'shippingMethodId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'reference' => 'setReference',
        'boxes' => 'setBoxes',
        'weight' => 'setWeight',
        'shipping_method_id' => 'setShippingMethodId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'reference' => 'getReference',
        'boxes' => 'getBoxes',
        'weight' => 'getWeight',
        'shipping_method_id' => 'getShippingMethodId'
    );
  
    
    /**
      * $reference 
      * @var string
      */
    protected $reference;
    
    /**
      * $boxes 
      * @var int
      */
    protected $boxes;
    
    /**
      * $weight 
      * @var string
      */
    protected $weight;
    
    /**
      * $shipping_method_id 
      * @var int
      */
    protected $shipping_method_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->reference = $data["reference"];
            $this->boxes = $data["boxes"];
            $this->weight = $data["weight"];
            $this->shipping_method_id = $data["shipping_method_id"];
        }
    }
    
    /**
     * Gets reference
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }
  
    /**
     * Sets reference
     * @param string $reference 
     * @return $this
     */
    public function setReference($reference)
    {
        
        $this->reference = $reference;
        return $this;
    }
    
    /**
     * Gets boxes
     * @return int
     */
    public function getBoxes()
    {
        return $this->boxes;
    }
  
    /**
     * Sets boxes
     * @param int $boxes 
     * @return $this
     */
    public function setBoxes($boxes)
    {
        
        $this->boxes = $boxes;
        return $this;
    }
    
    /**
     * Gets weight
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }
  
    /**
     * Sets weight
     * @param string $weight 
     * @return $this
     */
    public function setWeight($weight)
    {
        
        $this->weight = $weight;
        return $this;
    }
    
    /**
     * Gets shipping_method_id
     * @return int
     */
    public function getShippingMethodId()
    {
        return $this->shipping_method_id;
    }
  
    /**
     * Sets shipping_method_id
     * @param int $shipping_method_id 
     * @return $this
     */
    public function setShippingMethodId($shipping_method_id)
    {
        
        $this->shipping_method_id = $shipping_method_id;
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
