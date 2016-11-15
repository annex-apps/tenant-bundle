<?php

namespace Annex\TenantBundle\Services\Brightpearl;

use Annex\TenantBundle\Entity\Tenant;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;

class Order
{

    /** @var Container  */
    private $container;

    /** @var Tenant */
    private $tenant;

    private $brightpearlAccountCode;
    private $brightpearlAccountVersion = '0';
    private $brightpearlDataCentre = 'none';

    private $apiClient;

    public $errors = [];

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * @param $orderId
     * @param $mode
     * @return array|bool
     */
    public function getOrderById($orderId, $mode)
    {
        if ($mode == 'test') {

            $order = [
                'id' => $orderId,
                'contactId' => 23,
                'status' => 'New order',
                'placed' => '2 June 2:45 PM',
                'reference' => '',
                'paid' => $this->getPaymentStatus("PAID"),
                'allocated' => $this->getAllocationStatus("APA"),
                'fulfilled' => $this->getFulfilledStatus("SOP"),
                'shipped' => $this->getShippedStatus("SPS"),
                'isDropShip' => false,
                'url' => $this->buildOrderUrl($orderId),
                'delivery' => [
                    'name' => 'John Doe',
                    'addressLine1' => 'Line 1',
                    'addressLine2' => 'Line 2',
                    'addressLine3' => 'Line 3',
                    'addressLine4' => 'Line 4',
                    'postalCode'   => 'Postcode',
                    'country'      => 'Country',
                    'telephone'    => 'Telephone',
                ],
                'rows' => [
                    [
                        'productId' => 1234,
                        'productName' => 'Item name',
                        'productSku' => 'Item SKU',
                        'options' => 'Small, Red',
                        'quantity' => 10,
                        'shipped' => 8,
                        'class' => 'red'
                    ],
                    [
                        'productId' => 1235,
                        'productName' => 'Item name 2',
                        'productSku' => 'Item SKU 2',
                        'options' => 'Long, Thin',
                        'quantity' => 2,
                        'shipped' => 2,
                        'class' => 'green'
                    ]
                ]
            ];

            return $order;

        } else if ($orderService = $this->getOrderService()) {

            // Get a single order
            if ($orderResponse = $orderService->getOrdersIDSet($this->brightpearlAccountCode, "{$orderId}")) {

                /** @var \Brightpearl\Client\Model\Order $order */
                $orders = $orderResponse->getResponse();

                if (isset($orders[0])) {

                    $order = $orders[0];

                    $productIds   = [];
                    $itemsShipped = [];
                    foreach ($order->getOrderRows() AS $rowId => $row) {
                        $itemsShipped[$row->getProductId()] = null;
                        if (!in_array($row->getProductId(), $productIds)) {
                            $productIds[] = $row->getProductId();
                        }
                    }

                    // get item information (eg options)
                    $productService = $this->getProductService();
                    asort($productIds);
                    $productsResponse = $productService->getProductIDSet($this->brightpearlAccountCode, implode(',', $productIds));

                    $optionIds      = [];
                    $optionValueIds = [];
                    foreach ($productsResponse->getResponse() AS $k => $product) {
                        /** @var \Brightpearl\Client\Model\Product $product */
                        if ($product->getVariations()) {
                            foreach ($product->getVariations() AS $variation) {
                                /** @var \Brightpearl\Client\Model\ProductVariations $variation */
                                $optionId = $variation->getOptionId();
                                $optionValueId = $variation->getOptionValueId();
                                if (!in_array($optionId, $optionIds)) {
                                    $optionIds[] = $optionId;
                                }
                                if (!in_array($optionValueId, $optionValueIds)) {
                                    $optionValueIds[] = $optionValueId;
                                }
                            }
                        }
                    }

                    // Now get the option value names
                    $optionValueNamesById = [];
                    if (count($optionValueIds) > 0) {
                        foreach ($optionValueIds AS $optionValueId) {
                            $columns = [];
                            $filters = ["optionValueId" => $optionValueId];
                            $options = $productService->getOptionValueSearch($this->brightpearlAccountCode, $columns, $filters);

                            $value = $options->getResponse()->getResults();

                            $id   = $value[0][2]->scalar;
                            $name = $value[0][3]->scalar;
                            $optionValueNamesById[$id] = $name;
                        }
                    }

                    // Get information about the products on this order
                    $productOptionMap = [];
                    $productNameMap = [];
                    foreach ($productsResponse->getResponse() AS $k => $product) {
                        /** @var \Brightpearl\Client\Model\Product $product */

                        $channelInfo = $product->getSalesChannels();
                        $productNameMap[$product->getId()] = $channelInfo[0]->getProductName();

                        if ($product->getVariations()) {
                            foreach ($product->getVariations() AS $variation) {
                                /** @var \Brightpearl\Client\Model\ProductVariations $variation */
                                $optionValueId = $variation->getOptionValueId();
                                $productOptionMap[$product->getId()][] = $optionValueNamesById[$optionValueId];
                            }
                        }
                    }

                    // get the goods out notes for this order to see which items have shipped
                    $warehouseService = $this->getWarehouseService();

                    $shipments = [];
                    $shipMethodIds = [];

                    try {

                        $goodsOutNoteGet = $warehouseService->getWarehouseGoodsOutNote($this->brightpearlAccountCode, $orderId, null);

                        if ($goodsOutNoteGet->getResponse()) {

                            foreach ($goodsOutNoteGet->getResponse() AS $k => $goodsOutNote) {
                                /** @var \Brightpearl\Client\Model\GoodsOutNote $goodsOutNote */

                                $goodsOutNoteRows = [];

                                // Determine the qty shipped
                                $rows = $goodsOutNote->getOrderRows();
                                $productId = 0;
                                foreach ($rows AS $r => $row) {
                                    $qty = 0;
                                    $productOptions = '';
                                    foreach ($row AS $l => $location) {
                                        $productId = (int)$location->productId;
                                        $itemsShipped[$productId] += (int)$location->quantity;
                                        $qty += (int)$location->quantity;

                                        if (isset($productOptionMap[$productId])) {
                                            $productOptions = implode(', ', $productOptionMap[$productId]);
                                        }
                                    }
                                    $goodsOutNoteRows[] = [
                                        'productName' => $productNameMap[$productId],
                                        'options' => $productOptions,
                                        'quantity' => $qty
                                    ];
                                }

                                $shipments[] = [
                                    'id'     => $goodsOutNote->getOrderId().'/'.$goodsOutNote->getSequence(),
                                    'url'    => '',
                                    'picked' => $this->formatDate($goodsOutNote->getStatus()->getPickedOn()),
                                    'packed' => $this->formatDate($goodsOutNote->getStatus()->getPackedOn()),
                                    'shipped' => $this->formatDate($goodsOutNote->getStatus()->getShippedOn()),
                                    'reference' => $goodsOutNote->getShipping()->getReference(),
                                    'shipMethodId' => $goodsOutNote->getShipping()->getShippingMethodId(),
                                    'rows' => $goodsOutNoteRows
                                ];

                                if ($goodsOutNote->getShipping()->getShippingMethodId() && !in_array($goodsOutNote->getShipping()->getShippingMethodId(), $shipMethodIds)) {
                                    $shipMethodIds[] = $goodsOutNote->getShipping()->getShippingMethodId();
                                }

                            }
                        }

                    } catch (\Exception $e) {
                        // 404 means no goods out notes found
                    }


                    // Now get drop ship notes
                    $dropShipNotes = [];
                    try {

                        $dropShipNoteGet = $warehouseService->getWarehouseDropShipNote($this->brightpearlAccountCode, $orderId, null);

                        if ($dropShipNoteGet->getResponse()) {

                            foreach ($dropShipNoteGet->getResponse() AS $k => $dropShipNote) {
                                /** @var \Brightpearl\Client\Model\DropShipNote $dropShipNote */

                                $dropShipNoteRows = [];

                                // Determine the qty shipped
                                $rows = $dropShipNote->getOrderRows();
                                $productId = 0;
                                foreach ($rows AS $r => $row) {
                                    $qty = 0;
                                    $productOptions = '';
                                    foreach ($row AS $l => $location) {
                                        $productId = (int)$location->productId;
                                        $itemsShipped[$productId] += (int)$location->quantity;
                                        $qty += (int)$location->quantity;
                                        if (isset($productOptionMap[$productId])) {
                                            $productOptions = implode(', ', $productOptionMap[$productId]);
                                        }
                                    }
                                    $dropShipNoteRows[] = [
                                        'productName' => $productNameMap[$productId],
                                        'options' => $productOptions,
                                        'quantity' => $qty
                                    ];
                                }

                                $dropShipRef = '';
                                $dropShipMethodId = '';
                                if ( $dropShipNote->getShipping() ) {
                                    $dropShipRef = $dropShipNote->getShipping()->getReference();
                                    $dropShipMethodId = $dropShipNote->getShipping()->getShippingMethodId();

                                    if ($dropShipNote->getShipping()->getShippingMethodId() && !in_array($dropShipNote->getShipping()->getShippingMethodId(), $shipMethodIds)) {
                                        $shipMethodIds[] = $dropShipNote->getShipping()->getShippingMethodId();
                                    }
                                }

                                $dropShipNotes[] = [
                                    'id'     => $dropShipNote->getPurchaseOrderId(),
                                    'url'    => $this->buildOrderUrl($dropShipNote->getPurchaseOrderId()),
                                    'picked' => '',
                                    'packed' => '',
                                    'shipped' => $this->formatDate($dropShipNote->getStatus()->getShippedOn()),
                                    'reference' => $dropShipRef,
                                    'shipMethodId' => $dropShipMethodId,
                                    'rows' => $dropShipNoteRows
                                ];

                            }
                        } else {
                            $this->errors[] = 'No drop ship notes response';
                        }

                    } catch (\Exception $e) {
                        // 404 means no drop ship notes found
                    }

                    // Now get the order notes
                    $notes = [];
                    try {
                        $notesResponse = $orderService->getOrderNote($this->brightpearlAccountCode, $orderId);
                        if ($notesResponse->getResponse()) {
                            foreach ($notesResponse->getResponse() AS $k => $orderNote) {
                                /** @var \Brightpearl\Client\Model\OrderNote $orderNote */
                                $notes[] = [
                                    'added_on'  => $this->formatDate($orderNote->getAddedOn()),
                                    'note_text' => strip_tags($orderNote->getText()),
                                    'isPublic'  => $orderNote->getIsPublic()
                                ];
                            }
                        }
                    } catch (\Exception $e) {
                        // 404 means no notes found
                    }

                    // Get the shipping method names found in the shipments or the drop ship notes
                    $shippingMethodMap = [];
                    if (count($shipMethodIds) > 0) {
                        asort($shipMethodIds);
                        $shipMethodResponse = $warehouseService->getWarehouseShippingMethods($this->brightpearlAccountCode, implode(',', $shipMethodIds));
                        foreach ($shipMethodResponse->getResponse() AS $shippingMethod) {
                            /** @var \Brightpearl\Client\Model\ShippingMethod $shippingMethod */
                            $id = $shippingMethod->getId();
                            $name = $shippingMethod->getName();
                            $shippingMethodMap[$id] = $name;
                        }
                    }

                    // Update the shipments
                    foreach ($shipments AS $key => $shipment) {
                        if ($shipMethodId = $shipment['shipMethodId']) {
                            $shipments[$key]['shipMethodName'] = $shippingMethodMap[$shipMethodId];
                        }
                    }

                    $rows = [];
                    $orderRows = $order->getOrderRows();
                    foreach ($orderRows AS $rowId => $row) {
                        /** @var \Brightpearl\Client\Model\OrderRow $row */

                        if ($row->getProductId() == 1000 || $row->getProductId() == 1001) {
                            $qtyShipped = '';
                        } elseif ($order->getShippingStatusCode() == "ASS") {
                            $qtyShipped = (int)$row->getQuantity()->getMagnitude();
                        } else {
                            $qtyShipped = (int)$itemsShipped[$row->getProductId()];
                        }

                        $productOptions = '';
                        if (isset($productOptionMap[$row->getProductId()])) {
                            $productOptions = implode(', ', $productOptionMap[$row->getProductId()]);
                        }

                        $class = 'red';
                        if ((int)$qtyShipped > 0 && $qtyShipped < (int)$row->getQuantity()->getMagnitude()) {
                            $class = 'orange';
                        } else if ((int)$qtyShipped == (int)$row->getQuantity()->getMagnitude()) {
                            $class = 'green';
                        }

                        $rows[] = [
                            'productId'   => $row->getProductId(),
                            'productName' => $row->getProductName(),
                            'productSku'  => $row->getProductSku(),
                            'options'     => $productOptions,
                            'quantity'    => (int)$row->getQuantity()->getMagnitude(),
                            'shipped'     => $qtyShipped,
                            'class'       => $class
                        ];
                    }

                    $order = [
                        'id' => $orderId,
                        'contactId' => $order->getParties()->getCustomer()->getContactId(),
                        'status' => $order->getOrderStatus()->getName(),
                        'statusColour' => $order->getOrderStatus()->getColor(),
                        'placed' => $this->formatDate($order->getCreatedOn()),
                        'reference' => $order->getReference(),
                        'paid' => $this->getPaymentStatus($order->getOrderPaymentStatus()),
                        'allocated' => $this->getAllocationStatus($order->getAllocationStatusCode()),
                        'fulfilled' => $this->getFulfilledStatus($order->getStockStatusCode()),
                        'shipped' => $this->getShippedStatus($order->getShippingStatusCode()),
                        'isDropShip' => $order->getIsDropship(),
                        'url' => $this->buildOrderUrl($orderId),
                        'delivery' => [
                            'name' => $order->getParties()->getDelivery()->getAddressFullName(),
                            'addressLine1' => $order->getParties()->getDelivery()->getAddressLine1(),
                            'addressLine2' => $order->getParties()->getDelivery()->getAddressLine2(),
                            'addressLine3' => $order->getParties()->getDelivery()->getAddressLine3(),
                            'addressLine4' => $order->getParties()->getDelivery()->getAddressLine4(),
                            'postalCode'   => $order->getParties()->getDelivery()->getPostalCode(),
                            'country'      => $order->getParties()->getDelivery()->getCountry(),
                            'telephone'    => $order->getParties()->getDelivery()->getTelephone(),
                        ],
                        'rows' => $rows,
                        'shipments' => $shipments,
                        'shipmentCount' => count($shipments),
                        'dropShipNotes' => $dropShipNotes,
                        'dropShipmentCount' => count($dropShipNotes),
                        'fulfilCount' => count($shipments) + count($dropShipNotes),
                        'notes' => $notes
                    ];

                    return $order;

                } else {

                    return false;

                }

            } else {

                return false;

            }

        } else {

            return false;

        }

    }

    /**
     * @param $contactId
     * @param $mode
     * @return array|bool
     */
    public function getOrdersByContactId($contactId, $mode)
    {
        if ($mode == 'test') {

            $orders = $this->getTestOrders($contactId);

            return $orders;

        } else if ($mode == 'none') {

            return [];

        } else if ($orderService = $this->getOrderService()) {

            try {
                $columns = ['orderId', 'orderStatusId', 'orderStockStatusId', 'orderPaymentStatusId', 'createdOn'];
                $filters = ['contactId' => $contactId];

                $bpResponse    = $orderService->getOrderSearch($this->brightpearlAccountCode, $columns, $filters);
                $results       = $bpResponse->getResponse()->getResults();

                if (count($results) > 0) {

                    // @todo this is NASTY but I had to hack the SearchResponseReference class to get it to work
                    $orderStatuses = [];
                    foreach ($bpResponse->getReference()->getOrderStatusNames() AS $id => $name) {
                        $orderStatuses[$id] = $name;
                    }
                    $orderPaymentStatuses = [];
                    foreach ($bpResponse->getReference()->getOrderPaymentStatusNames() AS $id => $name) {
                        $orderPaymentStatuses[$id] = $name;
                    }
                    $orderStockStatuses = [];
                    foreach ($bpResponse->getReference()->getOrderStockStatusNames() AS $id => $name) {
                        $orderStockStatuses[$id] = $name;
                    }

                    $orders = [];
                    foreach ($results AS $order) {

                        $orderId = $order[0]->scalar;
                        $orders[] = [
                            'id'        => $orderId,
                            'status'    => $orderStatuses[$order[1]->scalar],
                            'placed'    => $this->formatDate($order[4]->scalar),
                            'url'       => $this->buildOrderUrl($orderId),
                        ];

                    }

                    return $orders;

                } else {

                    // No orders, return empty
                    return [];

                }

            } catch (\Exception $e) {

                $this->errors[] = $e->getMessage();
                return false;

            }

        } else {

            // getOrderService() has logged errors
            return false;

        }
    }

    /**
     * @return array
     */
    private function getTestOrders($contactId)
    {
        $orders = [];

        $orders[] = [
            'id' => 123456,
            'contactId' => $contactId,
            'status' => 'New order',
            'placed' => $this->formatDate("2016-05-25T11:15:00.000+01:00"),
            'reference' => '',
            'paid' => $this->getPaymentStatus("PAID"),
            'allocated' => $this->getAllocationStatus("APA"),
            'fulfilled' => $this->getFulfilledStatus("SOP"),
            'shipped' => $this->getShippedStatus("SPS"),
            'isDropShip' => false
        ];

        $orders[] = [
            'id' => 335577,
            'contactId' => $contactId,
            'status' => 'On hold',
            'placed' => $this->formatDate("2016-05-25T11:15:00.000+01:00"),
            'reference' => '',
            'paid' => $this->getPaymentStatus("PARTIALLY_PAID"),
            'allocated' => $this->getAllocationStatus("APA"),
            'fulfilled' => $this->getFulfilledStatus("SOP"),
            'shipped' => $this->getShippedStatus("SPS"),
            'isDropShip' => true,
            'class' => 'bz-warning'
        ];

        return $orders;
    }

    /**
     * @param $orderId
     * @return string
     */
    private function buildOrderUrl($orderId)
    {
        $domain = '';
        switch ($this->brightpearlDataCentre) {
            case "ws-eu1":
                $domain = 'euw1.brightpearl.com';
                break;
            case "ws-use":
                $domain = 'use.brightpearl.com';
                break;
        }
        return 'https://'.$domain.'/'.$this->brightpearlAccountVersion.'/patt-op.php?scode=invoice&oID='.(int)$orderId;
    }

    /**
     * @param $date
     * @return string
     */
    private function formatDate($date)
    {
        if (!$date) {
            return '';
        }
        $myDate = new \DateTime($date);
        return $myDate->format("D j M Y g:i a");
    }

    /**
     * @param $status
     * @return string
     */
    private function getAllocationStatus($status)
    {
        switch ($status) {
            case "ANR":
                return 'N/A';
                break;
            case "ANA":
                return 'None';
                break;
            case "APA":
                return 'Part';
                break;
            case "AAA":
                return 'Yes';
                break;
            default:
                return 'n/a';
                break;
        }
    }

    /**
     * @param $status
     * @return string
     */
    private function getShippedStatus($status)
    {
        switch ($status) {
            case "NST":
                return 'N/A';
                break;
            case "SNS":
                return 'None';
                break;
            case "SPS":
                return 'Part';
                break;
            case "ASS":
                return 'Yes';
                break;
            default:
                return 'n/a';
                break;
        }
    }

    /**
     * @param $status
     * @return string
     */
    private function getFulfilledStatus($status)
    {
        switch ($status) {
            case "NON":
                return 'N/A';
                break;
            case "SON":
            case "SCN":
                return 'None';
                break;
            case "SOP":
            case "SCP":
                return 'Part';
                break;
            case "SOA":
            case "SCA":
                return 'Yes';
                break;
            default:
                return 'n/a';
                break;
        }
    }

    /**
     * @param $status
     * @return string
     */
    private function getPaymentStatus($status)
    {
        switch ($status) {
            case "NOT_APPLICABLE":
                return 'N/A';
                break;
            case "UNPAID":
                return 'No';
                break;
            case "PARTIALLY_PAID":
                return 'Part';
                break;
            case "PAID":
                return 'Yes';
                break;
            default:
                return 'n/a';
                break;
        }
    }

    /**
     * @return bool|\Brightpearl\Client\Api\OrderServiceApi
     */
    private function getBrightpearlClient()
    {
        $this->brightpearlAccountCode  = $this->tenant->getBrightpearlAccountCode();
        $this->brightpearlDataCentre   = $this->tenant->getBrightpearlDataCentre();
        $brightpearlAccountToken       = $this->tenant->getBrightpearlToken();

        if ($this->brightpearlAccountCode && $this->brightpearlDataCentre) {

            $config = new \Brightpearl\Client\Configuration();
            $config->setHost("https://{$this->brightpearlDataCentre}.brightpearl.com/public-api");
            $secretKey = $this->container->getParameter('brightpearl_secret');
            $token = base64_encode(hash_hmac('sha256', $brightpearlAccountToken, $secretKey, true));
            $config->addDefaultHeader("brightpearl-dev-ref", "christanner");
            $config->addDefaultHeader("brightpearl-app-ref", "brightzen");
            $config->addDefaultHeader("brightpearl-account-token", $token);
            $client = new \Brightpearl\Client\ApiClient($config);

            $integrationService = new \Brightpearl\Client\Api\IntegrationServiceApi($client);

            try {
                $config = $integrationService->getAccountConfiguration($this->brightpearlAccountCode);
                $this->brightpearlAccountVersion = $config->getResponse()->getConfiguration()->getAccountVersion();
//                die( print_r($config->getResponse()->getConfiguration()->getAccountVersion()) );
            } catch (\Exception $e) {
                $this->errors[] = $e->getMessage();
                return false;
            }

            $this->apiClient = $client;
            return true;

        } else {
            $this->errors[] = 'Missing Brightpearl connection information';
            return false;
        }
    }

    /**
     * @return \Brightpearl\Client\Api\OrderServiceApi
     */
    private function getOrderService()
    {
        if (!$this->apiClient) {
            $this->getBrightpearlClient();
        }
        return new \Brightpearl\Client\Api\OrderServiceApi($this->apiClient);
    }

    /**
     * @return \Brightpearl\Client\Api\WarehouseServiceApi
     */
    private function getWarehouseService()
    {
        if (!$this->apiClient) {
            $this->getBrightpearlClient();
        }
        return new \Brightpearl\Client\Api\WarehouseServiceApi($this->apiClient);
    }

    /**
     * @return \Brightpearl\Client\Api\ProductServiceApi
     */
    private function getProductService()
    {
        if (!$this->apiClient) {
            $this->getBrightpearlClient();
        }
        return new \Brightpearl\Client\Api\ProductServiceApi($this->apiClient);
    }
}