<?php
/**
 * ProductReporting
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
 * ProductReporting Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ProductReporting implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'season_id' => 'int',
        'category_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'season_id' => 'seasonId',
        'category_id' => 'categoryId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'season_id' => 'setSeasonId',
        'category_id' => 'setCategoryId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'season_id' => 'getSeasonId',
        'category_id' => 'getCategoryId'
    );
  
    
    /**
      * $season_id 
      * @var int
      */
    protected $season_id;
    
    /**
      * $category_id 
      * @var int
      */
    protected $category_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->season_id = $data["season_id"];
            $this->category_id = $data["category_id"];
        }
    }
    
    /**
     * Gets season_id
     * @return int
     */
    public function getSeasonId()
    {
        return $this->season_id;
    }
  
    /**
     * Sets season_id
     * @param int $season_id 
     * @return $this
     */
    public function setSeasonId($season_id)
    {
        
        $this->season_id = $season_id;
        return $this;
    }
    
    /**
     * Gets category_id
     * @return int
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }
  
    /**
     * Sets category_id
     * @param int $category_id 
     * @return $this
     */
    public function setCategoryId($category_id)
    {
        
        $this->category_id = $category_id;
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