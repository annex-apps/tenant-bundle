<?php
/**
 * Event
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
 * Event Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Event implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'occured' => 'string',
        'event_owner_id' => 'int',
        'event_code' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'occured' => 'occured',
        'event_owner_id' => 'eventOwnerId',
        'event_code' => 'eventCode'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'occured' => 'setOccured',
        'event_owner_id' => 'setEventOwnerId',
        'event_code' => 'setEventCode'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'occured' => 'getOccured',
        'event_owner_id' => 'getEventOwnerId',
        'event_code' => 'getEventCode'
    );
  
    
    /**
      * $occured 
      * @var string
      */
    protected $occured;
    
    /**
      * $event_owner_id 
      * @var int
      */
    protected $event_owner_id;
    
    /**
      * $event_code 
      * @var string
      */
    protected $event_code;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->occured = $data["occured"];
            $this->event_owner_id = $data["event_owner_id"];
            $this->event_code = $data["event_code"];
        }
    }
    
    /**
     * Gets occured
     * @return string
     */
    public function getOccured()
    {
        return $this->occured;
    }
  
    /**
     * Sets occured
     * @param string $occured 
     * @return $this
     */
    public function setOccured($occured)
    {
        
        $this->occured = $occured;
        return $this;
    }
    
    /**
     * Gets event_owner_id
     * @return int
     */
    public function getEventOwnerId()
    {
        return $this->event_owner_id;
    }
  
    /**
     * Sets event_owner_id
     * @param int $event_owner_id 
     * @return $this
     */
    public function setEventOwnerId($event_owner_id)
    {
        
        $this->event_owner_id = $event_owner_id;
        return $this;
    }
    
    /**
     * Gets event_code
     * @return string
     */
    public function getEventCode()
    {
        return $this->event_code;
    }
  
    /**
     * Sets event_code
     * @param string $event_code 
     * @return $this
     */
    public function setEventCode($event_code)
    {
        
        $this->event_code = $event_code;
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
