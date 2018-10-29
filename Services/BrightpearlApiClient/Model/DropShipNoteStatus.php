<?php
/**
 * DropShipNoteStatus
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
 * DropShipNoteStatus Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class DropShipNoteStatus implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'shipped' => 'bool',
        'shipped_on' => 'string',
        'shipped_by_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'shipped' => 'shipped',
        'shipped_on' => 'shippedOn',
        'shipped_by_id' => 'shippedById'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'shipped' => 'setShipped',
        'shipped_on' => 'setShippedOn',
        'shipped_by_id' => 'setShippedById'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'shipped' => 'getShipped',
        'shipped_on' => 'getShippedOn',
        'shipped_by_id' => 'getShippedById'
    );
  
    
    /**
      * $shipped 
      * @var bool
      */
    protected $shipped;
    
    /**
      * $shipped_on 
      * @var string
      */
    protected $shipped_on;
    
    /**
      * $shipped_by_id 
      * @var int
      */
    protected $shipped_by_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->shipped = $data["shipped"];
            $this->shipped_on = $data["shipped_on"];
            $this->shipped_by_id = $data["shipped_by_id"];
        }
    }
    
    /**
     * Gets shipped
     * @return bool
     */
    public function getShipped()
    {
        return $this->shipped;
    }
  
    /**
     * Sets shipped
     * @param bool $shipped 
     * @return $this
     */
    public function setShipped($shipped)
    {
        
        $this->shipped = $shipped;
        return $this;
    }
    
    /**
     * Gets shipped_on
     * @return string
     */
    public function getShippedOn()
    {
        return $this->shipped_on;
    }
  
    /**
     * Sets shipped_on
     * @param string $shipped_on 
     * @return $this
     */
    public function setShippedOn($shipped_on)
    {
        
        $this->shipped_on = $shipped_on;
        return $this;
    }
    
    /**
     * Gets shipped_by_id
     * @return int
     */
    public function getShippedById()
    {
        return $this->shipped_by_id;
    }
  
    /**
     * Sets shipped_by_id
     * @param int $shipped_by_id 
     * @return $this
     */
    public function setShippedById($shipped_by_id)
    {
        
        $this->shipped_by_id = $shipped_by_id;
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
