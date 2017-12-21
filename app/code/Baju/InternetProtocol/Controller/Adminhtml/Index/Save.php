<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\InternetProtocol\Controller\Adminhtml\Index;

use Baju\InternetProtocol\Controller\Adminhtml\AbstractController;

/**
 * Ip edit form save controller
 */
class Save extends AbstractController
{
    /**
     *
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     *
     * @var \Baju\InternetProtocol\Model\Data\IpFactory
     */
    protected $ipFactory;

    /**
     *
     * @var \Baju\InternetProtocol\Model\ResourceModel\IpRepository
     */
    protected $ipRepository;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param IpRepository $ipRepository
     * @param \Magento\Framework\Registry $registry
     * @param \Baju\InternetProtocol\Model\Data\IpFactory $ipFactory
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Baju\InternetProtocol\Model\ResourceModel\IpRepository $ipRepository,
        \Magento\Framework\Registry $registry,
        \Baju\InternetProtocol\Model\Data\IpFactory $ipFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
    ) {
        parent::__construct($context, $resultPageFactory, $ipRepository, $registry);
        $this->ipRepository = $ipRepository;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->ipFactory = $ipFactory;
    }
    /**
     * Executes the Ip edit form save action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
     
    public function execute()
    {
        $ipData = $this->getRequest()->getPostValue();

        $ip = $this->ipFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $ip,
            $ipData['internetprotocol'],
            '\Baju\InternetProtocol\Api\Data\IpInterface'
        );

        try {
            $this->ipRepository->save($ip);
            $this->messageManager->addSuccessMessage(__('You saved the Data'));
        } catch (\Magento\Framework\Exception\AlreadyExistsException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('internetprotocol/index/index');

        return $resultRedirect;
    }
}
