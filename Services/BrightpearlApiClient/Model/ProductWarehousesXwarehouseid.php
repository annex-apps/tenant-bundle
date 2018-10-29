<?php
/**
 * ProductWarehousesXwarehouseid
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
 * ProductWarehousesXwarehouseid Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ProductWarehousesXwarehouseid implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'reorder_level' => 'int',
        'reorder_quantity' => 'int',
        'default_location_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'reorder_level' => 'reorderLevel',
        'reorder_quantity' => 'reorderQuantity',
        'default_location_id' => 'defaultLocationId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'reorder_level' => 'setReorderLevel',
        'reorder_quantity' => 'setReorderQuantity',
        'default_location_id' => 'setDefaultLocationId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'reorder_level' => 'getReorderLevel',
        'reorder_quantity' => 'getReorderQuantity',
        'default_location_id' => 'getDefaultLocationId'
    );
  
    
    /**
      * $reorder_level 
      * @var int
      */
    protected $reorder_level;
    
    /**
      * $reorder_quantity 
      * @var int
      */
    protected $reorder_quantity;
    
    /**
      * $default_location_id 
      * @var int
      */
    protected $default_location_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->reorder_level = $data["reorder_level"];
            $this->reorder_quantity = $data["reorder_quantity"];
            $this->default_location_id = $data["default_location_id"];
        }
    }
    
    /**
     * Gets reorder_level
     * @return int
     */
    public function getReorderLevel()
    {
        return $this->reorder_level;
    }
  
    /**
     * Sets reorder_level
     * @param int $reorder_level 
     * @return $this
     */
    public function setReorderLevel($reorder_level)
    {
        
        $this->reorder_level = $reorder_level;
        return $this;
    }
    
    /**
     * Gets reorder_quantity
     * @return int
     */
    public function getReorderQuantity()
    {
        return $this->reorder_quantity;
    }
  
    /**
     * Sets reorder_quantity
     * @param int $reorder_quantity 
     * @return $this
     */
    public function setReorderQuantity($reorder_quantity)
    {
        
        $this->reorder_quantity = $reorder_quantity;
        return $this;
    }
    
    /**
     * Gets default_location_id
     * @return int
     */
    public function getDefaultLocationId()
    {
        return $this->default_location_id;
    }
  
    /**
     * Sets default_location_id
     * @param int $default_location_id 
     * @return $this
     */
    public function setDefaultLocationId($default_location_id)
    {
        
        $this->default_location_id = $default_location_id;
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
