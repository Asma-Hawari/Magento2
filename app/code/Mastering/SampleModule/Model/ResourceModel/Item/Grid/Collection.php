<?php
/**
 * Created by PhpStorm.
 * User: asma
 * Date: 6/16/19
 * Time: 7:58 AM
 */

namespace Mastering\SampleModule\Model\ResourceModel\Item\Grid;

use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Psr\Log\LoggerInterface as Logger;

class Collection extends SearchResult
{

    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        $mainTable = 'mastering_sample_item',
        $resourceModel = 'Mastering\SampleModule\Model\ResourceModel\Item'
    )
    {
        parent::__construct(
            $entityFactory,
            $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel);
    }

}