<?php
/**
 * OrderStatusUpdate
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
 * OrderStatusUpdate Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class OrderStatusUpdate implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'order_status_id' => 'int',
        'order_note' => '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\OrderStatusUpdateOrderNote'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'order_status_id' => 'orderStatusId',
        'order_note' => 'orderNote'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'order_status_id' => 'setOrderStatusId',
        'order_note' => 'setOrderNote'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'order_status_id' => 'getOrderStatusId',
        'order_note' => 'getOrderNote'
    );
  
    
    /**
      * $order_status_id 
      * @var int
      */
    protected $order_status_id;
    
    /**
      * $order_note 
      * @var \BrightpearlApiClient\Model\OrderStatusUpdateOrderNote
      */
    protected $order_note;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->order_status_id = $data["order_status_id"];
            $this->order_note = $data["order_note"];
        }
    }
    
    /**
     * Gets order_status_id
     * @return int
     */
    public function getOrderStatusId()
    {
        return $this->order_status_id;
    }
  
    /**
     * Sets order_status_id
     * @param int $order_status_id 
     * @return $this
     */
    public function setOrderStatusId($order_status_id)
    {
        
        $this->order_status_id = $order_status_id;
        return $this;
    }
    
    /**
     * Gets order_note
     * @return \BrightpearlApiClient\Model\OrderStatusUpdateOrderNote
     */
    public function getOrderNote()
    {
        return $this->order_note;
    }
  
    /**
     * Sets order_note
     * @param \BrightpearlApiClient\Model\OrderStatusUpdateOrderNote $order_note
     * @return $this
     */
    public function setOrderNote($order_note)
    {
        
        $this->order_note = $order_note;
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