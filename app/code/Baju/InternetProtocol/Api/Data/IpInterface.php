<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Baju\InternetProtocol\Api\Data;

/**
 * Retailer interface.
 * @api
 */
interface IpInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID 	= 'ip_id';
    const IP 	= 'ip';
    const EMAIL = 'email_id';

    /**
     * Get id
     *
     * @return int|null
     */
    public function getIpId();

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIp();

    /**
     * Get title
     *
     * @return string
     */
    public function getEmailId();

    /**
     * Set id
     *
     * @param int $id
     * @return int
     */
    public function setIpId($id);

    /**
     * Set name
     *
     * @param int $ip
     * @return int
     */
    public function setIp($ip);

    /**
     * Set country_id
     *
     * @param string $title
     * @return string
     */
    public function setEmailId($email);
}
