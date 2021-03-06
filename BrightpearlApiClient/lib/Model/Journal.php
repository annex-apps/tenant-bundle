<?php

namespace BrightpearlApiClient\Model;

use \ArrayAccess;

/**
 * Class Journal
 * @package BrightpearlApiClient\Model
 */
class Journal implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'id' => 'int',
        'contact_id' => 'int',
        'journal_type_code' => 'string',
        'tax_date' => 'string',
        'due_date' => 'string',
        'created_on' => 'string',
        'created_by_contact_id' => 'int',
        'tax_reconciliation' => '\BrightpearlApiClient\Model\JournalTaxReconciliation',
        'description' => 'string',
        'credits' => '\BrightpearlApiClient\Model\JournalRow[]',
        'debits'  => '\BrightpearlApiClient\Model\JournalRow[]',
        'currency_id' => 'int',
        'exchange_rate' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'id' => 'id',
        'contact_id' => 'contactId',
        'journal_type_code' => 'journalTypeCode',
        'tax_date' => 'taxDate',
        'due_date' => 'dueDate',
        'created_on' => 'createdOn',
        'created_by_contact_id' => 'createdByContactId',
        'tax_reconciliation' => 'taxReconciliation',
        'description' => 'description',
        'credits' => 'credits',
        'debits' => 'debits',
        'currency_id' => 'currencyId',
        'exchange_rate' => 'exchangeRate'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'id' => 'setId',
        'contact_id' => 'setContactId',
        'journal_type_code' => 'setJournalTypeCode',
        'tax_date' => 'setTaxDate',
        'due_date' => 'setDueDate',
        'created_on' => 'setCreatedOn',
        'created_by_contact_id' => 'setCreatedByContactId',
        'tax_reconciliation' => 'setTaxReconciliation',
        'description' => 'setDescription',
        'credits' => 'setCredits',
        'debits' => 'setDebits',
        'currency_id' => 'setCurrencyId',
        'exchange_rate' => 'setExchangeRate'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'id' => 'getId',
        'contact_id' => 'getContactId',
        'journal_type_code' => 'getJournalTypeCode',
        'tax_date' => 'getTaxDate',
        'due_date' => 'getDueDate',
        'created_on' => 'getCreatedOn',
        'created_by_contact_id' => 'getCreatedByContactId',
        'tax_reconciliation' => 'getTaxReconciliation',
        'description' => 'getDescription',
        'credits' => 'getCredits',
        'debits' => 'getDebits',
        'currency_id' => 'getCurrencyId',
        'exchange_rate' => 'getExchangeRate'
    );
  
    
    /**
      * $id 
      * @var int
      */
    protected $id;
    
    /**
      * $contact_id 
      * @var int
      */
    protected $contact_id;
    
    /**
      * $journal_type_code 
      * @var string
      */
    protected $journal_type_code;
    
    /**
      * $tax_date 
      * @var string
      */
    protected $tax_date;
    
    /**
      * $due_date 
      * @var string
      */
    protected $due_date;
    
    /**
      * $created_on 
      * @var string
      */
    protected $created_on;
    
    /**
      * $created_by_contact_id 
      * @var int
      */
    protected $created_by_contact_id;
    
    /**
      * $tax_reconciliation 
      * @var \BrightpearlApiClient\Model\JournalTaxReconciliation
      */
    protected $tax_reconciliation;
    
    /**
      * $description 
      * @var string
      */
    protected $description;
    
    /**
      * $credits 
      * @var \BrightpearlApiClient\Model\JournalRow[]
      */
    protected $credits;
    
    /**
      * $debits 
      * @var \BrightpearlApiClient\Model\JournalRow[]
      */
    protected $debits;
    
    /**
      * $currency_id 
      * @var int
      */
    protected $currency_id;
    
    /**
      * $exchange_rate 
      * @var string
      */
    protected $exchange_rate;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->id = $data["id"];
            $this->contact_id = $data["contact_id"];
            $this->journal_type_code = $data["journal_type_code"];
            $this->tax_date = $data["tax_date"];
            $this->due_date = $data["due_date"];
            $this->created_on = $data["created_on"];
            $this->created_by_contact_id = $data["created_by_contact_id"];
            $this->tax_reconciliation = $data["tax_reconciliation"];
            $this->description = $data["description"];
            $this->credits = $data["credits"];
            $this->debits = $data["debits"];
            $this->currency_id = $data["currency_id"];
            $this->exchange_rate = $data["exchange_rate"];
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
     * Gets contact_id
     * @return int
     */
    public function getContactId()
    {
        return $this->contact_id;
    }
  
    /**
     * Sets contact_id
     * @param int $contact_id 
     * @return $this
     */
    public function setContactId($contact_id)
    {
        
        $this->contact_id = $contact_id;
        return $this;
    }
    
    /**
     * Gets journal_type_code
     * @return string
     */
    public function getJournalTypeCode()
    {
        return $this->journal_type_code;
    }
  
    /**
     * Sets journal_type_code
     * @param string $journal_type_code 
     * @return $this
     */
    public function setJournalTypeCode($journal_type_code)
    {
        
        $this->journal_type_code = $journal_type_code;
        return $this;
    }
    
    /**
     * Gets tax_date
     * @return string
     */
    public function getTaxDate()
    {
        return $this->tax_date;
    }
  
    /**
     * Sets tax_date
     * @param string $tax_date 
     * @return $this
     */
    public function setTaxDate($tax_date)
    {
        
        $this->tax_date = $tax_date;
        return $this;
    }
    
    /**
     * Gets due_date
     * @return string
     */
    public function getDueDate()
    {
        return $this->due_date;
    }
  
    /**
     * Sets due_date
     * @param string $due_date 
     * @return $this
     */
    public function setDueDate($due_date)
    {
        
        $this->due_date = $due_date;
        return $this;
    }
    
    /**
     * Gets created_on
     * @return string
     */
    public function getCreatedOn()
    {
        return $this->created_on;
    }
  
    /**
     * Sets created_on
     * @param string $created_on 
     * @return $this
     */
    public function setCreatedOn($created_on)
    {
        $this->created_on = $created_on;
        return $this;
    }
    
    /**
     * Gets created_by_contact_id
     * @return int
     */
    public function getCreatedByContactId()
    {
        return $this->created_by_contact_id;
    }
  
    /**
     * Sets created_by_contact_id
     * @param int $created_by_contact_id 
     * @return $this
     */
    public function setCreatedByContactId($created_by_contact_id)
    {
        
        $this->created_by_contact_id = $created_by_contact_id;
        return $this;
    }
    
    /**
     * Gets tax_reconciliation
     * @return \BrightpearlApiClient\Model\JournalTaxReconciliation
     */
    public function getTaxReconciliation()
    {
        return $this->tax_reconciliation;
    }
  
    /**
     * Sets tax_reconciliation
     * @param \BrightpearlApiClient\Model\JournalTaxReconciliation $tax_reconciliation
     * @return $this
     */
    public function setTaxReconciliation($tax_reconciliation)
    {
        
        $this->tax_reconciliation = $tax_reconciliation;
        return $this;
    }
    
    /**
     * Gets description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
  
    /**
     * Sets description
     * @param string $description 
     * @return $this
     */
    public function setDescription($description)
    {
        
        $this->description = $description;
        return $this;
    }
    
    /**
     * Gets credits
     * @return \BrightpearlApiClient\Model\JournalRow[]
     */
    public function getCredits()
    {
        return $this->credits;
    }
  
    /**
     * Sets credits
     * @param \BrightpearlApiClient\Model\JournalRow[] $credits
     * @return $this
     */
    public function setCredits($credits)
    {
        
        $this->credits = $credits;
        return $this;
    }
    
    /**
     * Gets debits
     * @return \BrightpearlApiClient\Model\JournalRow[]
     */
    public function getDebits()
    {
        return $this->debits;
    }
  
    /**
     * Sets debits
     * @param \BrightpearlApiClient\Model\JournalRow[] $debits
     * @return $this
     */
    public function setDebits($debits)
    {
        
        $this->debits = $debits;
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
     * @param int $currency_id 
     * @return $this
     */
    public function setCurrencyId($currency_id)
    {
        
        $this->currency_id = $currency_id;
        return $this;
    }
    
    /**
     * Gets exchange_rate
     * @return string
     */
    public function getExchangeRate()
    {
        return $this->exchange_rate;
    }
  
    /**
     * Sets exchange_rate
     * @param string $exchange_rate 
     * @return $this
     */
    public function setExchangeRate($exchange_rate)
    {
        
        $this->exchange_rate = $exchange_rate;
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
