<?php

namespace Tinwork\Job\Model\ResourceModel\Job;

use Tinwork\Job\Api\Data\JobInterface;
use Tinwork\Job\Model\Job;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package     Tinwork\Job\Model\ResourceModel\Job
 * @copyright   Copyright (c) 2018 Slabprea
 */
class Collection extends AbstractCollection
{

    /**
     * @var string $_idFieldName
     */
    protected $_idFieldName = JobInterface::ID;

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('\Tinwork\Job\Model\Job', '\Tinwork\Job\Model\ResourceModel\Job');
    }
}
