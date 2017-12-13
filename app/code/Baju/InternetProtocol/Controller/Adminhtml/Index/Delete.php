<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Baju\InternetProtocol\Controller\Adminhtml\Index;

use Baju\InternetProtocol\Controller\Adminhtml\AbstractController;
use Baju\InternetProtocol\Model\ResourceModel\IpRepository;

/**
 * Ip Delete controller
 */
class Delete extends AbstractController
{
    /**
     * Delete Ip action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
       
       $ipId = (int) $this->getRequest()->getParam('ip_id');
        if ($ipId) {
            try {
                $this->ipRepository->deleteById($ipId);
                $this->messageManager->addSuccess(__('You deleted the data.'));
            } catch (\Exception $exception) {
                $this->messageManager->addError($exception->getMessage());
            }
        }
       
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */        
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('internetprotocol/index/index');

        return $resultRedirect;
    }
}
