<?php

namespace Tinwork\Job\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface DepartmentSearchResultsInterface
 *
 * @package     Tinwork\Job\Api\Data
 * @copyright   Copyright (c) 2018 Slabprea
 */
interface DepartmentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get departments list.
     *
     * @return \Tinwork\Job\Api\Data\DepartmentInterface[]
     */
    public function getItems();

    /**
     * Set departments list.
     *
     * @param \Tinwork\Job\Api\Data\DepartmentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}