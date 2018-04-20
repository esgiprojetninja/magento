<?php
namespace Esgi\Ninja\Controller\Stores;

use Magento\Framework\App\Request\Http;
use Magento\Framework\Exception\NotFoundException;
use Esgi\Ninja\Api\NinjaStoreRepositoryInterface;
use Esgi\Ninja\Model\ResourceModel\NinjaStore\Collection;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_jsonFactory;
	protected $_http;
    protected $_collection;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        Http $http,
        Collection $collection)
	{
		$this->_jsonFactory = $jsonFactory;
		$this->_http = $http;
		$this->_collection = $collection;
		return parent::__construct($context);
	}

	public function execute()
	{
        if (!$this->_http->isAjax()) {
            throw new NotFoundException(__("Ajax only homz"));
        }
        $stores = [];
        foreach($this->_collection->getItems() as $ninjaStore) {
            $stores[]= [
                "name" => $ninjaStore->getName(),
                "lat" => $ninjaStore->getLat(),
                "lng" => $ninjaStore->getLng(),
                "description" => $ninjaStore->getContent(),
                "url" => $ninjaStore->getLink()
            ];
        }
        return $this->_jsonFactory->create()->setData([
            "success" => true,
            "data" => $stores
        ]);
	}
}
