<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\ResultFactory;
Use Magento\Framework\Debug;

class NewAction extends Action
{

    public function execute()
    {

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
