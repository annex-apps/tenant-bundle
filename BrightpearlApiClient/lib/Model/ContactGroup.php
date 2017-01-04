<?php
/**
 * ContactGroup
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
 * ContactGroup Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ContactGroup implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'id' => 'int',
        'name' => 'string',
        'description' => 'string',
        'is_read_only' => 'bool',
        'created_by' => 'int',
        'created_on' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'id' => 'id',
        'name' => 'name',
        'description' => 'description',
        'is_read_only' => 'isReadOnly',
        'created_by' => 'createdBy',
        'created_on' => 'createdOn'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'id' => 'setId',
        'name' => 'setName',
        'description' => 'setDescription',
        'is_read_only' => 'setIsReadOnly',
        'created_by' => 'setCreatedBy',
        'created_on' => 'setCreatedOn'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'id' => 'getId',
        'name' => 'getName',
        'description' => 'getDescription',
        'is_read_only' => 'getIsReadOnly',
        'created_by' => 'getCreatedBy',
        'created_on' => 'getCreatedOn'
    );
  
    
    /**
      * $id 
      * @var int
      */
    protected $id;
    
    /**
      * $name A short name for this group (Sales Team, Loyalty Card Members etc)
      * @var string
      */
    protected $name;
    
    /**
      * $description A short free-text description about this group (perhaps explaining the purpose of the group)
      * @var string
      */
    protected $description;
    
    /**
      * $is_read_only 
      * @var bool
      */
    protected $is_read_only;
    
    /**
      * $created_by 
      * @var int
      */
    protected $created_by;
    
    /**
      * $created_on 
      * @var string
      */
    protected $created_on;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->id = $data["id"];
            $this->name = $data["name"];
            $this->description = $data["description"];
            $this->is_read_only = $data["is_read_only"];
            $this->created_by = $data["created_by"];
            $this->created_on = $data["created_on"];
        }
    }
    
    /**
     * Gets id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
  
    /**
     * Sets id
     * @param int $id 
     * @return $this
     */
    public function setId($id)
    {
        
        $this->id = $id;
        return $this;
    }
    
    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
  
    /**
     * Sets name
     * @param string $name A short name for this group (Sales Team, Loyalty Card Members etc)
     * @return $this
     */
    public function setName($name)
    {
        
        $this->name = $name;
        return $this;
    }
    
    /**
     * Gets description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
  
    /**
     * Sets description
     * @param string $description A short free-text description about this group (perhaps explaining the purpose of the group)
     * @return $this
     */
    public function setDescription($description)
    {
        
        $this->description = $description;
        return $this;
    }
    
    /**
     * Gets is_read_only
     * @return bool
     */
    public function getIsReadOnly()
    {
        return $this->is_read_only;
    }
  
    /**
     * Sets is_read_only
     * @param bool $is_read_only 
     * @return $this
     */
    public function setIsReadOnly($is_read_only)
    {
        
        $this->is_read_only = $is_read_only;
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