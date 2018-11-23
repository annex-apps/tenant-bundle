<?php
/**
 * GoodsInNoteGoodsMoved
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
 * GoodsInNoteGoodsMoved Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class GoodsInNoteGoodsMoved implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'quantity' => 'int',
        'updated_by' => 'int',
        'product_id' => 'int',
        'destination_location_id' => 'int',
        'updated_on' => 'string',
        'created_on' => 'string',
        'purchase_order_row_id' => 'int',
        'product_value' => '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\MonetaryValue',
        'warehouse_id' => 'int',
        'goods_note_id' => 'int',
        'created_by' => 'int',
        'batch_goods_note_id' => 'int',
        'quarantine' => 'bool',
        'value_confirmed' => 'bool',
        'cleared' => 'bool',
        'allocated' => 'bool'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'quantity' => 'quantity',
        'updated_by' => 'updatedBy',
        'product_id' => 'productId',
        'destination_location_id' => 'destinationLocationId',
        'updated_on' => 'updatedOn',
        'created_on' => 'createdOn',
        'purchase_order_row_id' => 'purchaseOrderRowId',
        'product_value' => 'productValue',
        'warehouse_id' => 'warehouseId',
        'goods_note_id' => 'goodsNoteId',
        'created_by' => 'createdBy',
        'batch_goods_note_id' => 'batchGoodsNoteId',
        'quarantine' => 'quarantine',
        'value_confirmed' => 'valueConfirmed',
        'cleared' => 'cleared',
        'allocated' => 'allocated'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'quantity' => 'setQuantity',
        'updated_by' => 'setUpdatedBy',
        'product_id' => 'setProductId',
        'destination_location_id' => 'setDestinationLocationId',
        'updated_on' => 'setUpdatedOn',
        'created_on' => 'setCreatedOn',
        'purchase_order_row_id' => 'setPurchaseOrderRowId',
        'product_value' => 'setProductValue',
        'warehouse_id' => 'setWarehouseId',
        'goods_note_id' => 'setGoodsNoteId',
        'created_by' => 'setCreatedBy',
        'batch_goods_note_id' => 'setBatchGoodsNoteId',
        'quarantine' => 'setQuarantine',
        'value_confirmed' => 'setValueConfirmed',
        'cleared' => 'setCleared',
        'allocated' => 'setAllocated'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'quantity' => 'getQuantity',
        'updated_by' => 'getUpdatedBy',
        'product_id' => 'getProductId',
        'destination_location_id' => 'getDestinationLocationId',
        'updated_on' => 'getUpdatedOn',
        'created_on' => 'getCreatedOn',
        'purchase_order_row_id' => 'getPurchaseOrderRowId',
        'product_value' => 'getProductValue',
        'warehouse_id' => 'getWarehouseId',
        'goods_note_id' => 'getGoodsNoteId',
        'created_by' => 'getCreatedBy',
        'batch_goods_note_id' => 'getBatchGoodsNoteId',
        'quarantine' => 'getQuarantine',
        'value_confirmed' => 'getValueConfirmed',
        'cleared' => 'getCleared',
        'allocated' => 'getAllocated'
    );
  
    
    /**
      * $quantity 
      * @var int
      */
    protected $quantity;
    
    /**
      * $updated_by 
      * @var int
      */
    protected $updated_by;
    
    /**
      * $product_id 
      * @var int
      */
    protected $product_id;
    
    /**
      * $destination_location_id 
      * @var int
      */
    protected $destination_location_id;
    
    /**
      * $updated_on 
      * @var string
      */
    protected $updated_on;
    
    /**
      * $created_on 
      * @var string
      */
    protected $created_on;
    
    /**
      * $purchase_order_row_id 
      * @var int
      */
    protected $purchase_order_row_id;
    
    /**
      * $product_value 
      * @var \BrightpearlApiClient\Model\MonetaryValue
      */
    protected $product_value;
    
    /**
      * $warehouse_id 
      * @var int
      */
    protected $warehouse_id;
    
    /**
      * $goods_note_id 
      * @var int
      */
    protected $goods_note_id;
    
    /**
      * $created_by 
      * @var int
      */
    protected $created_by;
    
    /**
      * $batch_goods_note_id 
      * @var int
      */
    protected $batch_goods_note_id;
    
    /**
      * $quarantine 
      * @var bool
      */
    protected $quarantine;
    
    /**
      * $value_confirmed 
      * @var bool
      */
    protected $value_confirmed;
    
    /**
      * $cleared 
      * @var bool
      */
    protected $cleared;
    
    /**
      * $allocated 
      * @var bool
      */
    protected $allocated;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->quantity = $data["quantity"];
            $this->updated_by = $data["updated_by"];
            $this->product_id = $data["product_id"];
            $this->destination_location_id = $data["destination_location_id"];
            $this->updated_on = $data["updated_on"];
            $this->created_on = $data["created_on"];
            $this->purchase_order_row_id = $data["purchase_order_row_id"];
            $this->product_value = $data["product_value"];
            $this->warehouse_id = $data["warehouse_id"];
            $this->goods_note_id = $data["goods_note_id"];
            $this->created_by = $data["created_by"];
            $this->batch_goods_note_id = $data["batch_goods_note_id"];
            $this->quarantine = $data["quarantine"];
            $this->value_confirmed = $data["value_confirmed"];
            $this->cleared = $data["cleared"];
            $this->allocated = $data["allocated"];
        }
    }
    
    /**
     * Gets quantity
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
  
    /**
     * Sets quantity
     * @param int $quantity 
     * @return $this
     */
    public function setQuantity($quantity)
    {
        
        $this->quantity = $quantity;
        return $this;
    }
    
    /**
     * Gets updated_by
     * @return int
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }
  
    /**
     * Sets updated_by
     * @param int $updated_by 
     * @return $this
     */
    public function setUpdatedBy($updated_by)
    {
        
        $this->updated_by = $updated_by;
        return $this;
    }
    
    /**
     * Gets product_id
     * @return int
     */
    public function getProductId()
    {
        return $this->product_id;
    }
  
    /**
     * Sets product_id
     * @param int $product_id 
     * @return $this
     */
    public function setProductId($product_id)
    {
        
        $this->product_id = $product_id;
        return $this;
    }
    
    /**
     * Gets destination_location_id
     * @return int
     */
    public function getDestinationLocationId()
    {
        return $this->destination_location_id;
    }
  
    /**
     * Sets destination_location_id
     * @param int $destination_location_id 
     * @return $this
     */
    public function setDestinationLocationId($destination_location_id)
    {
        
        $this->destination_location_id = $destination_location_id;
        return $this;
    }
    
    /**
     * Gets updated_on
     * @return string
     */
    public function getUpdatedOn()
    {
        return $this->updated_on;
    }
  
    /**
     * Sets updated_on
     * @param string $updated_on 
     * @return $this
     */
    public function setUpdatedOn($updated_on)
    {
        
        $this->updated_on = $updated_on;
        return $this;
    }
    
    /**
     * Gets created_on
     * @return string
     */
    public function getCreatedOn()
    {
        return $this->created_on;
    }
  
    /**
     * Sets created_on
     * @param string $created_on 
     * @return $this
     */
    public function setCreatedOn($created_on)
    {
        
        $this->created_on = $created_on;
        return $this;
    }
    
    /**
     * Gets purchase_order_row_id
     * @return int
     */
    public function getPurchaseOrderRowId()
    {
        return $this->purchase_order_row_id;
    }
  
    /**
     * Sets purchase_order_row_id
     * @param int $purchase_order_row_id 
     * @return $this
     */
    public function setPurchaseOrderRowId($purchase_order_row_id)
    {
        
        $this->purchase_order_row_id = $purchase_order_row_id;
        return $this;
    }
    
    /**
     * Gets product_value
     * @return \BrightpearlApiClient\Model\MonetaryValue
     */
    public function getProductValue()
    {
        return $this->product_value;
    }
  
    /**
     * Sets product_value
     * @param \BrightpearlApiClient\Model\MonetaryValue $product_value
     * @return $this
     */
    public function setProductValue($product_value)
    {
        
        $this->product_value = $product_value;
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
     * Gets goods_note_id
     * @return int
     */
    public function getGoodsNoteId()
    {
        return $this->goods_note_id;
    }
  
    /**
     * Sets goods_note_id
     * @param int $goods_note_id 
     * @return $this
     */
    public function setGoodsNoteId($goods_note_id)
    {
        
        $this->goods_note_id = $goods_note_id;
        return $this;
    }
    
    /**
     * Gets created_by
     * @return int
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }
  
    /**
     * Sets created_by
     * @param int $created_by 
     * @return $this
     */
    public function setCreatedBy($created_by)
    {
        
        $this->created_by = $created_by;
        return $this;
    }
    
    /**
     * Gets batch_goods_note_id
     * @return int
     */
    public function getBatchGoodsNoteId()
    {
        return $this->batch_goods_note_id;
    }
  
    /**
     * Sets batch_goods_note_id
     * @param int $batch_goods_note_id 
     * @return $this
     */
    public function setBatchGoodsNoteId($batch_goods_note_id)
    {
        
        $this->batch_goods_note_id = $batch_goods_note_id;
        return $this;
    }
    
    /**
     * Gets quarantine
     * @return bool
     */
    public function getQuarantine()
    {
        return $this->quarantine;
    }
  
    /**
     * Sets quarantine
     * @param bool $quarantine 
     * @return $this
     */
    public function setQuarantine($quarantine)
    {
        
        $this->quarantine = $quarantine;
        return $this;
    }
    
    /**
     * Gets value_confirmed
     * @return bool
     */
    public function getValueConfirmed()
    {
        return $this->value_confirmed;
    }
  
    /**
     * Sets value_confirmed
     * @param bool $value_confirmed 
     * @return $this
     */
    public function setValueConfirmed($value_confirmed)
    {
        
        $this->value_confirmed = $value_confirmed;
        return $this;
    }
    
    /**
     * Gets cleared
     * @return bool
     */
    public function getCleared()
    {
        return $this->cleared;
    }
  
    /**
     * Sets cleared
     * @param bool $cleared 
     * @return $this
     */
    public function setCleared($cleared)
    {
        
        $this->cleared = $cleared;
        return $this;
    }
    
    /**
     * Gets allocated
     * @return bool
     */
    public function getAllocated()
    {
        return $this->allocated;
    }
  
    /**
     * Sets allocated
     * @param bool $allocated 
     * @return $this
     */
    public function setAllocated($allocated)
    {
        
        $this->allocated = $allocated;
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