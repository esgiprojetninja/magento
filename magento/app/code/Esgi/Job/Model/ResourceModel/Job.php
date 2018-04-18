<?php

namespace Tinwork\Job\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Job
 *
 * @package     Tinwork\Job\Model\ResourceModel
 * @copyright   Copyright (c) 2018 Slabprea
 */
class Job extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('tinwork_job_job', 'entity_id');
    }
}