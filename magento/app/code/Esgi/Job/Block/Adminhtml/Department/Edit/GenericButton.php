<?php

namespace Tinwork\Job\Block\Adminhtml\Department\Edit;

use Magento\Backend\Block\Widget\Context;
use Tinwork\Job\Api\DepartmentRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 *
 * @package     Tinwork\Job\Block\Adminhtml\Department\Edit
 * @copyright   Copyright (c) 2018 Slabprea
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var DepartmentRepositoryInterface
     */
    protected $departmentRepository;

    /**
     * @param Context $context
     * @param DepartmentRepositoryInterface $departmentRepository
     */
    public function __construct(
        Context $context,
        DepartmentRepositoryInterface $departmentRepository
    ) {
        $this->context              = $context;
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * Return Job department ID
     *
     * @return int|null
     */
    public function getDepartmentId()
    {
        try {
            return $this->departmentRepository->getById(
                $this->context->getRequest()->getParam('id')
            )->getId();
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}