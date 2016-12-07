<?php
/**
 * ContactSearchResponse
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
 * ContactSearchResponse Class Doc Comment
 *
 * @category    Class
 * @description
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ContactTagSearchResponse implements ArrayAccess
{
    /**
     * Array of property to type mappings. Used for (de)serialization
     * @var string[]
     */
    static $swaggerTypes = array(
        'pagination' => '\BrightpearlApiClient\Model\Pagination',
        'response' => '\BrightpearlApiClient\Model\ContactTag[]',
        'sorting' => '\BrightpearlApiClient\Model\Sort[]'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    static $attributeMap = array(
        'pagination' => 'pagination',
        'response' => 'response',
        'sorting' => 'sorting'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    static $setters = array(
        'pagination' => 'setPagination',
        'response' => 'setResponse',
        'sorting' => 'setSorting'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    static $getters = array(
        'pagination' => 'getPagination',
        'response' => 'getResponse',
        'sorting' => 'getSorting'
    );


    /**
     * $pagination
     * @var \BrightpearlApiClient\Model\Pagination
     */
    protected $pagination;

    /**
     * $response
     * @var \BrightpearlApiClient\Model\ContactTag[]
     */
    protected $response;

    /**
     * $sorting
     * @var \BrightpearlApiClient\Model\Sort[]
     */
    protected $sorting;


    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->pagination = $data["pagination"];
            $this->response = $data["response"];
            $this->sorting = $data["sorting"];
        }
    }

    /**
     * Gets pagination
     * @return \BrightpearlApiClient\Model\Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * Sets pagination
     * @param \BrightpearlApiClient\Model\Pagination $pagination
     * @return $this
     */
    public function setPagination($pagination)
    {

        $this->pagination = $pagination;
        return $this;
    }

    /**
     * Gets response
     * @return \BrightpearlApiClient\Model\ContactTag[]
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets response
     * @param \BrightpearlApiClient\Model\ContactTag[] $response
     * @return $this
     */
    public function setResponse($response)
    {

        $this->response = $response;
        return $this;
    }

    /**
     * Gets sorting
     * @return \BrightpearlApiClient\Model\Sort[]
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * Sets sorting
     * @param \BrightpearlApiClient\Model\Sort[] $sorting
     * @return $this
     */
    public function setSorting($sorting)
    {

        $this->sorting = $sorting;
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
