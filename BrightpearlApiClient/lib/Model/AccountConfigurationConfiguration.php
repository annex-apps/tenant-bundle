<?php
/**
 * AccountConfigurationConfiguration
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
 * AccountConfigurationConfiguration Class Doc Comment
 *
 * @category    Class
 * @description 
 * @package     BrightpearlApiClient
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class AccountConfigurationConfiguration implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'paypal_bank_account_code' => 'string',
        'auto_assign_order' => 'string',
        'charges_nominal_code' => 'string',
        'purchase_nominal_code' => 'string',
        'shipping_nominal_code' => 'string',
        'new_sales_credit_status_id' => 'string',
        'default_tax_rate_id' => 'string',
        'po_status_acknowledged' => 'string',
        'new_purchase_order_status_id' => 'string',
        'new_purchase_credit_status_id' => 'string',
        'account_version' => 'string',
        'tax_scheme_code' => 'string',
        'advanced_fulfilment_enabled' => 'string',
        'multiple_warehouse_enabled' => 'string',
        'discount_nominal_code' => 'string',
        'write_off_note_nominal_code' => 'string',
        'new_sales_order_status_id' => 'string',
        'product_weight_unit' => 'string',
        'cancelled_order_status_id' => 'string',
        'default_currency_id' => 'string',
        'product_length_unit' => 'string',
        'default_cost_price_list_id' => 'string',
        'invoiced_order_status_id' => 'string',
        'product_seasons_enabled' => 'string',
        'time_zone' => 'string',
        'rounding_corrections_nominal_code' => 'string',
        'current_season_id' => 'string',
        'cost_of_sales_enabled' => 'string',
        'default_product_type_id' => 'string',
        'base_currency_code' => 'string',
        'original_retail_price_list_id' => 'string',
        'sales_nominal_code' => 'string',
        'original_wholesale_price_list_id' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'paypal_bank_account_code' => 'paypalBankAccountCode',
        'auto_assign_order' => 'autoAssignOrder',
        'charges_nominal_code' => 'chargesNominalCode',
        'purchase_nominal_code' => 'purchaseNominalCode',
        'shipping_nominal_code' => 'shippingNominalCode',
        'new_sales_credit_status_id' => 'newSalesCreditStatusId',
        'default_tax_rate_id' => 'defaultTaxRateId',
        'po_status_acknowledged' => 'poStatusAcknowledged',
        'new_purchase_order_status_id' => 'newPurchaseOrderStatusId',
        'new_purchase_credit_status_id' => 'newPurchaseCreditStatusId',
        'account_version' => 'accountVersion',
        'tax_scheme_code' => 'taxSchemeCode',
        'advanced_fulfilment_enabled' => 'advancedFulfilmentEnabled',
        'multiple_warehouse_enabled' => 'multipleWarehouseEnabled',
        'discount_nominal_code' => 'discountNominalCode',
        'write_off_note_nominal_code' => 'writeOffNoteNominalCode',
        'new_sales_order_status_id' => 'newSalesOrderStatusId',
        'product_weight_unit' => 'productWeightUnit',
        'cancelled_order_status_id' => 'cancelledOrderStatusId',
        'default_currency_id' => 'defaultCurrencyId',
        'product_length_unit' => 'productLengthUnit',
        'default_cost_price_list_id' => 'defaultCostPriceListId',
        'invoiced_order_status_id' => 'invoicedOrderStatusId',
        'product_seasons_enabled' => 'productSeasonsEnabled',
        'time_zone' => 'timeZone',
        'rounding_corrections_nominal_code' => 'roundingCorrectionsNominalCode',
        'current_season_id' => 'currentSeasonId',
        'cost_of_sales_enabled' => 'costOfSalesEnabled',
        'default_product_type_id' => 'defaultProductTypeId',
        'base_currency_code' => 'baseCurrencyCode',
        'original_retail_price_list_id' => 'originalRetailPriceListId',
        'sales_nominal_code' => 'salesNominalCode',
        'original_wholesale_price_list_id' => 'originalWholesalePriceListId'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'paypal_bank_account_code' => 'setPaypalBankAccountCode',
        'auto_assign_order' => 'setAutoAssignOrder',
        'charges_nominal_code' => 'setChargesNominalCode',
        'purchase_nominal_code' => 'setPurchaseNominalCode',
        'shipping_nominal_code' => 'setShippingNominalCode',
        'new_sales_credit_status_id' => 'setNewSalesCreditStatusId',
        'default_tax_rate_id' => 'setDefaultTaxRateId',
        'po_status_acknowledged' => 'setPoStatusAcknowledged',
        'new_purchase_order_status_id' => 'setNewPurchaseOrderStatusId',
        'new_purchase_credit_status_id' => 'setNewPurchaseCreditStatusId',
        'account_version' => 'setAccountVersion',
        'tax_scheme_code' => 'setTaxSchemeCode',
        'advanced_fulfilment_enabled' => 'setAdvancedFulfilmentEnabled',
        'multiple_warehouse_enabled' => 'setMultipleWarehouseEnabled',
        'discount_nominal_code' => 'setDiscountNominalCode',
        'write_off_note_nominal_code' => 'setWriteOffNoteNominalCode',
        'new_sales_order_status_id' => 'setNewSalesOrderStatusId',
        'product_weight_unit' => 'setProductWeightUnit',
        'cancelled_order_status_id' => 'setCancelledOrderStatusId',
        'default_currency_id' => 'setDefaultCurrencyId',
        'product_length_unit' => 'setProductLengthUnit',
        'default_cost_price_list_id' => 'setDefaultCostPriceListId',
        'invoiced_order_status_id' => 'setInvoicedOrderStatusId',
        'product_seasons_enabled' => 'setProductSeasonsEnabled',
        'time_zone' => 'setTimeZone',
        'rounding_corrections_nominal_code' => 'setRoundingCorrectionsNominalCode',
        'current_season_id' => 'setCurrentSeasonId',
        'cost_of_sales_enabled' => 'setCostOfSalesEnabled',
        'default_product_type_id' => 'setDefaultProductTypeId',
        'base_currency_code' => 'setBaseCurrencyCode',
        'original_retail_price_list_id' => 'setOriginalRetailPriceListId',
        'sales_nominal_code' => 'setSalesNominalCode',
        'original_wholesale_price_list_id' => 'setOriginalWholesalePriceListId'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'paypal_bank_account_code' => 'getPaypalBankAccountCode',
        'auto_assign_order' => 'getAutoAssignOrder',
        'charges_nominal_code' => 'getChargesNominalCode',
        'purchase_nominal_code' => 'getPurchaseNominalCode',
        'shipping_nominal_code' => 'getShippingNominalCode',
        'new_sales_credit_status_id' => 'getNewSalesCreditStatusId',
        'default_tax_rate_id' => 'getDefaultTaxRateId',
        'po_status_acknowledged' => 'getPoStatusAcknowledged',
        'new_purchase_order_status_id' => 'getNewPurchaseOrderStatusId',
        'new_purchase_credit_status_id' => 'getNewPurchaseCreditStatusId',
        'account_version' => 'getAccountVersion',
        'tax_scheme_code' => 'getTaxSchemeCode',
        'advanced_fulfilment_enabled' => 'getAdvancedFulfilmentEnabled',
        'multiple_warehouse_enabled' => 'getMultipleWarehouseEnabled',
        'discount_nominal_code' => 'getDiscountNominalCode',
        'write_off_note_nominal_code' => 'getWriteOffNoteNominalCode',
        'new_sales_order_status_id' => 'getNewSalesOrderStatusId',
        'product_weight_unit' => 'getProductWeightUnit',
        'cancelled_order_status_id' => 'getCancelledOrderStatusId',
        'default_currency_id' => 'getDefaultCurrencyId',
        'product_length_unit' => 'getProductLengthUnit',
        'default_cost_price_list_id' => 'getDefaultCostPriceListId',
        'invoiced_order_status_id' => 'getInvoicedOrderStatusId',
        'product_seasons_enabled' => 'getProductSeasonsEnabled',
        'time_zone' => 'getTimeZone',
        'rounding_corrections_nominal_code' => 'getRoundingCorrectionsNominalCode',
        'current_season_id' => 'getCurrentSeasonId',
        'cost_of_sales_enabled' => 'getCostOfSalesEnabled',
        'default_product_type_id' => 'getDefaultProductTypeId',
        'base_currency_code' => 'getBaseCurrencyCode',
        'original_retail_price_list_id' => 'getOriginalRetailPriceListId',
        'sales_nominal_code' => 'getSalesNominalCode',
        'original_wholesale_price_list_id' => 'getOriginalWholesalePriceListId'
    );
  
    
    /**
      * $paypal_bank_account_code 
      * @var string
      */
    protected $paypal_bank_account_code;
    
    /**
      * $auto_assign_order 
      * @var string
      */
    protected $auto_assign_order;
    
    /**
      * $charges_nominal_code 
      * @var string
      */
    protected $charges_nominal_code;
    
    /**
      * $purchase_nominal_code 
      * @var string
      */
    protected $purchase_nominal_code;
    
    /**
      * $shipping_nominal_code 
      * @var string
      */
    protected $shipping_nominal_code;
    
    /**
      * $new_sales_credit_status_id 
      * @var string
      */
    protected $new_sales_credit_status_id;
    
    /**
      * $default_tax_rate_id 
      * @var string
      */
    protected $default_tax_rate_id;
    
    /**
      * $po_status_acknowledged 
      * @var string
      */
    protected $po_status_acknowledged;
    
    /**
      * $new_purchase_order_status_id 
      * @var string
      */
    protected $new_purchase_order_status_id;
    
    /**
      * $new_purchase_credit_status_id 
      * @var string
      */
    protected $new_purchase_credit_status_id;
    
    /**
      * $account_version 
      * @var string
      */
    protected $account_version;
    
    /**
      * $tax_scheme_code 
      * @var string
      */
    protected $tax_scheme_code;
    
    /**
      * $advanced_fulfilment_enabled 
      * @var string
      */
    protected $advanced_fulfilment_enabled;
    
    /**
      * $multiple_warehouse_enabled 
      * @var string
      */
    protected $multiple_warehouse_enabled;
    
    /**
      * $discount_nominal_code 
      * @var string
      */
    protected $discount_nominal_code;
    
    /**
      * $write_off_note_nominal_code 
      * @var string
      */
    protected $write_off_note_nominal_code;
    
    /**
      * $new_sales_order_status_id 
      * @var string
      */
    protected $new_sales_order_status_id;
    
    /**
      * $product_weight_unit 
      * @var string
      */
    protected $product_weight_unit;
    
    /**
      * $cancelled_order_status_id 
      * @var string
      */
    protected $cancelled_order_status_id;
    
    /**
      * $default_currency_id 
      * @var string
      */
    protected $default_currency_id;
    
    /**
      * $product_length_unit 
      * @var string
      */
    protected $product_length_unit;
    
    /**
      * $default_cost_price_list_id 
      * @var string
      */
    protected $default_cost_price_list_id;
    
    /**
      * $invoiced_order_status_id 
      * @var string
      */
    protected $invoiced_order_status_id;
    
    /**
      * $product_seasons_enabled 
      * @var string
      */
    protected $product_seasons_enabled;
    
    /**
      * $time_zone 
      * @var string
      */
    protected $time_zone;
    
    /**
      * $rounding_corrections_nominal_code 
      * @var string
      */
    protected $rounding_corrections_nominal_code;
    
    /**
      * $current_season_id 
      * @var string
      */
    protected $current_season_id;
    
    /**
      * $cost_of_sales_enabled 
      * @var string
      */
    protected $cost_of_sales_enabled;
    
    /**
      * $default_product_type_id 
      * @var string
      */
    protected $default_product_type_id;
    
    /**
      * $base_currency_code 
      * @var string
      */
    protected $base_currency_code;
    
    /**
      * $original_retail_price_list_id 
      * @var string
      */
    protected $original_retail_price_list_id;
    
    /**
      * $sales_nominal_code 
      * @var string
      */
    protected $sales_nominal_code;
    
    /**
      * $original_wholesale_price_list_id 
      * @var string
      */
    protected $original_wholesale_price_list_id;
    

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            $this->paypal_bank_account_code = $data["paypal_bank_account_code"];
            $this->auto_assign_order = $data["auto_assign_order"];
            $this->charges_nominal_code = $data["charges_nominal_code"];
            $this->purchase_nominal_code = $data["purchase_nominal_code"];
            $this->shipping_nominal_code = $data["shipping_nominal_code"];
            $this->new_sales_credit_status_id = $data["new_sales_credit_status_id"];
            $this->default_tax_rate_id = $data["default_tax_rate_id"];
            $this->po_status_acknowledged = $data["po_status_acknowledged"];
            $this->new_purchase_order_status_id = $data["new_purchase_order_status_id"];
            $this->new_purchase_credit_status_id = $data["new_purchase_credit_status_id"];
            $this->account_version = $data["account_version"];
            $this->tax_scheme_code = $data["tax_scheme_code"];
            $this->advanced_fulfilment_enabled = $data["advanced_fulfilment_enabled"];
            $this->multiple_warehouse_enabled = $data["multiple_warehouse_enabled"];
            $this->discount_nominal_code = $data["discount_nominal_code"];
            $this->write_off_note_nominal_code = $data["write_off_note_nominal_code"];
            $this->new_sales_order_status_id = $data["new_sales_order_status_id"];
            $this->product_weight_unit = $data["product_weight_unit"];
            $this->cancelled_order_status_id = $data["cancelled_order_status_id"];
            $this->default_currency_id = $data["default_currency_id"];
            $this->product_length_unit = $data["product_length_unit"];
            $this->default_cost_price_list_id = $data["default_cost_price_list_id"];
            $this->invoiced_order_status_id = $data["invoiced_order_status_id"];
            $this->product_seasons_enabled = $data["product_seasons_enabled"];
            $this->time_zone = $data["time_zone"];
            $this->rounding_corrections_nominal_code = $data["rounding_corrections_nominal_code"];
            $this->current_season_id = $data["current_season_id"];
            $this->cost_of_sales_enabled = $data["cost_of_sales_enabled"];
            $this->default_product_type_id = $data["default_product_type_id"];
            $this->base_currency_code = $data["base_currency_code"];
            $this->original_retail_price_list_id = $data["original_retail_price_list_id"];
            $this->sales_nominal_code = $data["sales_nominal_code"];
            $this->original_wholesale_price_list_id = $data["original_wholesale_price_list_id"];
        }
    }
    
    /**
     * Gets paypal_bank_account_code
     * @return string
     */
    public function getPaypalBankAccountCode()
    {
        return $this->paypal_bank_account_code;
    }
  
    /**
     * Sets paypal_bank_account_code
     * @param string $paypal_bank_account_code 
     * @return $this
     */
    public function setPaypalBankAccountCode($paypal_bank_account_code)
    {
        
        $this->paypal_bank_account_code = $paypal_bank_account_code;
        return $this;
    }
    
    /**
     * Gets auto_assign_order
     * @return string
     */
    public function getAutoAssignOrder()
    {
        return $this->auto_assign_order;
    }
  
    /**
     * Sets auto_assign_order
     * @param string $auto_assign_order 
     * @return $this
     */
    public function setAutoAssignOrder($auto_assign_order)
    {
        
        $this->auto_assign_order = $auto_assign_order;
        return $this;
    }
    
    /**
     * Gets charges_nominal_code
     * @return string
     */
    public function getChargesNominalCode()
    {
        return $this->charges_nominal_code;
    }
  
    /**
     * Sets charges_nominal_code
     * @param string $charges_nominal_code 
     * @return $this
     */
    public function setChargesNominalCode($charges_nominal_code)
    {
        
        $this->charges_nominal_code = $charges_nominal_code;
        return $this;
    }
    
    /**
     * Gets purchase_nominal_code
     * @return string
     */
    public function getPurchaseNominalCode()
    {
        return $this->purchase_nominal_code;
    }
  
    /**
     * Sets purchase_nominal_code
     * @param string $purchase_nominal_code 
     * @return $this
     */
    public function setPurchaseNominalCode($purchase_nominal_code)
    {
        
        $this->purchase_nominal_code = $purchase_nominal_code;
        return $this;
    }
    
    /**
     * Gets shipping_nominal_code
     * @return string
     */
    public function getShippingNominalCode()
    {
        return $this->shipping_nominal_code;
    }
  
    /**
     * Sets shipping_nominal_code
     * @param string $shipping_nominal_code 
     * @return $this
     */
    public function setShippingNominalCode($shipping_nominal_code)
    {
        
        $this->shipping_nominal_code = $shipping_nominal_code;
        return $this;
    }
    
    /**
     * Gets new_sales_credit_status_id
     * @return string
     */
    public function getNewSalesCreditStatusId()
    {
        return $this->new_sales_credit_status_id;
    }
  
    /**
     * Sets new_sales_credit_status_id
     * @param string $new_sales_credit_status_id 
     * @return $this
     */
    public function setNewSalesCreditStatusId($new_sales_credit_status_id)
    {
        
        $this->new_sales_credit_status_id = $new_sales_credit_status_id;
        return $this;
    }
    
    /**
     * Gets default_tax_rate_id
     * @return string
     */
    public function getDefaultTaxRateId()
    {
        return $this->default_tax_rate_id;
    }
  
    /**
     * Sets default_tax_rate_id
     * @param string $default_tax_rate_id 
     * @return $this
     */
    public function setDefaultTaxRateId($default_tax_rate_id)
    {
        
        $this->default_tax_rate_id = $default_tax_rate_id;
        return $this;
    }
    
    /**
     * Gets po_status_acknowledged
     * @return string
     */
    public function getPoStatusAcknowledged()
    {
        return $this->po_status_acknowledged;
    }
  
    /**
     * Sets po_status_acknowledged
     * @param string $po_status_acknowledged 
     * @return $this
     */
    public function setPoStatusAcknowledged($po_status_acknowledged)
    {
        
        $this->po_status_acknowledged = $po_status_acknowledged;
        return $this;
    }
    
    /**
     * Gets new_purchase_order_status_id
     * @return string
     */
    public function getNewPurchaseOrderStatusId()
    {
        return $this->new_purchase_order_status_id;
    }
  
    /**
     * Sets new_purchase_order_status_id
     * @param string $new_purchase_order_status_id 
     * @return $this
     */
    public function setNewPurchaseOrderStatusId($new_purchase_order_status_id)
    {
        
        $this->new_purchase_order_status_id = $new_purchase_order_status_id;
        return $this;
    }
    
    /**
     * Gets new_purchase_credit_status_id
     * @return string
     */
    public function getNewPurchaseCreditStatusId()
    {
        return $this->new_purchase_credit_status_id;
    }
  
    /**
     * Sets new_purchase_credit_status_id
     * @param string $new_purchase_credit_status_id 
     * @return $this
     */
    public function setNewPurchaseCreditStatusId($new_purchase_credit_status_id)
    {
        
        $this->new_purchase_credit_status_id = $new_purchase_credit_status_id;
        return $this;
    }
    
    /**
     * Gets account_version
     * @return string
     */
    public function getAccountVersion()
    {
        return $this->account_version;
    }
  
    /**
     * Sets account_version
     * @param string $account_version 
     * @return $this
     */
    public function setAccountVersion($account_version)
    {
        
        $this->account_version = $account_version;
        return $this;
    }
    
    /**
     * Gets tax_scheme_code
     * @return string
     */
    public function getTaxSchemeCode()
    {
        return $this->tax_scheme_code;
    }
  
    /**
     * Sets tax_scheme_code
     * @param string $tax_scheme_code 
     * @return $this
     */
    public function setTaxSchemeCode($tax_scheme_code)
    {
        
        $this->tax_scheme_code = $tax_scheme_code;
        return $this;
    }
    
    /**
     * Gets advanced_fulfilment_enabled
     * @return string
     */
    public function getAdvancedFulfilmentEnabled()
    {
        return $this->advanced_fulfilment_enabled;
    }
  
    /**
     * Sets advanced_fulfilment_enabled
     * @param string $advanced_fulfilment_enabled 
     * @return $this
     */
    public function setAdvancedFulfilmentEnabled($advanced_fulfilment_enabled)
    {
        
        $this->advanced_fulfilment_enabled = $advanced_fulfilment_enabled;
        return $this;
    }
    
    /**
     * Gets multiple_warehouse_enabled
     * @return string
     */
    public function getMultipleWarehouseEnabled()
    {
        return $this->multiple_warehouse_enabled;
    }
  
    /**
     * Sets multiple_warehouse_enabled
     * @param string $multiple_warehouse_enabled 
     * @return $this
     */
    public function setMultipleWarehouseEnabled($multiple_warehouse_enabled)
    {
        
        $this->multiple_warehouse_enabled = $multiple_warehouse_enabled;
        return $this;
    }
    
    /**
     * Gets discount_nominal_code
     * @return string
     */
    public function getDiscountNominalCode()
    {
        return $this->discount_nominal_code;
    }
  
    /**
     * Sets discount_nominal_code
     * @param string $discount_nominal_code 
     * @return $this
     */
    public function setDiscountNominalCode($discount_nominal_code)
    {
        
        $this->discount_nominal_code = $discount_nominal_code;
        return $this;
    }
    
    /**
     * Gets write_off_note_nominal_code
     * @return string
     */
    public function getWriteOffNoteNominalCode()
    {
        return $this->write_off_note_nominal_code;
    }
  
    /**
     * Sets write_off_note_nominal_code
     * @param string $write_off_note_nominal_code 
     * @return $this
     */
    public function setWriteOffNoteNominalCode($write_off_note_nominal_code)
    {
        
        $this->write_off_note_nominal_code = $write_off_note_nominal_code;
        return $this;
    }
    
    /**
     * Gets new_sales_order_status_id
     * @return string
     */
    public function getNewSalesOrderStatusId()
    {
        return $this->new_sales_order_status_id;
    }
  
    /**
     * Sets new_sales_order_status_id
     * @param string $new_sales_order_status_id 
     * @return $this
     */
    public function setNewSalesOrderStatusId($new_sales_order_status_id)
    {
        
        $this->new_sales_order_status_id = $new_sales_order_status_id;
        return $this;
    }
    
    /**
     * Gets product_weight_unit
     * @return string
     */
    public function getProductWeightUnit()
    {
        return $this->product_weight_unit;
    }
  
    /**
     * Sets product_weight_unit
     * @param string $product_weight_unit 
     * @return $this
     */
    public function setProductWeightUnit($product_weight_unit)
    {
        
        $this->product_weight_unit = $product_weight_unit;
        return $this;
    }
    
    /**
     * Gets cancelled_order_status_id
     * @return string
     */
    public function getCancelledOrderStatusId()
    {
        return $this->cancelled_order_status_id;
    }
  
    /**
     * Sets cancelled_order_status_id
     * @param string $cancelled_order_status_id 
     * @return $this
     */
    public function setCancelledOrderStatusId($cancelled_order_status_id)
    {
        
        $this->cancelled_order_status_id = $cancelled_order_status_id;
        return $this;
    }
    
    /**
     * Gets default_currency_id
     * @return string
     */
    public function getDefaultCurrencyId()
    {
        return $this->default_currency_id;
    }
  
    /**
     * Sets default_currency_id
     * @param string $default_currency_id 
     * @return $this
     */
    public function setDefaultCurrencyId($default_currency_id)
    {
        
        $this->default_currency_id = $default_currency_id;
        return $this;
    }
    
    /**
     * Gets product_length_unit
     * @return string
     */
    public function getProductLengthUnit()
    {
        return $this->product_length_unit;
    }
  
    /**
     * Sets product_length_unit
     * @param string $product_length_unit 
     * @return $this
     */
    public function setProductLengthUnit($product_length_unit)
    {
        
        $this->product_length_unit = $product_length_unit;
        return $this;
    }
    
    /**
     * Gets default_cost_price_list_id
     * @return string
     */
    public function getDefaultCostPriceListId()
    {
        return $this->default_cost_price_list_id;
    }
  
    /**
     * Sets default_cost_price_list_id
     * @param string $default_cost_price_list_id 
     * @return $this
     */
    public function setDefaultCostPriceListId($default_cost_price_list_id)
    {
        
        $this->default_cost_price_list_id = $default_cost_price_list_id;
        return $this;
    }
    
    /**
     * Gets invoiced_order_status_id
     * @return string
     */
    public function getInvoicedOrderStatusId()
    {
        return $this->invoiced_order_status_id;
    }
  
    /**
     * Sets invoiced_order_status_id
     * @param string $invoiced_order_status_id 
     * @return $this
     */
    public function setInvoicedOrderStatusId($invoiced_order_status_id)
    {
        
        $this->invoiced_order_status_id = $invoiced_order_status_id;
        return $this;
    }
    
    /**
     * Gets product_seasons_enabled
     * @return string
     */
    public function getProductSeasonsEnabled()
    {
        return $this->product_seasons_enabled;
    }
  
    /**
     * Sets product_seasons_enabled
     * @param string $product_seasons_enabled 
     * @return $this
     */
    public function setProductSeasonsEnabled($product_seasons_enabled)
    {
        
        $this->product_seasons_enabled = $product_seasons_enabled;
        return $this;
    }
    
    /**
     * Gets time_zone
     * @return string
     */
    public function getTimeZone()
    {
        return $this->time_zone;
    }
  
    /**
     * Sets time_zone
     * @param string $time_zone 
     * @return $this
     */
    public function setTimeZone($time_zone)
    {
        
        $this->time_zone = $time_zone;
        return $this;
    }
    
    /**
     * Gets rounding_corrections_nominal_code
     * @return string
     */
    public function getRoundingCorrectionsNominalCode()
    {
        return $this->rounding_corrections_nominal_code;
    }
  
    /**
     * Sets rounding_corrections_nominal_code
     * @param string $rounding_corrections_nominal_code 
     * @return $this
     */
    public function setRoundingCorrectionsNominalCode($rounding_corrections_nominal_code)
    {
        
        $this->rounding_corrections_nominal_code = $rounding_corrections_nominal_code;
        return $this;
    }
    
    /**
     * Gets current_season_id
     * @return string
     */
    public function getCurrentSeasonId()
    {
        return $this->current_season_id;
    }
  
    /**
     * Sets current_season_id
     * @param string $current_season_id 
     * @return $this
     */
    public function setCurrentSeasonId($current_season_id)
    {
        
        $this->current_season_id = $current_season_id;
        return $this;
    }
    
    /**
     * Gets cost_of_sales_enabled
     * @return string
     */
    public function getCostOfSalesEnabled()
    {
        return $this->cost_of_sales_enabled;
    }
  
    /**
     * Sets cost_of_sales_enabled
     * @param string $cost_of_sales_enabled 
     * @return $this
     */
    public function setCostOfSalesEnabled($cost_of_sales_enabled)
    {
        
        $this->cost_of_sales_enabled = $cost_of_sales_enabled;
        return $this;
    }
    
    /**
     * Gets default_product_type_id
     * @return string
     */
    public function getDefaultProductTypeId()
    {
        return $this->default_product_type_id;
    }
  
    /**
     * Sets default_product_type_id
     * @param string $default_product_type_id 
     * @return $this
     */
    public function setDefaultProductTypeId($default_product_type_id)
    {
        
        $this->default_product_type_id = $default_product_type_id;
        return $this;
    }
    
    /**
     * Gets base_currency_code
     * @return string
     */
    public function getBaseCurrencyCode()
    {
        return $this->base_currency_code;
    }
  
    /**
     * Sets base_currency_code
     * @param string $base_currency_code 
     * @return $this
     */
    public function setBaseCurrencyCode($base_currency_code)
    {
        
        $this->base_currency_code = $base_currency_code;
        return $this;
    }
    
    /**
     * Gets original_retail_price_list_id
     * @return string
     */
    public function getOriginalRetailPriceListId()
    {
        return $this->original_retail_price_list_id;
    }
  
    /**
     * Sets original_retail_price_list_id
     * @param string $original_retail_price_list_id 
     * @return $this
     */
    public function setOriginalRetailPriceListId($original_retail_price_list_id)
    {
        
        $this->original_retail_price_list_id = $original_retail_price_list_id;
        return $this;
    }
    
    /**
     * Gets sales_nominal_code
     * @return string
     */
    public function getSalesNominalCode()
    {
        return $this->sales_nominal_code;
    }
  
    /**
     * Sets sales_nominal_code
     * @param string $sales_nominal_code 
     * @return $this
     */
    public function setSalesNominalCode($sales_nominal_code)
    {
        
        $this->sales_nominal_code = $sales_nominal_code;
        return $this;
    }
    
    /**
     * Gets original_wholesale_price_list_id
     * @return string
     */
    public function getOriginalWholesalePriceListId()
    {
        return $this->original_wholesale_price_list_id;
    }
  
    /**
     * Sets original_wholesale_price_list_id
     * @param string $original_wholesale_price_list_id 
     * @return $this
     */
    public function setOriginalWholesalePriceListId($original_wholesale_price_list_id)
    {
        
        $this->original_wholesale_price_list_id = $original_wholesale_price_list_id;
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
