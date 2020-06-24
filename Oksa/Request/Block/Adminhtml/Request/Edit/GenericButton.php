<?php
/**
 * Oksa Request.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

namespace Oksa\Request\Block\Adminhtml\Request\Edit;

use Magento\Framework\View\Element\UiComponent\Context;

/**
 * Class GenericButton
 *
 * @package Oksa\Request\Block\Adminhtml\Request\Edit
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        $this->context = $context;
    }

    /**
     * Return the Request ID.
     *
     * @return int
     */
    public function getRequestId(): int
    {
        return (int)$this->context->getRequestParam('id');
    }

    /**
     * Generate url by route and parameters.
     *
     * @param   string $route
     * @param   array $params
     *
     * @return  string
     */
    public function getUrl($route = '', $params = []): string
    {
        return $this->context->getUrl($route, $params);
    }

    /**
     * Retrieve button-specified settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [];
    }
}
