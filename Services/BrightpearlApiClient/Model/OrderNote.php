<?php
/**
 * OrderNote
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
 * OrderNote Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class OrderNote implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'note_id' => 'int',
        'contact_id' => 'int',
        'text' => 'string',
        'is_public' => 'bool',
        'added_on' => 'string',
        'added_by' => 'int',
        'order_status_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'note_id' => 'noteId',
        'contact_id' => 'contactId',
        'text' => 'text',
        'is_public' => 'isPublic',
        'added_on' => 'addedOn',
        'added_by' => 'addedBy',
        'order_status_id' => 'orderStatusId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'note_id' => 'setNoteId',
        'contact_id' => 'setContactId',
        'text' => 'setText',
        'is_public' => 'setIsPublic',
        'added_on' => 'setAddedOn',
        'added_by' => 'setAddedBy',
        'order_status_id' => 'setOrderStatusId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'note_id' => 'getNoteId',
        'contact_id' => 'getContactId',
        'text' => 'getText',
        'is_public' => 'getIsPublic',
        'added_on' => 'getAddedOn',
        'added_by' => 'getAddedBy',
        'order_status_id' => 'getOrderStatusId'
    );
  
    
    /**
      * $note_id 
      * @var int
      */
    protected $note_id;
    
    /**
      * $contact_id 
      * @var int
      */
    protected $contact_id;
    
    /**
      * $text 
      * @var string
      */
    protected $text;
    
    /**
      * $is_public 
      * @var bool
      */
    protected $is_public;
    
    /**
      * $added_on 
      * @var string
      */
    protected $added_on;
    
    /**
      * $added_by 
      * @var int
      */
    protected $added_by;
    
    /**
      * $order_status_id 
      * @var int
      */
    protected $order_status_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->note_id = $data["note_id"];
            $this->contact_id = $data["contact_id"];
            $this->text = $data["text"];
            $this->is_public = $data["is_public"];
            $this->added_on = $data["added_on"];
            $this->added_by = $data["added_by"];
            $this->order_status_id = $data["order_status_id"];
        }
    }
    
    /**
     * Gets note_id
     * @return int
     */
    public function getNoteId()
    {
        return $this->note_id;
    }
  
    /**
     * Sets note_id
     * @param int $note_id 
     * @return $this
     */
    public function setNoteId($note_id)
    {
        
        $this->note_id = $note_id;
        return $this;
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
     * Gets text
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
  
    /**
     * Sets text
     * @param string $text 
     * @return $this
     */
    public function setText($text)
    {
        
        $this->text = $text;
        return $this;
    }
    
    /**
     * Gets is_public
     * @return bool
     */
    public function getIsPublic()
    {
        return $this->is_public;
    }
  
    /**
     * Sets is_public
     * @param bool $is_public 
     * @return $this
     */
    public function setIsPublic($is_public)
    {
        
        $this->is_public = $is_public;
        return $this;
    }
    
    /**
     * Gets added_on
     * @return string
     */
    public function getAddedOn()
    {
        return $this->added_on;
    }
  
    /**
     * Sets added_on
     * @param string $added_on 
     * @return $this
     */
    public function setAddedOn($added_on)
    {
        
        $this->added_on = $added_on;
        return $this;
    }
    
    /**
     * Gets added_by
     * @return int
     */
    public function getAddedBy()
    {
        return $this->added_by;
    }
  
    /**
     * Sets added_by
     * @param int $added_by 
     * @return $this
     */
    public function setAddedBy($added_by)
    {
        
        $this->added_by = $added_by;
        return $this;
    }
    
    /**
     * Gets order_status_id
     * @return int
     */
    public function getOrderStatusId()
    {
        return $this->order_status_id;
    }
  
    /**
     * Sets order_status_id
     * @param int $order_status_id 
     * @return $this
     */
    public function setOrderStatusId($order_status_id)
    {
        
        $this->order_status_id = $order_status_id;
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
