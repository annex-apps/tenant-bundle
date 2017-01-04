<?php
/**
 * OptionValue
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
 * OptionValue Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class OptionValue implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'option_value_id' => 'int',
        'option_value_name' => 'string',
        'option_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'option_value_id' => 'optionValueId',
        'option_value_name' => 'optionValueName',
        'option_id' => 'optionId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'option_value_id' => 'setOptionValueId',
        'option_value_name' => 'setOptionValueName',
        'option_id' => 'setOptionId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'option_value_id' => 'getOptionValueId',
        'option_value_name' => 'getOptionValueName',
        'option_id' => 'getOptionId'
    );
  
    
    /**
      * $option_value_id 
      * @var int
      */
    protected $option_value_id;
    
    /**
      * $option_value_name 
      * @var string
      */
    protected $option_value_name;
    
    /**
      * $option_id 
      * @var int
      */
    protected $option_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->option_value_id = $data["option_value_id"];
            $this->option_value_name = $data["option_value_name"];
            $this->option_id = $data["option_id"];
        }
    }
    
    /**
     * Gets option_value_id
     * @return int
     */
    public function getOptionValueId()
    {
        return $this->option_value_id;
    }
  
    /**
     * Sets option_value_id
     * @param int $option_value_id 
     * @return $this
     */
    public function setOptionValueId($option_value_id)
    {
        
        $this->option_value_id = $option_value_id;
        return $this;
    }
    
    /**
     * Gets option_value_name
     * @return string
     */
    public function getOptionValueName()
    {
        return $this->option_value_name;
    }
  
    /**
     * Sets option_value_name
     * @param string $option_value_name 
     * @return $this
     */
    public function setOptionValueName($option_value_name)
    {
        
        $this->option_value_name = $option_value_name;
        return $this;
    }
    
    /**
     * Gets option_id
     * @return int
     */
    public function getOptionId()
    {
        return $this->option_id;
    }
  
    /**
     * Sets option_id
     * @param int $option_id 
     * @return $this
     */
    public function setOptionId($option_id)
    {
        
        $this->option_id = $option_id;
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