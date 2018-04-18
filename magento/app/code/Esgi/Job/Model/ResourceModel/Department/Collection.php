<?php

namespace Tinwork\Job\Model\ResourceModel\Department;

use Tinwork\Job\Api\Data\DepartmentInterface;
use Tinwork\Job\Model\Department;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package     Tinwork\Job\Model\ResourceModel\Department
 * @copyright   Copyright (c) 2018 Slabprea
 */
class Collection extends AbstractCollection
{

    /**
     * @var string $_idFieldName
     */
    protected $_idFieldName = DepartmentInterface::ID;

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('\Tinwork\Job\Model\Department', '\Tinwork\Job\Model\ResourceModel\Department');
    }
}
