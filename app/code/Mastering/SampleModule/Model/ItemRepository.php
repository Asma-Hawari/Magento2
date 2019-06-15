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
use Mastering\SampleModule\Model\ResourceModel\Item as ResourceItem;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Reflection\DataObjectProcessor;

class ItemRepository implements ItemRepositoryInterface

{
    /**
     * @var ResourceBlock
     */
    protected $resource;

    /**
     * @var BlockFactory
     */
    protected $itemFactory;

    private $collectionFactory;


    /**
     * @var Data\BlockSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;


    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var \Mastering\SampleModule\Api\Data\TestInterfaceFactory
     */
    protected $dataitemFactory;


    public function __construct(
        ResourceItem $resource,
        ItemFactory $itemFactory,
        CollectionFactory $collectionFactory,
        \Mastering\SampleModule\Api\Data\ItemInterfaceFactory $dataitemFactory,
        \Mastering\SampleModule\Api\Data\ItemSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor
    )
    {
        $this->resource = $resource;
        $this->collectionFactory = $collectionFactory;
        $this->itemFactory = $itemFactory ;
        $this->dataitemFactory = $dataitemFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataObjectProcessor = $dataObjectProcessor;
    }

   /* public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }*/

    /**
     * Load Test data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Mastering\SampleModule\Model\ResourceModel\Item\Collection
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        $collection = $this->collectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'id') {
                    $collection->addFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }

        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /*add search crateria


    get list just description filtering*/


    /*command get list add argument for filtering /* method add filter */

    /**
     * Create or update a data
     */
    public function save(\Mastering\SampleModule\Api\Data\ItemInterface $item)
    {
        // TODO: Implement save() method.
    }

    public function getById($itemId)
    {
        // TODO: Implement getById() method.
    }

    /**
     * Delete item.
     */
    public function delete(\Mastering\SampleModule\Api\Data\ItemInterface $item)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Delete item by ID.
     */
    public function deleteById($itemId)
    {
        // TODO: Implement deleteById() method.
    }
}