<?php

namespace Mastering\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

class Item extends  AbstractModel {

    //This eventprefix is used by abstract model to generate events

    protected  $_eventPrefix = 'mastering_sample_item';

    protected function _construct()
    {
        $this->_init('Mastering\SampleModule\Model\ResourceModel\Item');
    }

}