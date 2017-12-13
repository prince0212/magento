<?php
namespace Baju\InternetProtocol\Controller\Adminhtml\Index;

use Baju\InternetProtocol\Controller\Adminhtml\AbstractController;

/**
 * Grid edit action controller.
 */
class Edit extends AbstractController
{
    
	
    /**
     * Registry key where current Ip ID is stored
     */
    const CURRENT_IP_ID = 'ip_id';
	
	/**
     * Execute the action that loads the edit form
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $ipId = (int) $this->getRequest()->getParam('ip_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            if (!$ipId) {
				$ip = [];
			}else{
				$ip = $this->ipRepository->getByIpId($ipId);
			}
            $this->coreRegistry->register('ip_data', $ip);
            $this->coreRegistry->register(self::CURRENT_IP_ID, $ipId);
            /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
			$resultPage = $this->_initAction();
            $resultPage->getConfig()
                ->getTitle()
                ->prepend(__('Edit InternetProtocol'));
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return $resultRedirect->setPath('*/*/');
        }

        return $resultPage;
    }
}
