<?php

namespace BrightpearlApiClient\Model;

use \ArrayAccess;

/**
 * Class NominalCode
 * @package BrightpearlApiClient\Model
 */
class NominalCode implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'id' => 'int',
        'code' => 'string',
        'name' => 'string',
        'type' => '\BrightpearlApiClient\Model\NominalCodeType',
        'bank' => 'bool',
        'expense' => 'bool',
        'discount' => 'bool',
        'editable' => 'bool',
        'active' => 'bool',
        'tax_code' => 'int',
        'chart_map_code' => 'string',
        'reconcile' => 'bool',
        'currency_id' => 'int'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'id' => 'id',
        'code' => 'code',
        'name' => 'name',
        'type' => 'type',
        'bank' => 'bank',
        'expense' => 'expense',
        'discount' => 'discount',
        'editable' => 'editable',
        'active' => 'active',
        'tax_code' => 'taxCode',
        'chart_map_code' => 'chartMapCode',
        'reconcile' => 'reconcile',
        'currency_id' => 'currencyId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'id' => 'setId',
        'code' => 'setCode',
        'name' => 'setName',
        'type' => 'setType',
        'bank' => 'setBank',
        'expense' => 'setExpense',
        'discount' => 'setDiscount',
        'editable' => 'setEditable',
        'active' => 'setActive',
        'tax_code' => 'setTaxCode',
        'chart_map_code' => 'setChartMapCode',
        'reconcile' => 'setReconcile',
        'currency_id' => 'setCurrencyId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'id' => 'getId',
        'code' => 'getCode',
        'name' => 'getName',
        'type' => 'getType',
        'bank' => 'getBank',
        'expense' => 'getExpense',
        'discount' => 'getDiscount',
        'editable' => 'getEditable',
        'active' => 'getActive',
        'tax_code' => 'getTaxCode',
        'chart_map_code' => 'getChartMapCode',
        'reconcile' => 'getReconcile',
        'currency_id' => 'getCurrencyId'
    );
  
    
    /**
      * $id 
      * @var int
      */
    protected $id;
    
    /**
      * $code 
      * @var string
      */
    protected $code;
    
    /**
      * $name 
      * @var string
      */
    protected $name;
    
    /**
      * $type 
      * @var \BrightpearlApiClient\Model\NominalCodeType
      */
    protected $type;
    
    /**
      * $bank 
      * @var bool
      */
    protected $bank;
    
    /**
      * $expense 
      * @var bool
      */
    protected $expense;
    
    /**
      * $discount 
      * @var bool
      */
    protected $discount;
    
    /**
      * $editable 
      * @var bool
      */
    protected $editable;
    
    /**
      * $active 
      * @var bool
      */
    protected $active;
    
    /**
      * $tax_code 
      * @var int
      */
    protected $tax_code;
    
    /**
      * $chart_map_code 
      * @var string
      */
    protected $chart_map_code;
    
    /**
      * $reconcile 
      * @var bool
      */
    protected $reconcile;

    /**
     * @var int
     */
    protected $currency_id;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->id = $data["id"];
            $this->code = $data["code"];
            $this->name = $data["name"];
            $this->type = $data["type"];
            $this->bank = $data["bank"];
            $this->expense = $data["expense"];
            $this->discount = $data["discount"];
            $this->editable = $data["editable"];
            $this->active = $data["active"];
            $this->tax_code = $data["tax_code"];
            $this->chart_map_code = $data["chart_map_code"];
            $this->reconcile = $data["reconcile"];
            $this->currency_id = $data["currency_id"];
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
     * Gets code
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
  
    /**
     * Sets code
     * @param string $code 
     * @return $this
     */
    public function setCode($code)
    {
        
        $this->code = $code;
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
     * Gets type
     * @return \BrightpearlApiClient\Model\NominalCodeType
     */
    public function getType()
    {
        return $this->type;
    }
  
    /**
     * Sets type
     * @param \BrightpearlApiClient\Model\NominalCodeType $type
     * @return $this
     */
    public function setType($type)
    {
        
        $this->type = $type;
        return $this;
    }
    
    /**
     * Gets bank
     * @return bool
     */
    public function getBank()
    {
        return $this->bank;
    }
  
    /**
     * Sets bank
     * @param bool $bank 
     * @return $this
     */
    public function setBank($bank)
    {
        
        $this->bank = $bank;
        return $this;
    }
    
    /**
     * Gets expense
     * @return bool
     */
    public function getExpense()
    {
        return $this->expense;
    }
  
    /**
     * Sets expense
     * @param bool $expense 
     * @return $this
     */
    public function setExpense($expense)
    {
        
        $this->expense = $expense;
        return $this;
    }
    
    /**
     * Gets discount
     * @return bool
     */
    public function getDiscount()
    {
        return $this->discount;
    }
  
    /**
     * Sets discount
     * @param bool $discount 
     * @return $this
     */
    public function setDiscount($discount)
    {
        
        $this->discount = $discount;
        return $this;
    }
    
    /**
     * Gets editable
     * @return bool
     */
    public function getEditable()
    {
        return $this->editable;
    }
  
    /**
     * Sets editable
     * @param bool $editable 
     * @return $this
     */
    public function setEditable($editable)
    {
        
        $this->editable = $editable;
        return $this;
    }
    
    /**
     * Gets active
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }
  
    /**
     * Sets active
     * @param bool $active 
     * @return $this
     */
    public function setActive($active)
    {
        
        $this->active = $active;
        return $this;
    }
    
    /**
     * Gets tax_code
     * @return int
     */
    public function getTaxCode()
    {
        return $this->tax_code;
    }
  
    /**
     * Sets tax_code
     * @param int $tax_code 
     * @return $this
     */
    public function setTaxCode($tax_code)
    {
        
        $this->tax_code = $tax_code;
        return $this;
    }
    
    /**
     * Gets chart_map_code
     * @return string
     */
    public function getChartMapCode()
    {
        return $this->chart_map_code;
    }
  
    /**
     * Sets chart_map_code
     * @param string $chart_map_code 
     * @return $this
     */
    public function setChartMapCode($chart_map_code)
    {
        
        $this->chart_map_code = $chart_map_code;
        return $this;
    }
    
    /**
     * Gets reconcile
     * @return bool
     */
    public function getReconcile()
    {
        return $this->reconcile;
    }
  
    /**
     * Sets reconcile
     * @param bool $reconcile 
     * @return $this
     */
    public function setReconcile($reconcile)
    {
        
        $this->reconcile = $reconcile;
        return $this;
    }

    /**
     * Gets currency_id
     * @return int
     */
    public function getCurrencyId()
    {
        return $this->currency_id;
    }

    /**
     * Sets currency_id
     * @param int $currencyId
     * @return $this
     */
    public function setCurrencyId($currencyId)
    {

        $this->currency_id = $currencyId;
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
