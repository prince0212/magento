<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Baju\InternetProtocol\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Baju Ip interface.
 * @api
 */
interface IpRepositoryInterface
{
    /**
     * Save Ip.
     *
     * @param \Baju\InternetProtocol\Api\Data\IpInterface $ip
     * @return \Baju\InternetProtocol\Api\Data\IpInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\IpInterface $ip);

    /**
     * Retrieve internetprotocol.
     *
     * @param int $ipId
     * @return \Baju\InternetProtocol\Api\Data\IpInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getByIpId($ipId);

    /**
     * Retrieve internetprotocol matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Baju\InternetProtocol\Api\Data\IpSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete ip by ID.
     *
     * @param int $ipId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ipId);
}