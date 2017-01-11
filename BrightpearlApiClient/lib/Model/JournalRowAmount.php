<?php

namespace BrightpearlApiClient\Model;

use \ArrayAccess;

/**
 * Class JournalRowAmount
 * @package BrightpearlApiClient\Model
 */
class JournalRowAmount implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'currency' => 'string',
        'value' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'currency' => 'currency',
        'value' => 'value'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'currency' => 'setCurrency',
        'value' => 'setValue'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'currency' => 'getCurrency',
        'value' => 'getValue'
    );
  
    
    /**
      * $currency 
      * @var string
      */
    protected $currency;
    
    /**
      * $value 
      * @var string
      */
    protected $value;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->currency = $data["currency"];
            $this->value = $data["value"];
        }
    }
    
    /**
     * Gets currency
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
  
    /**
     * Sets currency
     * @param string $currency 
     * @return $this
     */
    public function setCurrency($currency)
    {
        
        $this->currency = $currency;
        return $this;
    }
    
    /**
     * Gets value
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
  
    /**
     * Sets value
     * @param string $value 
     * @return $this
     */
    public function setValue($value)
    {
        
        $this->value = $value;
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
