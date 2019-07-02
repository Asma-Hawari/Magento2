<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\ResultFactory;
Use Magento\Framework\Debug;
use Mastering\SampleModule\Model\ItemFactory;

class Save extends Action
{
    protected $itemFactory;
    public function __construct(
        Action\Context $context ,
        ItemFactory $itemFactory)
    {


        $this->itemFactory = $itemFactory;

        parent::__construct($context);
    }

    public function execute()
    {

        $this->itemFactory->create()->setData($this->getRequest()->getPostValue()['general']);

        return $this->resultRedirectFactory->create()->setPath('mastering/index/index');

    }
}
