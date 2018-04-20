<?php
// app/code/Esgi/Ninja/Block/NinjaStore.php
namespace Esgi\Ninja\Block;

use Magento\Framework\View\Element\Template;
use Esgi\Ninja\Api\NinjaStoreRepositoryInterface;
use Esgi\Ninja\Model\ResourceModel\NinjaStore\Collection;

/**
 * NinjaStore block
 */
class NinjaStore extends \Magento\Framework\View\Element\Template
{
    protected $_collection;

    public function __construct(
        Collection $collection,
        Template\Context $context,
        array $data = []
    ) {
        $this->_collection = $collection;
        parent::__construct($context, $data);
    }

    public function getNinjaStores()
    {
        return $this->_collection->getItems();
    }
}
