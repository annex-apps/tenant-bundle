<?php

namespace BrightpearlApiClient\Model;

use \ArrayAccess;

class Channel implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'id' => 'int',
        'name' => 'string',
        'channel_type_id' => 'int',
        'channel_brand_id' => 'int',
        'warehouse_ids' => 'int[]',
        'integration_detail' => '\BrightpearlApiClient\Model\IntegrationDetail'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'id' => 'id',
        'name' => 'name',
        'channel_type_id' => 'channelTypeId',
        'channel_brand_id' => 'channelBrandId',
        'warehouse_ids' => 'warehouseIds',
        'integration_detail' => 'integrationDetail'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'id' => 'setId',
        'name' => 'setName',
        'channel_type_id' => 'setChannelTypeId',
        'channel_brand_id' => 'setChannelBrandId',
        'warehouse_ids' => 'setWarehouseIds',
        'integration_detail' => 'setIntegrationDetail'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'id' => 'getId',
        'name' => 'getName',
        'channel_type_id' => 'getChannelTypeId',
        'channel_brand_id' => 'getChannelBrandId',
        'warehouse_ids' => 'getWarehouseIds',
        'integration_detail' => 'getIntegrationDetail'
    );
  
    
    /**
      * $id 
      * @var int
      */
    protected $id;
    
    /**
      * $name 
      * @var string
      */
    protected $name;
    
    /**
      * $channel_type_id 
      * @var int
      */
    protected $channel_type_id;
    
    /**
      * $channel_brand_id 
      * @var int
      */
    protected $channel_brand_id;
    
    /**
      * $warehouse_ids 
      * @var int[]
      */
    protected $warehouse_ids;
    
    /**
      * $integration_detail 
      * @var \BrightpearlApiClient\Model\IntegrationDetail
      */
    protected $integration_detail;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->id = $data["id"];
            $this->name = $data["name"];
            $this->channel_type_id = $data["channel_type_id"];
            $this->channel_brand_id = $data["channel_brand_id"];
            $this->warehouse_ids = $data["warehouse_ids"];
            $this->integration_detail = $data["integration_detail"];
        }
    }
    
    /**
     * Gets id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
  
    /**
     * Sets id
     * @param int $id 
     * @return $this
     */
    public function setId($id)
    {
        
        $this->id = $id;
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
     * Gets channel_type_id
     * @return int
     */
    public function getChannelTypeId()
    {
        return $this->channel_type_id;
    }
  
    /**
     * Sets channel_type_id
     * @param int $channel_type_id 
     * @return $this
     */
    public function setChannelTypeId($channel_type_id)
    {
        
        $this->channel_type_id = $channel_type_id;
        return $this;
    }
    
    /**
     * Gets channel_brand_id
     * @return int
     */
    public function getChannelBrandId()
    {
        return $this->channel_brand_id;
    }
  
    /**
     * Sets channel_brand_id
     * @param int $channel_brand_id 
     * @return $this
     */
    public function setChannelBrandId($channel_brand_id)
    {
        
        $this->channel_brand_id = $channel_brand_id;
        return $this;
    }
    
    /**
     * Gets warehouse_ids
     * @return int[]
     */
    public function getWarehouseIds()
    {
        return $this->warehouse_ids;
    }
  
    /**
     * Sets warehouse_ids
     * @param int[] $warehouse_ids 
     * @return $this
     */
    public function setWarehouseIds($warehouse_ids)
    {
        
        $this->warehouse_ids = $warehouse_ids;
        return $this;
    }
    
    /**
     * Gets integration_detail
     * @return \BrightpearlApiClient\Model\IntegrationDetail
     */
    public function getIntegrationDetail()
    {
        return $this->integration_detail;
    }
  
    /**
     * Sets integration_detail
     * @param \BrightpearlApiClient\Model\IntegrationDetail $integration_detail
     * @return $this
     */
    public function setIntegrationDetail($integration_detail)
    {
        
        $this->integration_detail = $integration_detail;
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
