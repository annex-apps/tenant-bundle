<?php

namespace BrightpearlApiClient\Model;

use \ArrayAccess;

/**
 * Class JournalRowAmount
 * @package BrightpearlApiClient\Model
 */
class JournalRow implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'nominal_code' => 'string',
        'change' => '\BrightpearlApiClient\Model\JournalRowAmount',
        'assignment' => '\BrightpearlApiClient\Model\JournalRowAssignment',
        'order_id' => 'int',
        'invoice_reference' => 'string',
        'tax_code' => 'string',
        'transaction_amount' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'nominal_code' => 'nominalCode',
        'change' => 'change',
        'assignment' => 'assignment',
        'order_id' => 'orderId',
        'invoice_reference' => 'invoiceReference',
        'tax_code' => 'taxCode',
        'transaction_amount' => 'transactionAmount'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'nominal_code' => 'setNominalCode',
        'change' => 'setChange',
        'assignment' => 'setAssignment',
        'order_id' => 'setOrderId',
        'invoice_reference' => 'setInvoiceReference',
        'tax_code' => 'setTaxCode',
        'transaction_amount' => 'setTransactionAmount'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'nominal_code' => 'getNominalCode',
        'change' => 'getChange',
        'assignment' => 'getAssignment',
        'order_id' => 'getOrderId',
        'invoice_reference' => 'getInvoiceReference',
        'tax_code' => 'getTaxCode',
        'transaction_amount' => 'getTransactionAmount'
    );
  
    
    /**
      * $nominal_code 
      * @var string
      */
    protected $nominal_code;
    
    /**
      * $change 
      * @var \BrightpearlApiClient\Model\JournalRowAmount
      */
    protected $change;
    
    /**
      * $assignment 
      * @var \BrightpearlApiClient\Model\JournalRowAssignment
      */
    protected $assignment;
    
    /**
      * $order_id 
      * @var int
      */
    protected $order_id;
    
    /**
      * $invoice_reference 
      * @var string
      */
    protected $invoice_reference;
    
    /**
      * $tax_code 
      * @var string
      */
    protected $tax_code;
    
    /**
      * $transaction_amount 
      * @var string
      */
    protected $transaction_amount;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->nominal_code = $data["nominal_code"];
            $this->change = $data["change"];
            $this->assignment = $data["assignment"];
            $this->order_id = $data["order_id"];
            $this->invoice_reference = $data["invoice_reference"];
            $this->tax_code = $data["tax_code"];
            $this->transaction_amount = $data["transaction_amount"];
        }
    }
    
    /**
     * Gets nominal_code
     * @return string
     */
    public function getNominalCode()
    {
        return $this->nominal_code;
    }
  
    /**
     * Sets nominal_code
     * @param string $nominal_code 
     * @return $this
     */
    public function setNominalCode($nominal_code)
    {
        
        $this->nominal_code = $nominal_code;
        return $this;
    }
    
    /**
     * Gets change
     * @return \BrightpearlApiClient\Model\JournalRowAmount
     */
    public function getChange()
    {
        return $this->change;
    }
  
    /**
     * Sets change
     * @param \BrightpearlApiClient\Model\JournalRowAmount $change
     * @return $this
     */
    public function setChange($change)
    {
        
        $this->change = $change;
        return $this;
    }
    
    /**
     * Gets assignment
     * @return \BrightpearlApiClient\Model\JournalRowAssignment
     */
    public function getAssignment()
    {
        return $this->assignment;
    }
  
    /**
     * Sets assignment
     * @param \BrightpearlApiClient\Model\JournalRowAssignment $assignment
     * @return $this
     */
    public function setAssignment($assignment)
    {
        
        $this->assignment = $assignment;
        return $this;
    }
    
    /**
     * Gets order_id
     * @return int
     */
    public function getOrderId()
    {
        return $this->order_id;
    }
  
    /**
     * Sets order_id
     * @param int $order_id 
     * @return $this
     */
    public function setOrderId($order_id)
    {
        
        $this->order_id = $order_id;
        return $this;
    }
    
    /**
     * Gets invoice_reference
     * @return string
     */
    public function getInvoiceReference()
    {
        return $this->invoice_reference;
    }
  
    /**
     * Sets invoice_reference
     * @param string $invoice_reference 
     * @return $this
     */
    public function setInvoiceReference($invoice_reference)
    {
        
        $this->invoice_reference = $invoice_reference;
        return $this;
    }
    
    /**
     * Gets tax_code
     * @return string
     */
    public function getTaxCode()
    {
        return $this->tax_code;
    }
  
    /**
     * Sets tax_code
     * @param string $tax_code 
     * @return $this
     */
    public function setTaxCode($tax_code)
    {
        
        $this->tax_code = $tax_code;
        return $this;
    }
    
    /**
     * Gets transaction_amount
     * @return string
     */
    public function getTransactionAmount()
    {
        return $this->transaction_amount;
    }
  
    /**
     * Sets transaction_amount
     * @param string $transaction_amount 
     * @return $this
     */
    public function setTransactionAmount($transaction_amount)
    {
        
        $this->transaction_amount = $transaction_amount;
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
