<?php
/**
 * ContactPostAddressIds
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
 * ContactPostAddressIds Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ContactPostAddressIds implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'def' => 'int',
        'bil' => 'int',
        'del' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'def' => 'DEF',
        'bil' => 'BIL',
        'del' => 'DEL'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'def' => 'setDef',
        'bil' => 'setBil',
        'del' => 'setDel'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'def' => 'getDef',
        'bil' => 'getBil',
        'del' => 'getDel'
    );
  
    
    /**
      * $def 
      * @var int
      */
    protected $def;
    
    /**
      * $bil 
      * @var int
      */
    protected $bil;
    
    /**
      * $del 
      * @var int
      */
    protected $del;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->def = $data["def"];
            $this->bil = $data["bil"];
            $this->del = $data["del"];
        }
    }
    
    /**
     * Gets def
     * @return int
     */
    public function getDef()
    {
        return $this->def;
    }
  
    /**
     * Sets def
     * @param int $def 
     * @return $this
     */
    public function setDef($def)
    {
        
        $this->def = $def;
        return $this;
    }
    
    /**
     * Gets bil
     * @return int
     */
    public function getBil()
    {
        return $this->bil;
    }
  
    /**
     * Sets bil
     * @param int $bil 
     * @return $this
     */
    public function setBil($bil)
    {
        
        $this->bil = $bil;
        return $this;
    }
    
    /**
     * Gets del
     * @return int
     */
    public function getDel()
    {
        return $this->del;
    }
  
    /**
     * Sets del
     * @param int $del 
     * @return $this
     */
    public function setDel($del)
    {
        
        $this->del = $del;
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