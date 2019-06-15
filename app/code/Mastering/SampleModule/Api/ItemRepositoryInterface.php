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
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Create or update a data
     */

    public function save(\Mastering\SampleModule\Api\Data\ItemInterface $item);


    public function getById($itemId);

    /**
     * Delete item.
     */
    public function delete(\Mastering\SampleModule\Api\Data\ItemInterface $item);

    /**
     * Delete item by ID.
     */
    public function deleteById($itemId);
}