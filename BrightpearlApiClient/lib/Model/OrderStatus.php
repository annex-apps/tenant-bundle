<?php
/**
 * OrderStatus
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
 * OrderStatus Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class OrderStatus implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'status_id' => 'int',
        'order_status_id' => 'int',
        'name' => 'string',
        'order_type_code' => 'string',
        'sort_order' => 'int',
        'disabled' => 'bool',
        'visible' => 'bool',
        'color' => 'string',
        'remind_after_days' => 'int',
        'alert_emails' => 'string[]',
        'email_content' => 'string',
        'batch_process' => 'bool'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'status_id' => 'statusId',
        'order_status_id' => 'orderStatusId',
        'name' => 'name',
        'order_type_code' => 'orderTypeCode',
        'sort_order' => 'sortOrder',
        'disabled' => 'disabled',
        'visible' => 'visible',
        'color' => 'color',
        'remind_after_days' => 'remindAfterDays',
        'alert_emails' => 'alertEmails',
        'email_content' => 'emailContent',
        'batch_process' => 'batchProcess'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'status_id' => 'setStatusId',
        'order_status_id' => 'setOrderStatusId',
        'name' => 'setName',
        'order_type_code' => 'setOrderTypeCode',
        'sort_order' => 'setSortOrder',
        'disabled' => 'setDisabled',
        'visible' => 'setVisible',
        'color' => 'setColor',
        'remind_after_days' => 'setRemindAfterDays',
        'alert_emails' => 'setAlertEmails',
        'email_content' => 'setEmailContent',
        'batch_process' => 'setBatchProcess'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'status_id' => 'getStatusId',
        'order_status_id' => 'getOrderStatusId',
        'name' => 'getName',
        'order_type_code' => 'getOrderTypeCode',
        'sort_order' => 'getSortOrder',
        'disabled' => 'getDisabled',
        'visible' => 'getVisible',
        'color' => 'getColor',
        'remind_after_days' => 'getRemindAfterDays',
        'alert_emails' => 'getAlertEmails',
        'email_content' => 'getEmailContent',
        'batch_process' => 'getBatchProcess'
    );
  
    
    /**
      * $status_id 
      * @var int
      */
    protected $status_id;
    
    /**
      * $order_status_id 
      * @var int
      */
    protected $order_status_id;
    
    /**
      * $name 
      * @var string
      */
    protected $name;
    
    /**
      * $order_type_code 
      * @var string
      */
    protected $order_type_code;
    
    /**
      * $sort_order 
      * @var int
      */
    protected $sort_order;
    
    /**
      * $disabled 
      * @var bool
      */
    protected $disabled;
    
    /**
      * $visible 
      * @var bool
      */
    protected $visible;
    
    /**
      * $color 
      * @var string
      */
    protected $color;
    
    /**
      * $remind_after_days 
      * @var int
      */
    protected $remind_after_days;
    
    /**
      * $alert_emails 
      * @var string[]
      */
    protected $alert_emails;
    
    /**
      * $email_content 
      * @var string
      */
    protected $email_content;
    
    /**
      * $batch_process 
      * @var bool
      */
    protected $batch_process;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->status_id = $data["status_id"];
            $this->order_status_id = $data["order_status_id"];
            $this->name = $data["name"];
            $this->order_type_code = $data["order_type_code"];
            $this->sort_order = $data["sort_order"];
            $this->disabled = $data["disabled"];
            $this->visible = $data["visible"];
            $this->color = $data["color"];
            $this->remind_after_days = $data["remind_after_days"];
            $this->alert_emails = $data["alert_emails"];
            $this->email_content = $data["email_content"];
            $this->batch_process = $data["batch_process"];
        }
    }
    
    /**
     * Gets status_id
     * @return int
     */
    public function getStatusId()
    {
        return $this->status_id;
    }
  
    /**
     * Sets status_id
     * @param int $status_id 
     * @return $this
     */
    public function setStatusId($status_id)
    {
        
        $this->status_id = $status_id;
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
     * Gets order_type_code
     * @return string
     */
    public function getOrderTypeCode()
    {
        return $this->order_type_code;
    }
  
    /**
     * Sets order_type_code
     * @param string $order_type_code 
     * @return $this
     */
    public function setOrderTypeCode($order_type_code)
    {
        $allowed_values = array("SO", "SC", "PO", "PC");
        if (!in_array($order_type_code, $allowed_values)) {
            throw new \InvalidArgumentException("Invalid value for 'order_type_code', must be one of 'SO', 'SC', 'PO', 'PC'");
        }
        $this->order_type_code = $order_type_code;
        return $this;
    }
    
    /**
     * Gets sort_order
     * @return int
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }
  
    /**
     * Sets sort_order
     * @param int $sort_order 
     * @return $this
     */
    public function setSortOrder($sort_order)
    {
        
        $this->sort_order = $sort_order;
        return $this;
    }
    
    /**
     * Gets disabled
     * @return bool
     */
    public function getDisabled()
    {
        return $this->disabled;
    }
  
    /**
     * Sets disabled
     * @param bool $disabled 
     * @return $this
     */
    public function setDisabled($disabled)
    {
        
        $this->disabled = $disabled;
        return $this;
    }
    
    /**
     * Gets visible
     * @return bool
     */
    public function getVisible()
    {
        return $this->visible;
    }
  
    /**
     * Sets visible
     * @param bool $visible 
     * @return $this
     */
    public function setVisible($visible)
    {
        
        $this->visible = $visible;
        return $this;
    }
    
    /**
     * Gets color
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
  
    /**
     * Sets color
     * @param string $color 
     * @return $this
     */
    public function setColor($color)
    {
        
        $this->color = $color;
        return $this;
    }
    
    /**
     * Gets remind_after_days
     * @return int
     */
    public function getRemindAfterDays()
    {
        return $this->remind_after_days;
    }
  
    /**
     * Sets remind_after_days
     * @param int $remind_after_days 
     * @return $this
     */
    public function setRemindAfterDays($remind_after_days)
    {
        
        $this->remind_after_days = $remind_after_days;
        return $this;
    }
    
    /**
     * Gets alert_emails
     * @return string[]
     */
    public function getAlertEmails()
    {
        return $this->alert_emails;
    }
  
    /**
     * Sets alert_emails
     * @param string[] $alert_emails 
     * @return $this
     */
    public function setAlertEmails($alert_emails)
    {
        
        $this->alert_emails = $alert_emails;
        return $this;
    }
    
    /**
     * Gets email_content
     * @return string
     */
    public function getEmailContent()
    {
        return $this->email_content;
    }
  
    /**
     * Sets email_content
     * @param string $email_content 
     * @return $this
     */
    public function setEmailContent($email_content)
    {
        
        $this->email_content = $email_content;
        return $this;
    }
    
    /**
     * Gets batch_process
     * @return bool
     */
    public function getBatchProcess()
    {
        return $this->batch_process;
    }
  
    /**
     * Sets batch_process
     * @param bool $batch_process 
     * @return $this
     */
    public function setBatchProcess($batch_process)
    {
        
        $this->batch_process = $batch_process;
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
