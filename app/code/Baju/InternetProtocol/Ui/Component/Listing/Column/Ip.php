<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Baju\InternetProtocol\Ui\Component\Listing\Column;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\Registry;

class Ip implements OptionSourceInterface
{
    /**
     * @var Registry
     */
    protected $coreRegistry;


    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry)
    {
        $this->coreRegistry = $registry;
    }
}
