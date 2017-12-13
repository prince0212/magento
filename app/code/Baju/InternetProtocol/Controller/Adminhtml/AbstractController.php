<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\InternetProtocol\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Baju\InternetProtocol\Model\ResourceModel\IpRepository;
use Magento\Framework\Registry;

/**
 * Admin InetrnetProtocol abstract controller
 */
abstract class AbstractController extends Action
{
    /**
     * ACL resource
     *
     * @var string
     */
    const ADMIN_RESOURCE = 'Baju_InternetProtocol::internetprotocol';

    /**
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     *
     * @var \Baju\InternetProtocol\Model\ResourceModel\IpRepository
     */
    protected $ipRepository;

    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param ipRepository $ipRepository
     * @param Registry $registry
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        IpRepository $ipRepository,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->ipRepository = $ipRepository;
        $this->coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * Init layout, menu and breadcrumb
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Baju_InternetProtocol:internetprotocol');
        $resultPage->addBreadcrumb(__('Internet Protocol'), __('Internet Protocol'));
        $resultPage->addBreadcrumb(__('Internet Protocol'), __('Internet Protocol'));

        return $resultPage;
    }
}
