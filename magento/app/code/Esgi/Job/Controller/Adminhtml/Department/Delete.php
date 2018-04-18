<?php

namespace Tinwork\Job\Controller\Adminhtml\Department;

use Tinwork\Job\Controller\Adminhtml\Department;

/**
 * Class Delete
 *
 * @package     Tinwork\Job\Controller\Adminhtml\Department
 * @copyright   Copyright (c) 2018 Slabprea
 */
class Delete extends Department
{
    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Tinwork\Job\Model\Department::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('You deleted the department.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a department to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}