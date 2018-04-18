<?php

namespace Tinwork\Job\Controller\Adminhtml;

/**
 * Class Department
 *
 * @package     Tinwork\Job\Controller\Adminhtml
 * @copyright   Copyright (c) 2018 Slabprea
 */

abstract class Department extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Tinwork_Job::department';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry)
    {
        $this->_coreRegistry = $coreRegistry;

        parent::__construct($context);
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Tinwork_Job::department')
            ->addBreadcrumb(__('Job'), __('Job'))
            ->addBreadcrumb(__('Departments'), __('Departments'));
        return $resultPage;
    }
}