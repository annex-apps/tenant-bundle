<?php
/**
 * Address
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
 * Address Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Address implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'contact_id' => 'int',
        'address_full_name' => 'string',
        'company_name' => 'string',
        'address_line1' => 'string',
        'address_line2' => 'string',
        'address_line3' => 'string',
        'address_line4' => 'string',
        'postal_code' => 'string',
        'country' => 'string',
        'country_iso_code' => 'string',
        'country_iso_code3' => 'string',
        'telephone' => 'string',
        'mobile_telephone' => 'string',
        'email' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'contact_id' => 'contactId',
        'address_full_name' => 'addressFullName',
        'company_name' => 'companyName',
        'address_line1' => 'addressLine1',
        'address_line2' => 'addressLine2',
        'address_line3' => 'addressLine3',
        'address_line4' => 'addressLine4',
        'postal_code' => 'postalCode',
        'country' => 'country',
        'country_iso_code' => 'countryIsoCode',
        'country_iso_code3' => 'countryIsoCode3',
        'telephone' => 'telephone',
        'mobile_telephone' => 'mobileTelephone',
        'email' => 'email'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'contact_id' => 'setContactId',
        'address_full_name' => 'setAddressFullName',
        'company_name' => 'setCompanyName',
        'address_line1' => 'setAddressLine1',
        'address_line2' => 'setAddressLine2',
        'address_line3' => 'setAddressLine3',
        'address_line4' => 'setAddressLine4',
        'postal_code' => 'setPostalCode',
        'country' => 'setCountry',
        'country_iso_code' => 'setCountryIsoCode',
        'country_iso_code3' => 'setCountryIsoCode3',
        'telephone' => 'setTelephone',
        'mobile_telephone' => 'setMobileTelephone',
        'email' => 'setEmail'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'contact_id' => 'getContactId',
        'address_full_name' => 'getAddressFullName',
        'company_name' => 'getCompanyName',
        'address_line1' => 'getAddressLine1',
        'address_line2' => 'getAddressLine2',
        'address_line3' => 'getAddressLine3',
        'address_line4' => 'getAddressLine4',
        'postal_code' => 'getPostalCode',
        'country' => 'getCountry',
        'country_iso_code' => 'getCountryIsoCode',
        'country_iso_code3' => 'getCountryIsoCode3',
        'telephone' => 'getTelephone',
        'mobile_telephone' => 'getMobileTelephone',
        'email' => 'getEmail'
    );
  
    
    /**
      * $contact_id 
      * @var int
      */
    protected $contact_id;
    
    /**
      * $address_full_name 
      * @var string
      */
    protected $address_full_name;
    
    /**
      * $company_name 
      * @var string
      */
    protected $company_name;
    
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
      * $country 
      * @var string
      */
    protected $country;
    
    /**
      * $country_iso_code 
      * @var string
      */
    protected $country_iso_code;
    
    /**
      * $country_iso_code3 
      * @var string
      */
    protected $country_iso_code3;
    
    /**
      * $telephone 
      * @var string
      */
    protected $telephone;
    
    /**
      * $mobile_telephone 
      * @var string
      */
    protected $mobile_telephone;
    
    /**
      * $email 
      * @var string
      */
    protected $email;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->contact_id = $data["contact_id"];
            $this->address_full_name = $data["address_full_name"];
            $this->company_name = $data["company_name"];
            $this->address_line1 = $data["address_line1"];
            $this->address_line2 = $data["address_line2"];
            $this->address_line3 = $data["address_line3"];
            $this->address_line4 = $data["address_line4"];
            $this->postal_code = $data["postal_code"];
            $this->country = $data["country"];
            $this->country_iso_code = $data["country_iso_code"];
            $this->country_iso_code3 = $data["country_iso_code3"];
            $this->telephone = $data["telephone"];
            $this->mobile_telephone = $data["mobile_telephone"];
            $this->email = $data["email"];
        }
    }
    
    /**
     * Gets contact_id
     * @return int
     */
    public function getContactId()
    {
        return $this->contact_id;
    }
  
    /**
     * Sets contact_id
     * @param int $contact_id 
     * @return $this
     */
    public function setContactId($contact_id)
    {
        
        $this->contact_id = $contact_id;
        return $this;
    }
    
    /**
     * Gets address_full_name
     * @return string
     */
    public function getAddressFullName()
    {
        return $this->address_full_name;
    }
  
    /**
     * Sets address_full_name
     * @param string $address_full_name 
     * @return $this
     */
    public function setAddressFullName($address_full_name)
    {
        
        $this->address_full_name = $address_full_name;
        return $this;
    }
    
    /**
     * Gets company_name
     * @return string
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }
  
    /**
     * Sets company_name
     * @param string $company_name 
     * @return $this
     */
    public function setCompanyName($company_name)
    {
        
        $this->company_name = $company_name;
        return $this;
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
     * Gets country
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
  
    /**
     * Sets country
     * @param string $country 
     * @return $this
     */
    public function setCountry($country)
    {
        
        $this->country = $country;
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
     * Gets country_iso_code3
     * @return string
     */
    public function getCountryIsoCode3()
    {
        return $this->country_iso_code3;
    }
  
    /**
     * Sets country_iso_code3
     * @param string $country_iso_code3 
     * @return $this
     */
    public function setCountryIsoCode3($country_iso_code3)
    {
        
        $this->country_iso_code3 = $country_iso_code3;
        return $this;
    }
    
    /**
     * Gets telephone
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
  
    /**
     * Sets telephone
     * @param string $telephone 
     * @return $this
     */
    public function setTelephone($telephone)
    {
        
        $this->telephone = $telephone;
        return $this;
    }
    
    /**
     * Gets mobile_telephone
     * @return string
     */
    public function getMobileTelephone()
    {
        return $this->mobile_telephone;
    }
  
    /**
     * Sets mobile_telephone
     * @param string $mobile_telephone 
     * @return $this
     */
    public function setMobileTelephone($mobile_telephone)
    {
        
        $this->mobile_telephone = $mobile_telephone;
        return $this;
    }
    
    /**
     * Gets email
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
  
    /**
     * Sets email
     * @param string $email 
     * @return $this
     */
    public function setEmail($email)
    {
        
        $this->email = $email;
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
