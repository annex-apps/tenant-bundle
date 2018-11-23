<?php
/**
 * SearchFilter
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
 * SearchFilter Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class SearchFilter implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'name' => 'string',
        'sortable' => 'bool',
        'filterable' => 'bool',
        'report_data_type' => 'string',
        'required' => 'bool'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'name' => 'name',
        'sortable' => 'sortable',
        'filterable' => 'filterable',
        'report_data_type' => 'reportDataType',
        'required' => 'required'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'name' => 'setName',
        'sortable' => 'setSortable',
        'filterable' => 'setFilterable',
        'report_data_type' => 'setReportDataType',
        'required' => 'setRequired'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'name' => 'getName',
        'sortable' => 'getSortable',
        'filterable' => 'getFilterable',
        'report_data_type' => 'getReportDataType',
        'required' => 'getRequired'
    );
  
    
    /**
      * $name 
      * @var string
      */
    protected $name;
    
    /**
      * $sortable 
      * @var bool
      */
    protected $sortable;
    
    /**
      * $filterable 
      * @var bool
      */
    protected $filterable;
    
    /**
      * $report_data_type 
      * @var string
      */
    protected $report_data_type;
    
    /**
      * $required 
      * @var bool
      */
    protected $required;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->name = $data["name"];
            $this->sortable = $data["sortable"];
            $this->filterable = $data["filterable"];
            $this->report_data_type = $data["report_data_type"];
            $this->required = $data["required"];
        }
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
     * Gets sortable
     * @return bool
     */
    public function getSortable()
    {
        return $this->sortable;
    }
  
    /**
     * Sets sortable
     * @param bool $sortable 
     * @return $this
     */
    public function setSortable($sortable)
    {
        
        $this->sortable = $sortable;
        return $this;
    }
    
    /**
     * Gets filterable
     * @return bool
     */
    public function getFilterable()
    {
        return $this->filterable;
    }
  
    /**
     * Sets filterable
     * @param bool $filterable 
     * @return $this
     */
    public function setFilterable($filterable)
    {
        
        $this->filterable = $filterable;
        return $this;
    }
    
    /**
     * Gets report_data_type
     * @return string
     */
    public function getReportDataType()
    {
        return $this->report_data_type;
    }
  
    /**
     * Sets report_data_type
     * @param string $report_data_type 
     * @return $this
     */
    public function setReportDataType($report_data_type)
    {
        
        $this->report_data_type = $report_data_type;
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