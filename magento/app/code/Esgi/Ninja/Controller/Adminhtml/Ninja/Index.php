<?php
namespace Esgi\Ninja\Controller\Adminhtml\Ninja;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Esgi_Ninja::ninja';

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
        $resultPage->setActiveMenu('Esgi_Ninja::ninja');
        $resultPage->addBreadcrumb(__('Ninjas'), __('Ninjas'));
        $resultPage->addBreadcrumb(__('Manage Ninjas'), __('Manage Ninjas'));
        $resultPage->getConfig()->getTitle()->prepend(__('Ninja'));

        return $resultPage;
    }
}
