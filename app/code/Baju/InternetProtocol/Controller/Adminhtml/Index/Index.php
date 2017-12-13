<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\InternetProtocol\Controller\Adminhtml\Index;

use Baju\InternetProtocol\Controller\Adminhtml\AbstractController;

/**
 * Admin menu index controller
 */
class Index extends AbstractController
{
    /**
     * IP grid
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()
            ->getTitle()
            ->prepend(__('Internet Protocol'));

        return $resultPage;
    }
}
