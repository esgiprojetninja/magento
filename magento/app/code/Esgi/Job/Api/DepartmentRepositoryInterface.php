<?php

namespace Tinwork\Job\Api;

/**
 * Class DepartmentRepositoryInterface
 *
 * @package     Tinwork\Job\Api
 * @copyright   Copyright (c) 2018 Slabprea
 */
interface DepartmentRepositoryInterface
{
    /**
     * Save block.
     *
     * @param \Tinwork\Job\Api\Data\DepartmentInterface $department
     * @return \Tinwork\Job\Api\Data\DepartmentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\DepartmentInterface $department);

    /**
     * Retrieve $department.
     *
     * @param int $departmentId
     * @return \Tinwork\Job\Api\Data\DepartmentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($departmentId);

    /**
     * Retrieve departments matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Tinwork\Job\Api\Data\DepartmentSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete department.
     *
     * @param \Tinwork\Job\Api\Data\DepartmentInterface $department
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\DepartmentInterface $department);

    /**
     * Delete department by ID.
     *
     * @param int $departmentId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($departmentId);
}