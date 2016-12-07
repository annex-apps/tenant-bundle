<?php
///**
// * Goodsoutnote1
// *
// * PHP version 5
// *
// * @category Class
// * @package  BrightpearlApiClient
// * @author   http://github.com/swagger-api/swagger-codegen
// * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
// * @link     https://github.com/swagger-api/swagger-codegen
// */
///**
// *  Copyright 2016 SmartBear Software
// *
// *  Licensed under the Apache License, Version 2.0 (the "License");
// *  you may not use this file except in compliance with the License.
// *  You may obtain a copy of the License at
// *
// *      http://www.apache.org/licenses/LICENSE-2.0
// *
// *  Unless required by applicable law or agreed to in writing, software
// *  distributed under the License is distributed on an "AS IS" BASIS,
// *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// *  See the License for the specific language governing permissions and
// *  limitations under the License.
// */
///**
// * NOTE: This class is auto generated by the swagger code generator program.
// * https://github.com/swagger-api/swagger-codegen
// * Do not edit the class manually.
// */
//
//namespace BrightpearlApiClient\Model;
//
//use \ArrayAccess;
///**
// * Goodsoutnote1 Class Doc Comment
// *
// * @category    Class
// * @description
// * @package     BrightpearlApiClient
// * @author      http://github.com/swagger-api/swagger-codegen
// * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
// * @link        https://github.com/swagger-api/swagger-codegen
// */
//class Goodsoutnote1 implements ArrayAccess
//{
//    /**
//      * Array of property to type mappings. Used for (de)serialization
//      * @var string[]
//      */
//    static $swaggerTypes = array(
//        'events' => '\BrightpearlApiClient\Model\GoodsOutNoteEvent[]',
//        'priority' => 'bool',
//        'shipping_method_id' => 'int',
//        'label_uri' => 'string'
//    );
//
//    /**
//      * Array of attributes where the key is the local name, and the value is the original name
//      * @var string[]
//      */
//    static $attributeMap = array(
//        'events' => 'events',
//        'priority' => 'priority',
//        'shipping_method_id' => 'shippingMethodId',
//        'label_uri' => 'labelUri'
//    );
//
//    /**
//      * Array of attributes to setter functions (for deserialization of responses)
//      * @var string[]
//      */
//    static $setters = array(
//        'events' => 'setEvents',
//        'priority' => 'setPriority',
//        'shipping_method_id' => 'setShippingMethodId',
//        'label_uri' => 'setLabelUri'
//    );
//
//    /**
//      * Array of attributes to getter functions (for serialization of requests)
//      * @var string[]
//      */
//    static $getters = array(
//        'events' => 'getEvents',
//        'priority' => 'getPriority',
//        'shipping_method_id' => 'getShippingMethodId',
//        'label_uri' => 'getLabelUri'
//    );
//
//
//    /**
//      * $events
//      * @var \BrightpearlApiClient\Model\GoodsOutNoteEvent[]
//      */
//    protected $events;
//
//    /**
//      * $priority
//      * @var bool
//      */
//    protected $priority;
//
//    /**
//      * $shipping_method_id
//      * @var int
//      */
//    protected $shipping_method_id;
//
//    /**
//      * $label_uri
//      * @var string
//      */
//    protected $label_uri;
//
//
//    /**
//     * Constructor
//     * @param mixed[] $data Associated array of property value initalizing the model
//     */
//    public function __construct(array $data = null)
//    {
//        if ($data != null) {
//            $this->events = $data["events"];
//            $this->priority = $data["priority"];
//            $this->shipping_method_id = $data["shipping_method_id"];
//            $this->label_uri = $data["label_uri"];
//        }
//    }
//
//    /**
//     * Gets events
//     * @return \BrightpearlApiClient\Model\GoodsOutNoteEvent[]
//     */
//    public function getEvents()
//    {
//        return $this->events;
//    }
//
//    /**
//     * Sets events
//     * @param \BrightpearlApiClient\Model\GoodsOutNoteEvent[] $events
//     * @return $this
//     */
//    public function setEvents($events)
//    {
//
//        $this->events = $events;
//        return $this;
//    }
//
//    /**
//     * Gets priority
//     * @return bool
//     */
//    public function getPriority()
//    {
//        return $this->priority;
//    }
//
//    /**
//     * Sets priority
//     * @param bool $priority
//     * @return $this
//     */
//    public function setPriority($priority)
//    {
//
//        $this->priority = $priority;
//        return $this;
//    }
//
//    /**
//     * Gets shipping_method_id
//     * @return int
//     */
//    public function getShippingMethodId()
//    {
//        return $this->shipping_method_id;
//    }
//
//    /**
//     * Sets shipping_method_id
//     * @param int $shipping_method_id
//     * @return $this
//     */
//    public function setShippingMethodId($shipping_method_id)
//    {
//
//        $this->shipping_method_id = $shipping_method_id;
//        return $this;
//    }
//
//    /**
//     * Gets label_uri
//     * @return string
//     */
//    public function getLabelUri()
//    {
//        return $this->label_uri;
//    }
//
//    /**
//     * Sets label_uri
//     * @param string $label_uri
//     * @return $this
//     */
//    public function setLabelUri($label_uri)
//    {
//
//        $this->label_uri = $label_uri;
//        return $this;
//    }
//
//    /**
//     * Returns true if offset exists. False otherwise.
//     * @param  integer $offset Offset
//     * @return boolean
//     */
//    public function offsetExists($offset)
//    {
//        return isset($this->$offset);
//    }
//
//    /**
//     * Gets offset.
//     * @param  integer $offset Offset
//     * @return mixed
//     */
//    public function offsetGet($offset)
//    {
//        return $this->$offset;
//    }
//
//    /**
//     * Sets value based on offset.
//     * @param  integer $offset Offset
//     * @param  mixed   $value  Value to be set
//     * @return void
//     */
//    public function offsetSet($offset, $value)
//    {
//        $this->$offset = $value;
//    }
//
//    /**
//     * Unsets offset.
//     * @param  integer $offset Offset
//     * @return void
//     */
//    public function offsetUnset($offset)
//    {
//        unset($this->$offset);
//    }
//
//    /**
//     * Gets the string presentation of the object
//     * @return string
//     */
//    public function __toString()
//    {
//        if (defined('JSON_PRETTY_PRINT')) {
//            return json_encode(\BrightpearlApiClient\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
//        } else {
//            return json_encode(\BrightpearlApiClient\ObjectSerializer::sanitizeForSerialization($this));
//        }
//    }
//}
