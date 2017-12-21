<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Baju\InternetProtocol\Ui\DataProvider;

use Baju\InternetProtocol\Model\ResourceModel\Ip\Collection;

/**
 * Data provider for the Ip edit form.
 */
class EditForm extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
    /**
     * EditForm constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param Collection $collection
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $collection,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collection;
        $this->_storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     *
     * {@inheritdoc}
     *
     */
    public function getData()
    {
        $result = [];

        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $data = $item->getData();
            $result[$item->getData('ip_id')] = array(
                'internetprotocol' => $data
            );
        }
        return $result;
    }
}
