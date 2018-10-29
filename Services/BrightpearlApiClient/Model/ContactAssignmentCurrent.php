<?php
/**
 * ContactAssignmentCurrent
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
 * ContactAssignmentCurrent Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ContactAssignmentCurrent implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'staff_owner_contactid' => 'int',
        'account_reference' => 'string',
        'department_id' => 'int',
        'lead_source_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'staff_owner_contactid' => 'staffOwnerContactid',
        'account_reference' => 'accountReference',
        'department_id' => 'departmentId',
        'lead_source_id' => 'leadSourceId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'staff_owner_contactid' => 'setStaffOwnerContactid',
        'account_reference' => 'setAccountReference',
        'department_id' => 'setDepartmentId',
        'lead_source_id' => 'setLeadSourceId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'staff_owner_contactid' => 'getStaffOwnerContactid',
        'account_reference' => 'getAccountReference',
        'department_id' => 'getDepartmentId',
        'lead_source_id' => 'getLeadSourceId'
    );
  
    
    /**
      * $staff_owner_contactid 
      * @var int
      */
    protected $staff_owner_contactid;
    
    /**
      * $account_reference 
      * @var string
      */
    protected $account_reference;
    
    /**
      * $department_id 
      * @var int
      */
    protected $department_id;
    
    /**
      * $lead_source_id 
      * @var int
      */
    protected $lead_source_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->staff_owner_contactid = $data["staff_owner_contactid"];
            $this->account_reference = $data["account_reference"];
            $this->department_id = $data["department_id"];
            $this->lead_source_id = $data["lead_source_id"];
        }
    }
    
    /**
     * Gets staff_owner_contactid
     * @return int
     */
    public function getStaffOwnerContactid()
    {
        return $this->staff_owner_contactid;
    }
  
    /**
     * Sets staff_owner_contactid
     * @param int $staff_owner_contactid 
     * @return $this
     */
    public function setStaffOwnerContactid($staff_owner_contactid)
    {
        
        $this->staff_owner_contactid = $staff_owner_contactid;
        return $this;
    }
    
    /**
     * Gets account_reference
     * @return string
     */
    public function getAccountReference()
    {
        return $this->account_reference;
    }
  
    /**
     * Sets account_reference
     * @param string $account_reference 
     * @return $this
     */
    public function setAccountReference($account_reference)
    {
        
        $this->account_reference = $account_reference;
        return $this;
    }
    
    /**
     * Gets department_id
     * @return int
     */
    public function getDepartmentId()
    {
        return $this->department_id;
    }
  
    /**
     * Sets department_id
     * @param int $department_id 
     * @return $this
     */
    public function setDepartmentId($department_id)
    {
        
        $this->department_id = $department_id;
        return $this;
    }
    
    /**
     * Gets lead_source_id
     * @return int
     */
    public function getLeadSourceId()
    {
        return $this->lead_source_id;
    }
  
    /**
     * Sets lead_source_id
     * @param int $lead_source_id 
     * @return $this
     */
    public function setLeadSourceId($lead_source_id)
    {
        
        $this->lead_source_id = $lead_source_id;
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
