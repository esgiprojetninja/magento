<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Esgi\Ninja\Model;

use Esgi\Ninja\Api\NinjaStoreRepositoryInterface;
use Esgi\Ninja\Api\Data;
use Esgi\Ninja\Model\ResourceModel\NinjaStore as ResourceNinjaStore;
use Esgi\Ninja\Model\ResourceModel\NinjaStore\CollectionFactory as NinjaStoreCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;

/**
 * Class BlockRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class NinjaStoreRepository implements NinjaStoreRepositoryInterface
{
    /**
     * @var ResourceNinjaStore
     */
    protected $resource;

    /**
     * @var NinjaStoreFactory
     */
    protected $ninjastoreFactory;

    /**
     * @var NinjaStoreCollectionFactory
     */
    protected $ninjastoreCollectionFactory;

    /**
     * @var Data\NinjaStoreSearchResultsInterface
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
     * @var \Esgi\Ninja\Api\Data\NinjaStoreInterfaceFactory
     */
    protected $dataNinjaStoreFactory;

    /**
     * @param ResourceNinjaStore $resource
     * @param NinjaStoreFactory $ninjastoreFactory
     * @param Data\NinjaStoreInterfaceFactory $dataNinjaStoreFactory
     * @param NinjaStoreCollectionFactory $ninjastoreCollectionFactory
     * @param Data\NinjaStoreSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     */
    public function __construct(
        ResourceNinjaStore $resource,
        NinjaStoreFactory $ninjastoreFactory,
        \Esgi\Ninja\Api\Data\NinjaStoreInterfaceFactory $dataNinjaStoreFactory,
        NinjaStoreCollectionFactory $ninjastoreCollectionFactory,
        Data\NinjaStoreSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor
    ) {
        $this->resource = $resource;
        $this->ninjastoreFactory = $ninjastoreFactory;
        $this->ninjastoreCollectionFactory = $ninjastoreCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataNinjaStoreFactory = $dataNinjaStoreFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
    }

    /**
     * Save NinjaStore data
     *
     * @param \Esgi\Ninja\Api\Data\NinjaStoreInterface $ninjastore
     * @return NinjaStore
     * @throws CouldNotSaveException
     */
    public function save(Data\NinjaStoreInterface $ninjastore)
    {
        try {
            $this->resource->save($ninjastore);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $ninjastore;
    }

    /**
     * Load NinjaStore data by given NinjaStore Identity
     *
     * @param string $ninjastoreId
     * @return NinjaStore
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($ninjastoreId)
    {
        $ninjastore = $this->ninjastoreFactory->create();
        $this->resource->load($ninjastore, $ninjastoreId);
        if (!$ninjastore->getId()) {
            throw new NoSuchEntityException(__('Ninja NinjaStore with id "%1" does not exist.', $ninjastore));
        }

        return $ninjastore;
    }

    /**
     * Load NinjaStore data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Esgi\Ninja\Api\Data\NinjaStoreSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var \Esgi\Ninja\Model\ResourceModel\NinjaStore\Collection $collection */
        $collection = $this->ninjastoreCollectionFactory->create();

        /** @var Data\NinjaStoreSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete NinjaStore
     *
     * @param \Esgi\Ninja\Api\Data\NinjaStoreInterface $ninjastore
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Data\NinjaStoreInterface $ninjastore)
    {
        try {
            $this->resource->delete($ninjastore);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Delete NinjaStore by given NinjaStore Identity
     *
     * @param string $ninjastoreId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($ninjastoreId)
    {
        return $this->delete($this->getById($ninjastoreId));
    }
}
