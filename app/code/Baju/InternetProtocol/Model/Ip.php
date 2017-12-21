<?php
namespace Baju\InternetProtocol\Model;

use \Magento\Framework\Model\AbstractModel;

class Ip extends AbstractModel implements \Baju\InternetProtocol\Api\Data\IpInterface
{

	/**
     * Cache tag
     */
    const CACHE_TAG = 'internet_protocol';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Baju\InternetProtocol\Model\ResourceModel\Ip');
    }

    /**
     * Get Name
     *
     * @return string|null
     */
    public function getIpId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Get Name
     *
     * @return string|null
     */
    public function getIp()
    {
        return $this->getData(self::IP);
    }

    /**
     * Get Email
     *
     * @return string|null
     */
    public function getEmailId()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Id
     *
     * @param string $id
     * @return $this
     */
    public function setIpId($ipId)
    {
        return $this->setData(self::ID, $ipId);
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setIp($ip)
    {
        return $this->setData(self::IP, $ip);
    }

    /**
     * Set Content
     *
     * @param string $email
     * @return $this
     */
    public function setEmailId($email)
    {
        return $this->setData(self::EMAIL, $email);
    }
}
