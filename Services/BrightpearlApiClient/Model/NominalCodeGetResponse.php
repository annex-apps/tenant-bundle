<?php

namespace Annex\TenantBundle\Services\BrightpearlApiClient\Model;

use \ArrayAccess;

/**
 * Class NominalCodeGetResponse
 * @package BrightpearlApiClient\Model
 */
class NominalCodeGetResponse implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'response' => '\Annex\TenantBundle\Services\BrightpearlApiClient\Model\NominalCode[]'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'response' => 'response'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'response' => 'setResponse'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'response' => 'getResponse'
    );
  
    
    /**
      * $response 
      * @var \BrightpearlApiClient\Model\NominalCode[]
      */
    protected $response;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->response = $data["response"];
        }
    }
    
    /**
     * Gets response
     * @return \BrightpearlApiClient\Model\NominalCode[]
     */
    public function getResponse()
    {
        return $this->response;
    }
  
    /**
     * Sets response
     * @param \BrightpearlApiClient\Model\NominalCode[] $response
     * @return $this
     */
    public function setResponse($response)
    {
        
        $this->response = $response;
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
