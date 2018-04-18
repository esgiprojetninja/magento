<?php

namespace Tinwork\Job\Model;

use Tinwork\Job\Api\DepartmentRepositoryInterface;
use Tinwork\Job\Api\Data;
use Tinwork\Job\Model\ResourceModel\Department as ResourceDepartment;
use Tinwork\Job\Model\ResourceModel\Department\CollectionFactory as DepartmentCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;

/**
 * Class DepartmentRepository
 *
 * @package     Tinwork\Job\Model
 * @copyright   Copyright (c) 2018 Slabprea
 */
class DepartmentRepository implements DepartmentRepositoryInterface
{
    /**
     * @var ResourceDepartment
     */
    protected $resource;

    /**
     * @var DepartmentFactory
     */
    protected $departmentFactory;

    /**
     * @var DepartmentCollectionFactory
     */
    protected $departmentCollectionFactory;

    /**
     * @var Data\DepartmentSearchResultsInterface
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
     * @var \Tinwork\Job\Api\Data\DepartmentInterfaceFactory
     */
    protected $dataDepartmentFactory;

    /**
     * @param ResourceDepartment $resource
     * @param DepartmentFactory $departmentFactory
     * @param Data\DepartmentInterfaceFactory $dataDepartmentFactory
     * @param DepartmentCollectionFactory $departmentCollectionFactory
     * @param Data\DepartmentSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     */
    public function __construct(
        ResourceDepartment $resource,
        DepartmentFactory $departmentFactory,
        \Tinwork\Job\Api\Data\DepartmentInterfaceFactory $dataDepartmentFactory,
        DepartmentCollectionFactory $departmentCollectionFactory,
        Data\DepartmentSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor
    ) {
        $this->resource = $resource;
        $this->departmentFactory = $departmentFactory;
        $this->departmentCollectionFactory = $departmentCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataDepartmentFactory = $dataDepartmentFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
    }

    /**
     * Save Department data
     *
     * @param \Tinwork\Job\Api\Data\DepartmentInterface $department
     * @return Department
     * @throws CouldNotSaveException
     */
    public function save(Data\DepartmentInterface $department)
    {
        try {
            $this->resource->save($department);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $department;
    }

    /**
     * Load Department data by given Department Identity
     *
     * @param string $departmentId
     * @return Department
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($departmentId)
    {
        $department = $this->departmentFactory->create();
        $this->resource->load($department, $departmentId);
        if (!$department->getId()) {
            throw new NoSuchEntityException(__('Job Department with id "%1" does not exist.', $department));
        }

        return $department;
    }

    /**
     * Load Department data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Tinwork\Job\Api\Data\DepartmentSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var \Tinwork\Job\Model\ResourceModel\Department\Collection $collection */
        $collection = $this->departmentCollectionFactory->create();

        /** @var Data\DepartmentSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete Department
     *
     * @param \Tinwork\Job\Api\Data\DepartmentInterface $department
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Data\DepartmentInterface $department)
    {
        try {
            $this->resource->delete($department);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Delete Department by given Department Identity
     *
     * @param string $departmentId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($departmentId)
    {
        return $this->delete($this->getById($departmentId));
    }
}