<?php
namespace Esgi\Ninja\Model\NinjaStore;

use Esgi\Ninja\Model\ResourceModel\NinjaStore\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class DataProvider
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Esgi\Ninja\Model\ResourceModel\NinjaStore\Collection
     */
    protected $collection;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $ninjastoreCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $ninjastoreCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $ninjastoreCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var \Esgi\Ninja\Model\NinjaStore $ninjastore */
        foreach ($items as $ninjastore) {
            $this->loadedData[$ninjastore->getId()] = $ninjastore->getData();
        }

        $data = $this->dataPersistor->get('ninja_ninjastore');

        if (!empty($data)) {
            $ninjastore = $this->collection->getNewEmptyItem();
            $ninjastore->setData($data);
            $this->loadedData[$ninjastore->getId()] = $ninjastore->getData();
            $this->dataPersistor->clear('ninja_ninjastore');
        }

        return $this->loadedData;
    }
}
