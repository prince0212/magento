<?php

namespace Baju\InternetProtocol\Model\ResourceModel\Ip;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Baju\InternetProtocol\Model\Ip', 'Baju\InternetProtocol\Model\ResourceModel\Ip');
    }

}
?>