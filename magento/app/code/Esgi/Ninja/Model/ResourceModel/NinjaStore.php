<?php
namespace Esgi\Ninja\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class NinjaStore extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // Table Name and Primary Key column
        $this->_init('esgi_ninja_ninjastore', 'entity_id');
    }
}
