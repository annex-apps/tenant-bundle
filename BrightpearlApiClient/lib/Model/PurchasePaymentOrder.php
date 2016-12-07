<?php
/**
 * PurchasePaymentOrder
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
 * PurchasePaymentOrder Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PurchasePaymentOrder implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'order_id' => 'string',
        'payment' => '\BrightpearlApiClient\Model\MonetaryValue'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'order_id' => 'orderId',
        'payment' => 'payment'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'order_id' => 'setOrderId',
        'payment' => 'setPayment'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'order_id' => 'getOrderId',
        'payment' => 'getPayment'
    );
  
    
    /**
      * $order_id 
      * @var string
      */
    protected $order_id;
    
    /**
      * $payment 
      * @var \BrightpearlApiClient\Model\MonetaryValue
      */
    protected $payment;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->order_id = $data["order_id"];
            $this->payment = $data["payment"];
        }
    }
    
    /**
     * Gets order_id
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }
  
    /**
     * Sets order_id
     * @param string $order_id 
     * @return $this
     */
    public function setOrderId($order_id)
    {
        
        $this->order_id = $order_id;
        return $this;
    }
    
    /**
     * Gets payment
     * @return \BrightpearlApiClient\Model\MonetaryValue
     */
    public function getPayment()
    {
        return $this->payment;
    }
  
    /**
     * Sets payment
     * @param \BrightpearlApiClient\Model\MonetaryValue $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        
        $this->payment = $payment;
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
