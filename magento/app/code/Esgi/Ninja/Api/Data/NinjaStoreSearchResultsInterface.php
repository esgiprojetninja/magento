<?php
namespace Esgi\Ninja\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for ninja ninjastore search results.
 * @api
 */
interface NinjaStoreSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get ninjastores list.
     *
     * @return \Esgi\Ninja\Api\Data\NinjaStoreInterface[]
     */
    public function getItems();

    /**
     * Set ninjastores list.
     *
     * @param \Esgi\Ninja\Api\Data\NinjaStoreInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
