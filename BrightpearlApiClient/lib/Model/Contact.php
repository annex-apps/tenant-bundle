<?php

namespace BrightpearlApiClient\Model;

use \ArrayAccess;

class Contact implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'contact_id' => 'int',
        'is_primary_contact' => 'bool',
        'salutation' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'post_address_ids' => '\BrightpearlApiClient\Model\ContactPostAddressIds',
        'postal_addresses' => '\BrightpearlApiClient\Model\PostalAddress[]',
        'communication' => '\BrightpearlApiClient\Model\ContactCommunication',
        'contact_status' => '\BrightpearlApiClient\Model\ContactContactStatus',
        'relationship_to_account' => '\BrightpearlApiClient\Model\ContactRelationshipToAccount',
        'marketing_details' => '\BrightpearlApiClient\Model\ContactMarketingDetails',
        'financial_details' => '\BrightpearlApiClient\Model\ContactFinancialDetails',
        'assignment' => '\BrightpearlApiClient\Model\ContactAssignment',
        'organisation' => '\BrightpearlApiClient\Model\ContactOrganisation',
        'trade_status' => 'string',
        'created_byid' => 'int',
        'created_on' => 'string',
        'updated_on' => 'string',
        'custom_fields' => '\BrightpearlApiClient\Model\CustomField',
        'contact_tags' => 'string',
        'aliases' => '\BrightpearlApiClient\Model\ContactAliases'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'contact_id' => 'contactId',
        'is_primary_contact' => 'isPrimaryContact',
        'salutation' => 'salutation',
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'post_address_ids' => 'postAddressIds',
        'postal_addresses' => 'postalAddresses',
        'communication' => 'communication',
        'contact_status' => 'contactStatus',
        'relationship_to_account' => 'relationshipToAccount',
        'marketing_details' => 'marketingDetails',
        'financial_details' => 'financialDetails',
        'assignment' => 'assignment',
        'organisation' => 'organisation',
        'trade_status' => 'tradeStatus',
        'created_byid' => 'createdByid',
        'created_on' => 'createdOn',
        'updated_on' => 'updatedOn',
        'custom_fields' => 'customFields',
        'contact_tags' => 'contactTags',
        'aliases' => 'aliases'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'contact_id' => 'setContactId',
        'is_primary_contact' => 'setIsPrimaryContact',
        'salutation' => 'setSalutation',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'post_address_ids' => 'setPostAddressIds',
        'postal_addresses' => 'setPostalAddresses',
        'communication' => 'setCommunication',
        'contact_status' => 'setContactStatus',
        'relationship_to_account' => 'setRelationshipToAccount',
        'marketing_details' => 'setMarketingDetails',
        'financial_details' => 'setFinancialDetails',
        'assignment' => 'setAssignment',
        'organisation' => 'setOrganisation',
        'trade_status' => 'setTradeStatus',
        'created_byid' => 'setCreatedByid',
        'created_on' => 'setCreatedOn',
        'updated_on' => 'setUpdatedOn',
        'custom_fields' => 'setCustomFields',
        'contact_tags' => 'setContactTags',
        'aliases' => 'setAliases'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'contact_id' => 'getContactId',
        'is_primary_contact' => 'getIsPrimaryContact',
        'salutation' => 'getSalutation',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'post_address_ids' => 'getPostAddressIds',
        'postal_addresses' => 'getPostalAddresses',
        'communication' => 'getCommunication',
        'contact_status' => 'getContactStatus',
        'relationship_to_account' => 'getRelationshipToAccount',
        'marketing_details' => 'getMarketingDetails',
        'financial_details' => 'getFinancialDetails',
        'assignment' => 'getAssignment',
        'organisation' => 'getOrganisation',
        'trade_status' => 'getTradeStatus',
        'created_byid' => 'getCreatedByid',
        'created_on' => 'getCreatedOn',
        'updated_on' => 'getUpdatedOn',
        'custom_fields' => 'getCustomFields',
        'contact_tags' => 'getContactTags',
        'aliases' => 'getAliases'
    );
  
    
    /**
      * $contact_id 
      * @var int
      */
    protected $contact_id;
    
    /**
      * $is_primary_contact 
      * @var bool
      */
    protected $is_primary_contact;
    
    /**
      * $salutation 
      * @var string
      */
    protected $salutation;
    
    /**
      * $first_name 
      * @var string
      */
    protected $first_name;
    
    /**
      * $last_name 
      * @var string
      */
    protected $last_name;
    
    /**
      * $post_address_ids 
      * @var \BrightpearlApiClient\Model\ContactPostAddressIds
      */
    protected $post_address_ids;
    
    /**
      * $postal_addresses 
      * @var \BrightpearlApiClient\Model\PostalAddress[]
      */
    protected $postal_addresses;
    
    /**
      * $communication 
      * @var \BrightpearlApiClient\Model\ContactCommunication
      */
    protected $communication;
    
    /**
      * $contact_status 
      * @var \BrightpearlApiClient\Model\ContactContactStatus
      */
    protected $contact_status;
    
    /**
      * $relationship_to_account 
      * @var \BrightpearlApiClient\Model\ContactRelationshipToAccount
      */
    protected $relationship_to_account;
    
    /**
      * $marketing_details 
      * @var \BrightpearlApiClient\Model\ContactMarketingDetails
      */
    protected $marketing_details;
    
    /**
      * $financial_details 
      * @var \BrightpearlApiClient\Model\ContactFinancialDetails
      */
    protected $financial_details;
    
    /**
      * $assignment 
      * @var \BrightpearlApiClient\Model\ContactAssignment
      */
    protected $assignment;
    
    /**
      * $organisation 
      * @var \BrightpearlApiClient\Model\ContactOrganisation
      */
    protected $organisation;
    
    /**
      * $trade_status 
      * @var string
      */
    protected $trade_status;
    
    /**
      * $created_byid 
      * @var int
      */
    protected $created_byid;
    
    /**
      * $created_on 
      * @var string
      */
    protected $created_on;
    
    /**
      * $updated_on 
      * @var string
      */
    protected $updated_on;
    
    /**
      * $custom_fields 
      * @var \BrightpearlApiClient\Model\CustomField
      */
    protected $custom_fields;
    
    /**
      * $contact_tags 
      * @var string
      */
    protected $contact_tags;
    
    /**
      * $aliases 
      * @var \BrightpearlApiClient\Model\ContactAliases
      */
    protected $aliases;


    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->contact_id = $data["contact_id"];
            $this->is_primary_contact = $data["is_primary_contact"];
            $this->salutation = $data["salutation"];
            $this->first_name = $data["first_name"];
            $this->last_name = $data["last_name"];
            $this->post_address_ids = $data["post_address_ids"];
            $this->postal_addresses = $data["postal_addresses"];
            $this->communication = $data["communication"];
            $this->contact_status = $data["contact_status"];
            $this->relationship_to_account = $data["relationship_to_account"];
            $this->marketing_details = $data["marketing_details"];
            $this->financial_details = $data["financial_details"];
            $this->assignment = $data["assignment"];
            $this->organisation = $data["organisation"];
            $this->trade_status = $data["trade_status"];
            $this->created_byid = $data["created_byid"];
            $this->created_on = $data["created_on"];
            $this->updated_on = $data["updated_on"];
            $this->custom_fields = $data["custom_fields"];
            $this->contact_tags = $data["contact_tags"];
            $this->aliases = $data["aliases"];
        }
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
     * Gets is_primary_contact
     * @return bool
     */
    public function getIsPrimaryContact()
    {
        return $this->is_primary_contact;
    }
  
    /**
     * Sets is_primary_contact
     * @param bool $is_primary_contact 
     * @return $this
     */
    public function setIsPrimaryContact($is_primary_contact)
    {
        
        $this->is_primary_contact = $is_primary_contact;
        return $this;
    }
    
    /**
     * Gets salutation
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }
  
    /**
     * Sets salutation
     * @param string $salutation 
     * @return $this
     */
    public function setSalutation($salutation)
    {
        
        $this->salutation = $salutation;
        return $this;
    }
    
    /**
     * Gets first_name
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }
  
    /**
     * Sets first_name
     * @param string $first_name 
     * @return $this
     */
    public function setFirstName($first_name)
    {
        
        $this->first_name = $first_name;
        return $this;
    }
    
    /**
     * Gets last_name
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }
  
    /**
     * Sets last_name
     * @param string $last_name 
     * @return $this
     */
    public function setLastName($last_name)
    {
        
        $this->last_name = $last_name;
        return $this;
    }
    
    /**
     * Gets post_address_ids
     * @return \BrightpearlApiClient\Model\ContactPostAddressIds
     */
    public function getPostAddressIds()
    {
        return $this->post_address_ids;
    }
  
    /**
     * Sets post_address_ids
     * @param \BrightpearlApiClient\Model\ContactPostAddressIds $post_address_ids
     * @return $this
     */
    public function setPostAddressIds($post_address_ids)
    {
        
        $this->post_address_ids = $post_address_ids;
        return $this;
    }
    
    /**
     * Gets postal_addresses
     * @return \BrightpearlApiClient\Model\PostalAddress[]
     */
    public function getPostalAddresses()
    {
        return $this->postal_addresses;
    }
  
    /**
     * Sets postal_addresses
     * @param \BrightpearlApiClient\Model\PostalAddress[] $postal_addresses
     * @return $this
     */
    public function setPostalAddresses($postal_addresses)
    {
        
        $this->postal_addresses = $postal_addresses;
        return $this;
    }
    
    /**
     * Gets communication
     * @return \BrightpearlApiClient\Model\ContactCommunication
     */
    public function getCommunication()
    {
        return $this->communication;
    }
  
    /**
     * Sets communication
     * @param \BrightpearlApiClient\Model\ContactCommunication $communication
     * @return $this
     */
    public function setCommunication($communication)
    {
        
        $this->communication = $communication;
        return $this;
    }
    
    /**
     * Gets contact_status
     * @return \BrightpearlApiClient\Model\ContactContactStatus
     */
    public function getContactStatus()
    {
        return $this->contact_status;
    }
  
    /**
     * Sets contact_status
     * @param \BrightpearlApiClient\Model\ContactContactStatus $contact_status
     * @return $this
     */
    public function setContactStatus($contact_status)
    {
        
        $this->contact_status = $contact_status;
        return $this;
    }
    
    /**
     * Gets relationship_to_account
     * @return \BrightpearlApiClient\Model\ContactRelationshipToAccount
     */
    public function getRelationshipToAccount()
    {
        return $this->relationship_to_account;
    }
  
    /**
     * Sets relationship_to_account
     * @param \BrightpearlApiClient\Model\ContactRelationshipToAccount $relationship_to_account
     * @return $this
     */
    public function setRelationshipToAccount($relationship_to_account)
    {
        
        $this->relationship_to_account = $relationship_to_account;
        return $this;
    }
    
    /**
     * Gets marketing_details
     * @return \BrightpearlApiClient\Model\ContactMarketingDetails
     */
    public function getMarketingDetails()
    {
        return $this->marketing_details;
    }
  
    /**
     * Sets marketing_details
     * @param \BrightpearlApiClient\Model\ContactMarketingDetails $marketing_details
     * @return $this
     */
    public function setMarketingDetails($marketing_details)
    {
        
        $this->marketing_details = $marketing_details;
        return $this;
    }
    
    /**
     * Gets financial_details
     * @return \BrightpearlApiClient\Model\ContactFinancialDetails
     */
    public function getFinancialDetails()
    {
        return $this->financial_details;
    }
  
    /**
     * Sets financial_details
     * @param \BrightpearlApiClient\Model\ContactFinancialDetails $financial_details
     * @return $this
     */
    public function setFinancialDetails($financial_details)
    {
        
        $this->financial_details = $financial_details;
        return $this;
    }
    
    /**
     * Gets assignment
     * @return \BrightpearlApiClient\Model\ContactAssignment
     */
    public function getAssignment()
    {
        return $this->assignment;
    }
  
    /**
     * Sets assignment
     * @param \BrightpearlApiClient\Model\ContactAssignment $assignment
     * @return $this
     */
    public function setAssignment($assignment)
    {
        
        $this->assignment = $assignment;
        return $this;
    }
    
    /**
     * Gets organisation
     * @return \BrightpearlApiClient\Model\ContactOrganisation
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }
  
    /**
     * Sets organisation
     * @param \BrightpearlApiClient\Model\ContactOrganisation $organisation
     * @return $this
     */
    public function setOrganisation($organisation)
    {
        
        $this->organisation = $organisation;
        return $this;
    }
    
    /**
     * Gets trade_status
     * @return string
     */
    public function getTradeStatus()
    {
        return $this->trade_status;
    }
  
    /**
     * Sets trade_status
     * @param string $trade_status 
     * @return $this
     */
    public function setTradeStatus($trade_status)
    {
        
        $this->trade_status = $trade_status;
        return $this;
    }
    
    /**
     * Gets created_byid
     * @return int
     */
    public function getCreatedByid()
    {
        return $this->created_byid;
    }
  
    /**
     * Sets created_byid
     * @param int $created_byid 
     * @return $this
     */
    public function setCreatedByid($created_byid)
    {
        
        $this->created_byid = $created_byid;
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
     * Gets updated_on
     * @return string
     */
    public function getUpdatedOn()
    {
        return $this->updated_on;
    }
  
    /**
     * Sets updated_on
     * @param string $updated_on 
     * @return $this
     */
    public function setUpdatedOn($updated_on)
    {
        
        $this->updated_on = $updated_on;
        return $this;
    }
    
    /**
     * Gets custom_fields
     * @return \BrightpearlApiClient\Model\CustomField
     */
    public function getCustomFields()
    {
        return $this->custom_fields;
    }
  
    /**
     * Sets custom_fields
     * @param \BrightpearlApiClient\Model\CustomField $custom_fields
     * @return $this
     */
    public function setCustomFields($custom_fields)
    {
        
        $this->custom_fields = $custom_fields;
        return $this;
    }
    
    /**
     * Gets contact_tags
     * @return string
     */
    public function getContactTags()
    {
        return $this->contact_tags;
    }
  
    /**
     * Sets contact_tags
     * @param string $contact_tags 
     * @return $this
     */
    public function setContactTags($contact_tags)
    {
        
        $this->contact_tags = $contact_tags;
        return $this;
    }
    
    /**
     * Gets aliases
     * @return \BrightpearlApiClient\Model\ContactAliases
     */
    public function getAliases()
    {
        return $this->aliases;
    }
  
    /**
     * Sets aliases
     * @param \BrightpearlApiClient\Model\ContactAliases $aliases
     * @return $this
     */
    public function setAliases($aliases)
    {
        
        $this->aliases = $aliases;
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
