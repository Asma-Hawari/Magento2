<?php

namespace Mastering\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends  AbstractModel {

    public function __construct()
    {
      $this->_init(\Mastering\SampleModule\Model\ResourceModel\Item::class);
    }

}