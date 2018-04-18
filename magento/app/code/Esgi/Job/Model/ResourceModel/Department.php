<?php

namespace Tinwork\Job\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Department
 *
 * @package     Tinwork\Job\Model\ResourceModel
 * @copyright   Copyright (c) 2018 Slabprea
 */
class Department extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('tinwork_job_department', 'entity_id');
    }
}