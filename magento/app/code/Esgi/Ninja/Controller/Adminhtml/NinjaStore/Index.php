<?php
namespace Esgi\Ninja\Controller\Adminhtml\NinjaStore;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Esgi_Ninja::ninjastore';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Esgi_Ninja::ninjastore');
        $resultPage->addBreadcrumb(__('Ninjas'), __('Ninjas'));
        $resultPage->addBreadcrumb(__('Manage NinjaStores'), __('Manage NinjaStores'));
        $resultPage->getConfig()->getTitle()->prepend(__('NinjaStore'));

        return $resultPage;
    }
}
