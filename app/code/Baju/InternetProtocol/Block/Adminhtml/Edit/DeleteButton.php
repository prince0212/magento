<?php
/**
 * Copyright © 2017 IP, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\InternetProtocol\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Baju\InternetProtocol\Controller\Adminhtml\Index\Edit as EditCont;
/**
 * Back button on the IP edit form.
 */
class DeleteButton implements ButtonProviderInterface
{
    /**
     * Url Builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * Registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     */
    public function __construct(
		\Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry
	)
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    /**
     * Button params that will be used while rendering
     *
     * @return array
     */
    public function getButtonData()
    {
        $ipId = $this->getIpId();
        $data = [];
        if ($ipId) {
            $data = [
				'label' => __('Delete'),
				'on_click' => sprintf("location.href = '%s';", $this->getDeleteUrl()),
				'class' => 'delete',
				'sort_order' => 10
			];
        }
		
		return $data;
    }

    /**
     * Generate url by route and parameters
     *
     * @param array $params
     * @return string
     */
    private function getDeleteUrl(array $params = [])
    {
        return $this->urlBuilder->getUrl('*/*/delete', ['ip_id'=>$this->getIpId()]);
    }

    /**
     * Return the Ip Id.
     *
     * @return int|null
     */
    public function getIpId()
    {
        return $this->registry->registry(EditCont::CURRENT_IP_ID);
    }	
}
