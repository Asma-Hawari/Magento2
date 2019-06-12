<?php
/**
 * Created by PhpStorm.
 * User: asma
 * Date: 6/12/19
 * Time: 9:20 AM
 */

namespace Mastering\SampleModule\Api;

interface ItemRepositoryInterface{

    /**
     * @return \Mastering\SampleModule\Api\Data\ItemInterface[]
     */
    public function getList();
}