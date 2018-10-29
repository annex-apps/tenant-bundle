<?php
/**
 * PostalAddress
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
 * PostalAddress Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PostalAddress implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'address_line1' => 'string',
        'address_line2' => 'string',
        'address_line3' => 'string',
        'address_line4' => 'string',
        'postal_code' => 'string',
        'country_iso_code' => 'string',
        'country_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'address_line1' => 'addressLine1',
        'address_line2' => 'addressLine2',
        'address_line3' => 'addressLine3',
        'address_line4' => 'addressLine4',
        'postal_code' => 'postalCode',
        'country_iso_code' => 'countryIsoCode',
        'country_id' => 'countryId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'address_line1' => 'setAddressLine1',
        'address_line2' => 'setAddressLine2',
        'address_line3' => 'setAddressLine3',
        'address_line4' => 'setAddressLine4',
        'postal_code' => 'setPostalCode',
        'country_iso_code' => 'setCountryIsoCode',
        'country_id' => 'setCountryId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'address_line1' => 'getAddressLine1',
        'address_line2' => 'getAddressLine2',
        'address_line3' => 'getAddressLine3',
        'address_line4' => 'getAddressLine4',
        'postal_code' => 'getPostalCode',
        'country_iso_code' => 'getCountryIsoCode',
        'country_id' => 'getCountryId'
    );
    
    /**
      * $address_line1 
      * @var string
      */
    protected $address_line1;
    
    /**
      * $address_line2 
      * @var string
      */
    protected $address_line2;
    
    /**
      * $address_line3 
      * @var string
      */
    protected $address_line3;
    
    /**
      * $address_line4 
      * @var string
      */
    protected $address_line4;
    
    /**
      * $postal_code 
      * @var string
      */
    protected $postal_code;
    
    /**
      * $country_iso_code 
      * @var string
      */
    protected $country_iso_code;
    
    /**
      * $country_id 
      * @var int
      */
    protected $country_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->address_line1 = $data["address_line1"];
            $this->address_line2 = $data["address_line2"];
            $this->address_line3 = $data["address_line3"];
            $this->address_line4 = $data["address_line4"];
            $this->postal_code = $data["postal_code"];
            $this->country_iso_code = $data["country_iso_code"];
            $this->country_id = $data["country_id"];
        }
    }
    
    /**
     * Gets address_line1
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->address_line1;
    }
  
    /**
     * Sets address_line1
     * @param string $address_line1 
     * @return $this
     */
    public function setAddressLine1($address_line1)
    {
        
        $this->address_line1 = $address_line1;
        return $this;
    }
    
    /**
     * Gets address_line2
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->address_line2;
    }
  
    /**
     * Sets address_line2
     * @param string $address_line2 
     * @return $this
     */
    public function setAddressLine2($address_line2)
    {
        
        $this->address_line2 = $address_line2;
        return $this;
    }
    
    /**
     * Gets address_line3
     * @return string
     */
    public function getAddressLine3()
    {
        return $this->address_line3;
    }
  
    /**
     * Sets address_line3
     * @param string $address_line3 
     * @return $this
     */
    public function setAddressLine3($address_line3)
    {
        
        $this->address_line3 = $address_line3;
        return $this;
    }
    
    /**
     * Gets address_line4
     * @return string
     */
    public function getAddressLine4()
    {
        return $this->address_line4;
    }
  
    /**
     * Sets address_line4
     * @param string $address_line4 
     * @return $this
     */
    public function setAddressLine4($address_line4)
    {
        
        $this->address_line4 = $address_line4;
        return $this;
    }
    
    /**
     * Gets postal_code
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }
  
    /**
     * Sets postal_code
     * @param string $postal_code 
     * @return $this
     */
    public function setPostalCode($postal_code)
    {
        
        $this->postal_code = $postal_code;
        return $this;
    }
    
    /**
     * Gets country_iso_code
     * @return string
     */
    public function getCountryIsoCode()
    {
        return $this->country_iso_code;
    }
  
    /**
     * Sets country_iso_code
     * @param string $country_iso_code 
     * @return $this
     */
    public function setCountryIsoCode($country_iso_code)
    {
        
        $this->country_iso_code = $country_iso_code;
        return $this;
    }
    
    /**
     * Gets country_id
     * @return int
     */
    public function getCountryId()
    {
        return $this->country_id;
    }
  
    /**
     * Sets country_id
     * @param int $country_id 
     * @return $this
     */
    public function setCountryId($country_id)
    {
        
        $this->country_id = $country_id;
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
