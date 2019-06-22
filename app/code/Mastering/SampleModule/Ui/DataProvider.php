<?php
/**
 * Created by PhpStorm.
 * User: asma
 * Date: 6/17/19
 * Time: 12:37 PM
 */

namespace Mastering\SampleModule\Ui;


class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        $collectionFactory,
        array $meta = [],
        array $data = [])
    {

        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);

        $this->collection= $collectionFactory->create();
    }

    public function getData()
    {

        $result = [];
        foreach ($this->collection->getItems() as $item)
        {

            $result[$item->getId()]['general'] = $item->getData();
        }
        return $result;
    }

    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return null;
    }

}