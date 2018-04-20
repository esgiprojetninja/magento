<?php
namespace Esgi\Ninja\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Esgi ninja CRUD interface.
 * @api
 */
interface NinjaStoreRepositoryInterface
{
    /**
     * Save block.
     *
     * @param \Esgi\Ninja\Api\Data\NinjaStoreInterface $ninjastore
     * @return \Esgi\Ninja\Api\Data\NinjaStoreInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\NinjaStoreInterface $ninjastore);

    /**
     * Retrieve $ninjastore.
     *
     * @param int $ninjastoreId
     * @return \Esgi\Ninja\Api\Data\NinjaStoreInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($ninjastoreId);

    /**
     * Retrieve ninjastores matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Esgi\Ninja\Api\Data\NinjaStoreSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete ninjastore.
     *
     * @param \Esgi\Ninja\Api\Data\NinjaStoreInterface $ninjastore
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\NinjaStoreInterface $ninjastore);

    /**
     * Delete ninjastore by ID.
     *
     * @param int $ninjastoreId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ninjastoreId);
}
