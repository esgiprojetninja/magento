<?php

namespace Tinwork\Job\Controller\Adminhtml\Department;

use Magento\Backend\App\Action\Context;
use Tinwork\Job\Model\Department;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Inspection\Exception;

/**
 * Class Save
 *
 * @package     Tinwork\Job\Controller\Adminhtml\Department
 * @copyright   Copyright (c) 2018 Slabprea
 */
class Save extends \Tinwork\Job\Controller\Adminhtml\Department
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @param Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Registry $coreRegistry,
        DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');

            if (empty($data['entity_id'])) {
                $data['entity_id'] = null;
            }

            /** @var \Tinwork\Job\Model\Department $model */
            $model = $this->_objectManager->create(\Tinwork\Job\Model\Department::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This department no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the department.'));
                $this->dataPersistor->clear('job_department');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the department.'));
            }

            $this->dataPersistor->set('job_department', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}