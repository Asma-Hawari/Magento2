<?php

namespace Mastering\SampleModule\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for preorder Complete search results.
 * @api
 */
interface ItemSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get test Complete list.
     *
     * @return \Mastering\SampleModule\Api\Data\ItemInterface[]
     */
    public function getItems();

    /**
     * Set test Complete list.
     *
     * @param \Mastering\SampleModule\Api\Data\ItemInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}