<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Esgi\Ninja\Block\Adminhtml\NinjaStore\Edit;

use Magento\Backend\Block\Widget\Context;
use Esgi\Ninja\Api\NinjaStoreRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var NinjaStoreRepositoryInterface
     */
    protected $ninjastoreRepository;

    /**
     * @param Context $context
     * @param NinjaStoreRepositoryInterface $ninjastoreRepository
     */
    public function __construct(
        Context $context,
        NinjaStoreRepositoryInterface $ninjastoreRepository
    ) {
        $this->context              = $context;
        $this->ninjastoreRepository = $ninjastoreRepository;
    }

    /**
     * Return Ninja ninjastore ID
     *
     * @return int|null
     */
    public function getNinjaStoreId()
    {
        try {
            return $this->ninjastoreRepository->getById(
                $this->context->getRequest()->getParam('id')
            )->getId();
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
