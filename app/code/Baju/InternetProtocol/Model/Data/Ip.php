<?php
/**
 * Data Model implementing the Address interface
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Baju\InternetProtocol\Model\Data;

use \Magento\Framework\Model\AbstractModel;
/**
 * Class Address
 *
 */
class Ip extends AbstractModel  implements \Baju\InternetProtocol\Api\Data\IpInterface
{

    /**
     * @param \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory
     * @param AttributeValueFactory $attributeValueFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Initialize Ip resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Baju\InternetProtocol\Model\ResourceModel\Ip');
    }

    /**
     * Get id
     *
     * @return int|null
     */
    public function getIpId()
    {
        return $this->get(self::ID);
    }

    /**
     * Get region
     *
     * @return \Magento\Customer\Api\Data\RegionInterface|null
     */
    public function getIp()
    {
        return $this->get(self::IP);
    }

    /**
     * Get region ID
     *
     * @return int
     */
    public function getEmailId()
    {
        return $this->get(self::EMAIL);
    }

    /**
     * Set id
     *
     * @param int $id
     * @return $this
     */
    public function setIpId($id)
    {
        return $this->setData(self::ID, $id);
    }


    /**
     * Set customer IP
     *
     * @param int $ip
     * @return $this
     */
    public function setIp($ip)
    {
        return $this->setData(self::IP, $ip);
    }

    /**
     * Set region
     *
     * @param \Magento\Customer\Api\Data\RegionInterface $region
     * @return $this
     */
    public function setEmailId($email)
    {
        return $this->setData(self::EMAIL, $email);
    }
}
