<?php
/**
 * Copyright © 2017 Baju, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Baju\InternetProtocol\Controller\Adminhtml\Index;

use Baju\InternetProtocol\Controller\Adminhtml\AbstractController;

class NewAction extends AbstractController
{
   public function execute()
    {
        $this->_forward('edit');
    }
}
