<?php
/**
 * PostGoodsInNote
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
 * PostGoodsInNote Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PostGoodsInNote implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'order_id' => 'int',
        'transfer' => 'bool',
        'warehouse_id' => 'int',
        'goods_moved' => '\BrightpearlApiClient\Model\PostGoodsInNoteGoodsMoved[]',
        'received_on' => 'string',
        'user_batch_reference' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'order_id' => 'orderId',
        'transfer' => 'transfer',
        'warehouse_id' => 'warehouseId',
        'goods_moved' => 'goodsMoved',
        'received_on' => 'receivedOn',
        'user_batch_reference' => 'userBatchReference'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'order_id' => 'setOrderId',
        'transfer' => 'setTransfer',
        'warehouse_id' => 'setWarehouseId',
        'goods_moved' => 'setGoodsMoved',
        'received_on' => 'setReceivedOn',
        'user_batch_reference' => 'setUserBatchReference'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'order_id' => 'getOrderId',
        'transfer' => 'getTransfer',
        'warehouse_id' => 'getWarehouseId',
        'goods_moved' => 'getGoodsMoved',
        'received_on' => 'getReceivedOn',
        'user_batch_reference' => 'getUserBatchReference'
    );
  
    
    /**
      * $order_id 
      * @var int
      */
    protected $order_id;
    
    /**
      * $transfer 
      * @var bool
      */
    protected $transfer;
    
    /**
      * $warehouse_id 
      * @var int
      */
    protected $warehouse_id;
    
    /**
      * $goods_moved 
      * @var \BrightpearlApiClient\Model\PostGoodsInNoteGoodsMoved[]
      */
    protected $goods_moved;
    
    /**
      * $received_on 
      * @var string
      */
    protected $received_on;
    
    /**
      * $user_batch_reference 
      * @var string
      */
    protected $user_batch_reference;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->order_id = $data["order_id"];
            $this->transfer = $data["transfer"];
            $this->warehouse_id = $data["warehouse_id"];
            $this->goods_moved = $data["goods_moved"];
            $this->received_on = $data["received_on"];
            $this->user_batch_reference = $data["user_batch_reference"];
        }
    }
    
    /**
     * Gets order_id
     * @return int
     */
    public function getOrderId()
    {
        return $this->order_id;
    }
  
    /**
     * Sets order_id
     * @param int $order_id 
     * @return $this
     */
    public function setOrderId($order_id)
    {
        
        $this->order_id = $order_id;
        return $this;
    }
    
    /**
     * Gets transfer
     * @return bool
     */
    public function getTransfer()
    {
        return $this->transfer;
    }
  
    /**
     * Sets transfer
     * @param bool $transfer 
     * @return $this
     */
    public function setTransfer($transfer)
    {
        
        $this->transfer = $transfer;
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
     * Gets goods_moved
     * @return \BrightpearlApiClient\Model\PostGoodsInNoteGoodsMoved[]
     */
    public function getGoodsMoved()
    {
        return $this->goods_moved;
    }
  
    /**
     * Sets goods_moved
     * @param \BrightpearlApiClient\Model\PostGoodsInNoteGoodsMoved[] $goods_moved
     * @return $this
     */
    public function setGoodsMoved($goods_moved)
    {
        
        $this->goods_moved = $goods_moved;
        return $this;
    }
    
    /**
     * Gets received_on
     * @return string
     */
    public function getReceivedOn()
    {
        return $this->received_on;
    }
  
    /**
     * Sets received_on
     * @param string $received_on 
     * @return $this
     */
    public function setReceivedOn($received_on)
    {
        
        $this->received_on = $received_on;
        return $this;
    }
    
    /**
     * Gets user_batch_reference
     * @return string
     */
    public function getUserBatchReference()
    {
        return $this->user_batch_reference;
    }
  
    /**
     * Sets user_batch_reference
     * @param string $user_batch_reference 
     * @return $this
     */
    public function setUserBatchReference($user_batch_reference)
    {
        
        $this->user_batch_reference = $user_batch_reference;
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
