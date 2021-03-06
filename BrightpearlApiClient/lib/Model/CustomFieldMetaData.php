<?php
/**
 * CustomFieldMetaData
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
 * CustomFieldMetaData Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class CustomFieldMetaData implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'id' => 'int',
        'code' => 'string',
        'name' => 'string',
        'custom_field_type' => 'string',
        'required' => 'bool',
        'options' => '\BrightpearlApiClient\Model\CustomFieldMetaDataOptions'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'id' => 'id',
        'code' => 'code',
        'name' => 'name',
        'custom_field_type' => 'customFieldType',
        'required' => 'required',
        'options' => 'options'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'id' => 'setId',
        'code' => 'setCode',
        'name' => 'setName',
        'custom_field_type' => 'setCustomFieldType',
        'required' => 'setRequired',
        'options' => 'setOptions'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'id' => 'getId',
        'code' => 'getCode',
        'name' => 'getName',
        'custom_field_type' => 'getCustomFieldType',
        'required' => 'getRequired',
        'options' => 'getOptions'
    );
  
    
    /**
      * $id 
      * @var int
      */
    protected $id;
    
    /**
      * $code 
      * @var string
      */
    protected $code;
    
    /**
      * $name 
      * @var string
      */
    protected $name;
    
    /**
      * $custom_field_type 
      * @var string
      */
    protected $custom_field_type;
    
    /**
      * $required 
      * @var bool
      */
    protected $required;
    
    /**
      * $options 
      * @var \BrightpearlApiClient\Model\CustomFieldMetaDataOptions
      */
    protected $options;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->id = $data["id"];
            $this->code = $data["code"];
            $this->name = $data["name"];
            $this->custom_field_type = $data["custom_field_type"];
            $this->required = $data["required"];
            $this->options = $data["options"];
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
     * Gets code
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
  
    /**
     * Sets code
     * @param string $code 
     * @return $this
     */
    public function setCode($code)
    {
        
        $this->code = $code;
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
     * Gets custom_field_type
     * @return string
     */
    public function getCustomFieldType()
    {
        return $this->custom_field_type;
    }
  
    /**
     * Sets custom_field_type
     * @param string $custom_field_type 
     * @return $this
     */
    public function setCustomFieldType($custom_field_type)
    {
        
        $this->custom_field_type = $custom_field_type;
        return $this;
    }
    
    /**
     * Gets required
     * @return bool
     */
    public function getRequired()
    {
        return $this->required;
    }
  
    /**
     * Sets required
     * @param bool $required 
     * @return $this
     */
    public function setRequired($required)
    {
        
        $this->required = $required;
        return $this;
    }
    
    /**
     * Gets options
     * @return \BrightpearlApiClient\Model\CustomFieldMetaDataOptions
     */
    public function getOptions()
    {
        return $this->options;
    }
  
    /**
     * Sets options
     * @param \BrightpearlApiClient\Model\CustomFieldMetaDataOptions $options
     * @return $this
     */
    public function setOptions($options)
    {
        
        $this->options = $options;
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
