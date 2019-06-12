<?php
/**
 * Created by PhpStorm.
 * User: asma
 * Date: 6/12/19
 * Time: 9:23 AM
 */

namespace Mastering\SampleModule\Model;

use Mastering\SampleModule\Api\ItemRepositoryInterface;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class ItemRepository implements ItemRepositoryInterface

{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }


    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }

}