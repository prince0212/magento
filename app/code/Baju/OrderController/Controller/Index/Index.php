<?php

namespace Baju\OrderController\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    private $jsonFactory;

    /**
     * @var \Magento\Sales\Api\OrderRepositoryInterface
     */
    private $order;
    
    /**
     * construct
     *
     * @param \Magento\Framework\App\Action\Context
     * @param \Magento\Framework\Controller\Result\JsonFactory
     * @param \Magento\Sales\Api\OrderRepositoryInterface
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context, 
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRespository
    )
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->order = $orderRespository;
    }

    /**
     * execute
     * 
     * @return object
     */
    public function execute()
    {
        $jsonPage = $this->_jsonFactory->create();
        $orderId = $this->getRequest()->getParam('id');
        $data = "Order Controller";

        if(!$orderId){
            return $jsonPage->setData($data);
        }

        try {
            $orderData = $this->order->get($orderId);
            if($orderData->getIsCustomerGuest()){
                $data['total'] = $orderData->getGrandTotal();
                $data['status'] = $orderData->getStatus();
                foreach($orderData->getAllItems() as $items){
                    $data['item']['sku'] = $items->getSku();
                    $data['item']['item_id'] = $items->getItemId();
                    $data['item']['price'] = $items->getPrice();
                }
                $data['total_invoiced'] = $orderData->getTotalInvoiced();
            } else {
                $data = "Unfortunatily Order Id : ".$orderId." is not a guest User";
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage(), 1);
        }
        return $jsonPage->setData($data);
    }
}
