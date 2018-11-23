<?php
/**
 * PostOrder
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
 * PostOrder Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PostOrder implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'order_type_code' => 'string',
        'reference' => 'string',
        'parent_order_id' => 'int',
        'price_list_id' => 'int',
        'price_mode_code' => 'string',
        'placed_on' => 'string',
        'order_status' => '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\PostOrderOrderStatus',
        'delivery' => '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\OrderDelivery',
        'invoices' => '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\PostOrderInvoices[]',
        'order_currency_code' => 'string',
        'parties' => '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\PostOrderParties',
        'assignment' => '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\PostOrderAssignment',
        'warehouse_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'order_type_code' => 'orderTypeCode',
        'reference' => 'reference',
        'parent_order_id' => 'parentOrderId',
        'price_list_id' => 'priceListId',
        'price_mode_code' => 'priceModeCode',
        'placed_on' => 'placedOn',
        'order_status' => 'orderStatus',
        'delivery' => 'delivery',
        'invoices' => 'invoices',
        'order_currency_code' => 'orderCurrencyCode',
        'parties' => 'parties',
        'assignment' => 'assignment',
        'warehouse_id' => 'warehouseId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'order_type_code' => 'setOrderTypeCode',
        'reference' => 'setReference',
        'parent_order_id' => 'setParentOrderId',
        'price_list_id' => 'setPriceListId',
        'price_mode_code' => 'setPriceModeCode',
        'placed_on' => 'setPlacedOn',
        'order_status' => 'setOrderStatus',
        'delivery' => 'setDelivery',
        'invoices' => 'setInvoices',
        'order_currency_code' => 'setOrderCurrencyCode',
        'parties' => 'setParties',
        'assignment' => 'setAssignment',
        'warehouse_id' => 'setWarehouseId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'order_type_code' => 'getOrderTypeCode',
        'reference' => 'getReference',
        'parent_order_id' => 'getParentOrderId',
        'price_list_id' => 'getPriceListId',
        'price_mode_code' => 'getPriceModeCode',
        'placed_on' => 'getPlacedOn',
        'order_status' => 'getOrderStatus',
        'delivery' => 'getDelivery',
        'invoices' => 'getInvoices',
        'order_currency_code' => 'getOrderCurrencyCode',
        'parties' => 'getParties',
        'assignment' => 'getAssignment',
        'warehouse_id' => 'getWarehouseId'
    );
  
    
    /**
      * $order_type_code 
      * @var string
      */
    protected $order_type_code;
    
    /**
      * $reference 
      * @var string
      */
    protected $reference;
    
    /**
      * $parent_order_id 
      * @var int
      */
    protected $parent_order_id;
    
    /**
      * $price_list_id 
      * @var int
      */
    protected $price_list_id;
    
    /**
      * $price_mode_code 
      * @var string
      */
    protected $price_mode_code;
    
    /**
      * $placed_on 
      * @var string
      */
    protected $placed_on;
    
    /**
      * $order_status 
      * @var \BrightpearlApiClient\Model\PostOrderOrderStatus
      */
    protected $order_status;
    
    /**
      * $delivery 
      * @var \BrightpearlApiClient\Model\OrderDelivery
      */
    protected $delivery;
    
    /**
      * $invoices 
      * @var \BrightpearlApiClient\Model\PostOrderInvoices[]
      */
    protected $invoices;
    
    /**
      * $order_currency_code 
      * @var string
      */
    protected $order_currency_code;
    
    /**
      * $parties 
      * @var \BrightpearlApiClient\Model\PostOrderParties
      */
    protected $parties;
    
    /**
      * $assignment 
      * @var \BrightpearlApiClient\Model\PostOrderAssignment
      */
    protected $assignment;
    
    /**
      * $warehouse_id 
      * @var int
      */
    protected $warehouse_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->order_type_code = $data["order_type_code"];
            $this->reference = $data["reference"];
            $this->parent_order_id = $data["parent_order_id"];
            $this->price_list_id = $data["price_list_id"];
            $this->price_mode_code = $data["price_mode_code"];
            $this->placed_on = $data["placed_on"];
            $this->order_status = $data["order_status"];
            $this->delivery = $data["delivery"];
            $this->invoices = $data["invoices"];
            $this->order_currency_code = $data["order_currency_code"];
            $this->parties = $data["parties"];
            $this->assignment = $data["assignment"];
            $this->warehouse_id = $data["warehouse_id"];
        }
    }
    
    /**
     * Gets order_type_code
     * @return string
     */
    public function getOrderTypeCode()
    {
        return $this->order_type_code;
    }
  
    /**
     * Sets order_type_code
     * @param string $order_type_code 
     * @return $this
     */
    public function setOrderTypeCode($order_type_code)
    {
        $allowed_values = array("SO", "SC", "PO", "PC");
        if (!in_array($order_type_code, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'order_type_code', must be one of 'SO', 'SC', 'PO', 'PC'");
        }
        $this->order_type_code = $order_type_code;
        return $this;
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
     * Gets parent_order_id
     * @return int
     */
    public function getParentOrderId()
    {
        return $this->parent_order_id;
    }
  
    /**
     * Sets parent_order_id
     * @param int $parent_order_id 
     * @return $this
     */
    public function setParentOrderId($parent_order_id)
    {
        
        $this->parent_order_id = $parent_order_id;
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
     * Gets price_mode_code
     * @return string
     */
    public function getPriceModeCode()
    {
        return $this->price_mode_code;
    }
  
    /**
     * Sets price_mode_code
     * @param string $price_mode_code 
     * @return $this
     */
    public function setPriceModeCode($price_mode_code)
    {
        $allowed_values = array("INC", "EXC");
        if (!in_array($price_mode_code, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'price_mode_code', must be one of 'INC', 'EXC'");
        }
        $this->price_mode_code = $price_mode_code;
        return $this;
    }
    
    /**
     * Gets placed_on
     * @return string
     */
    public function getPlacedOn()
    {
        return $this->placed_on;
    }
  
    /**
     * Sets placed_on
     * @param string $placed_on 
     * @return $this
     */
    public function setPlacedOn($placed_on)
    {
        
        $this->placed_on = $placed_on;
        return $this;
    }
    
    /**
     * Gets order_status
     * @return \BrightpearlApiClient\Model\PostOrderOrderStatus
     */
    public function getOrderStatus()
    {
        return $this->order_status;
    }
  
    /**
     * Sets order_status
     * @param \BrightpearlApiClient\Model\PostOrderOrderStatus $order_status
     * @return $this
     */
    public function setOrderStatus($order_status)
    {
        
        $this->order_status = $order_status;
        return $this;
    }
    
    /**
     * Gets delivery
     * @return \BrightpearlApiClient\Model\OrderDelivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }
  
    /**
     * Sets delivery
     * @param \BrightpearlApiClient\Model\OrderDelivery $delivery
     * @return $this
     */
    public function setDelivery($delivery)
    {
        
        $this->delivery = $delivery;
        return $this;
    }
    
    /**
     * Gets invoices
     * @return \BrightpearlApiClient\Model\PostOrderInvoices[]
     */
    public function getInvoices()
    {
        return $this->invoices;
    }
  
    /**
     * Sets invoices
     * @param \BrightpearlApiClient\Model\PostOrderInvoices[] $invoices
     * @return $this
     */
    public function setInvoices($invoices)
    {
        
        $this->invoices = $invoices;
        return $this;
    }
    
    /**
     * Gets order_currency_code
     * @return string
     */
    public function getOrderCurrencyCode()
    {
        return $this->order_currency_code;
    }
  
    /**
     * Sets order_currency_code
     * @param string $order_currency_code 
     * @return $this
     */
    public function setOrderCurrencyCode($order_currency_code)
    {
        
        $this->order_currency_code = $order_currency_code;
        return $this;
    }
    
    /**
     * Gets parties
     * @return \BrightpearlApiClient\Model\PostOrderParties
     */
    public function getParties()
    {
        return $this->parties;
    }
  
    /**
     * Sets parties
     * @param \BrightpearlApiClient\Model\PostOrderParties $parties
     * @return $this
     */
    public function setParties($parties)
    {
        
        $this->parties = $parties;
        return $this;
    }
    
    /**
     * Gets assignment
     * @return \BrightpearlApiClient\Model\PostOrderAssignment
     */
    public function getAssignment()
    {
        return $this->assignment;
    }
  
    /**
     * Sets assignment
     * @param \BrightpearlApiClient\Model\PostOrderAssignment $assignment
     * @return $this
     */
    public function setAssignment($assignment)
    {
        
        $this->assignment = $assignment;
        return $this;
    }
    
    /**
     * Gets warehouse_id
     * @return int
     */
    public function getWarehouseId()
    {
        return $this->warehouse_id;
    }
  
    /**
     * Sets warehouse_id
     * @param int $warehouse_id 
     * @return $this
     */
    public function setWarehouseId($warehouse_id)
    {
        
        $this->warehouse_id = $warehouse_id;
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