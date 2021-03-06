<?php
/**
 * Category
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
 * Category Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Category implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'id' => 'int',
        'name' => 'string',
        'parent_id' => 'int',
        'active' => 'bool',
        'created_on' => 'string',
        'created_by_id' => 'int',
        'updated_on' => 'string',
        'updated_by_id' => 'int',
        'description' => '\BrightpearlApiClient\Model\PriceListName'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'id' => 'id',
        'name' => 'name',
        'parent_id' => 'parentId',
        'active' => 'active',
        'created_on' => 'createdOn',
        'created_by_id' => 'createdById',
        'updated_on' => 'updatedOn',
        'updated_by_id' => 'updatedById',
        'description' => 'description'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'id' => 'setId',
        'name' => 'setName',
        'parent_id' => 'setParentId',
        'active' => 'setActive',
        'created_on' => 'setCreatedOn',
        'created_by_id' => 'setCreatedById',
        'updated_on' => 'setUpdatedOn',
        'updated_by_id' => 'setUpdatedById',
        'description' => 'setDescription'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'id' => 'getId',
        'name' => 'getName',
        'parent_id' => 'getParentId',
        'active' => 'getActive',
        'created_on' => 'getCreatedOn',
        'created_by_id' => 'getCreatedById',
        'updated_on' => 'getUpdatedOn',
        'updated_by_id' => 'getUpdatedById',
        'description' => 'getDescription'
    );
  
    
    /**
      * $id 
      * @var int
      */
    protected $id;
    
    /**
      * $name 
      * @var string
      */
    protected $name;
    
    /**
      * $parent_id 
      * @var int
      */
    protected $parent_id;
    
    /**
      * $active 
      * @var bool
      */
    protected $active;
    
    /**
      * $created_on 
      * @var string
      */
    protected $created_on;
    
    /**
      * $created_by_id 
      * @var int
      */
    protected $created_by_id;
    
    /**
      * $updated_on 
      * @var string
      */
    protected $updated_on;
    
    /**
      * $updated_by_id 
      * @var int
      */
    protected $updated_by_id;
    
    /**
      * $description 
      * @var \BrightpearlApiClient\Model\PriceListName
      */
    protected $description;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->id = $data["id"];
            $this->name = $data["name"];
            $this->parent_id = $data["parent_id"];
            $this->active = $data["active"];
            $this->created_on = $data["created_on"];
            $this->created_by_id = $data["created_by_id"];
            $this->updated_on = $data["updated_on"];
            $this->updated_by_id = $data["updated_by_id"];
            $this->description = $data["description"];
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
     * @param string $name 
     * @return $this
     */
    public function setName($name)
    {
        
        $this->name = $name;
        return $this;
    }
    
    /**
     * Gets parent_id
     * @return int
     */
    public function getParentId()
    {
        return $this->parent_id;
    }
  
    /**
     * Sets parent_id
     * @param int $parent_id 
     * @return $this
     */
    public function setParentId($parent_id)
    {
        
        $this->parent_id = $parent_id;
        return $this;
    }
    
    /**
     * Gets active
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }
  
    /**
     * Sets active
     * @param bool $active 
     * @return $this
     */
    public function setActive($active)
    {
        
        $this->active = $active;
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
     * Gets created_by_id
     * @return int
     */
    public function getCreatedById()
    {
        return $this->created_by_id;
    }
  
    /**
     * Sets created_by_id
     * @param int $created_by_id 
     * @return $this
     */
    public function setCreatedById($created_by_id)
    {
        
        $this->created_by_id = $created_by_id;
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
     * Gets updated_by_id
     * @return int
     */
    public function getUpdatedById()
    {
        return $this->updated_by_id;
    }
  
    /**
     * Sets updated_by_id
     * @param int $updated_by_id 
     * @return $this
     */
    public function setUpdatedById($updated_by_id)
    {
        
        $this->updated_by_id = $updated_by_id;
        return $this;
    }
    
    /**
     * Gets description
     * @return \BrightpearlApiClient\Model\PriceListName
     */
    public function getDescription()
    {
        return $this->description;
    }
  
    /**
     * Sets description
     * @param \BrightpearlApiClient\Model\PriceListName $description
     * @return $this
     */
    public function setDescription($description)
    {
        
        $this->description = $description;
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
