<?php

namespace BrightpearlApiClient\Model;

use \ArrayAccess;

/**
 * Class JournalRowAssignment
 * @package BrightpearlApiClient\Model
 */
class JournalRowAssignment implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'project_id' => 'int',
        'channel_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'project_id' => 'projectId',
        'channel_id' => 'channelId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'project_id' => 'setProjectId',
        'channel_id' => 'setChannelId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'project_id' => 'getProjectId',
        'channel_id' => 'getChannelId'
    );
  
    
    /**
      * $project_id 
      * @var int
      */
    protected $project_id;
    
    /**
      * $channel_id 
      * @var int
      */
    protected $channel_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->project_id = $data["project_id"];
            $this->channel_id = $data["channel_id"];
        }
    }
    
    /**
     * Gets project_id
     * @return int
     */
    public function getProjectId()
    {
        return $this->project_id;
    }
  
    /**
     * Sets project_id
     * @param int $project_id 
     * @return $this
     */
    public function setProjectId($project_id)
    {
        
        $this->project_id = $project_id;
        return $this;
    }
    
    /**
     * Gets channel_id
     * @return int
     */
    public function getChannelId()
    {
        return $this->channel_id;
    }
  
    /**
     * Sets channel_id
     * @param int $channel_id 
     * @return $this
     */
    public function setChannelId($channel_id)
    {
        
        $this->channel_id = $channel_id;
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
