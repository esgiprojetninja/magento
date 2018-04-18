<?php
namespace Esgi\Ninja\Controller\Stores;

use Magento\Framework\App\Request\Http;
use Magento\Framework\Exception\NotFoundException;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_jsonFactory;
	protected $_http;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        Http $http)
	{
		$this->_jsonFactory = $jsonFactory;
		$this->_http = $http;
		return parent::__construct($context);
	}

	public function execute()
	{
        if (!$this->_http->isAjax()) {
            throw new NotFoundException(__("Ajax only bitch"));
        }
        $stores = [];
        for ($i = 0; $i < 4; $i++) {
            $stores[]= [
                "name" => "store"+$i,
                "lat" => $i,
                "lon" => $i,
                "description" => "I was the poulay you know, like POULAY man. POULAY"

            ];
        }
        return $this->_jsonFactory->create()->setData($stores);
	}
}
