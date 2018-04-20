<?php
namespace Esgi\Ninja\Model\ResourceModel\Ninja;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = 'entity_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Esgi\Ninja\Model\Ninja', 'Esgi\Ninja\Model\ResourceModel\Ninja');
    }

}
