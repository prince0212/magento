<?php
namespace Baju\InternetProtocol\Model\ResourceModel;

class Ip extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('internet_protocol', 'ip_id');
    }
}
?>