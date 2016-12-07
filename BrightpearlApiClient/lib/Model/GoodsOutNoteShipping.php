<?php

namespace BrightpearlApiClient\Model;

use \ArrayAccess;


class GoodsOutNoteShipping implements ArrayAccess
{
    /**
     * Array of property to type mappings. Used for (de)serialization
     * @var string[]
     */
    static $swaggerTypes = array(
        'reference' => 'string',
        'boxes' => 'int',
        'shipping_method_id' => 'int',
        'weight' => 'string'
    );

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    static $attributeMap = array(
        'reference' => 'reference',
        'boxes' => 'boxes',
        'shipping_method_id' => 'shippingMethodId',
        'weight' => 'weight'
    );

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    static $setters = array(
        'reference' => 'setReference',
        'boxes' => 'setBoxes',
        'shipping_method_id' => 'setShippingMethodId',
        'weight' => 'setWeight'
    );

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    static $getters = array(
        'reference' => 'getReference',
        'boxes' => 'getBoxes',
        'shipping_method_id' => 'getShippingMethodId',
        'weight' => 'getWeight'
    );

    protected $shipping_method_id;
    protected $boxes;
    protected $weight;
    protected $reference;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->shipping_method_id = $data["shipping_method_id"];
        }
    }

    public function getShippingMethodId()
    {
        return $this->shipping_method_id;
    }
    public function setShippingMethodId($shipping_method_id)
    {
        $this->shipping_method_id = $shipping_method_id;
        return $this;
    }

    public function getBoxes()
    {
        return $this->boxes;
    }
    public function setBoxes($boxes)
    {
        $this->boxes = $boxes;
        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    public function getReference()
    {
        return $this->reference;
    }
    public function setReference($ref)
    {
        $this->reference = $ref;
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
