<?php
/**
 * Oksa Request.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

namespace Oksa\Request\Block\Adminhtml\Request\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class BackButton
 *
 * @package Oksa\Request\Block\Adminhtml\Request\Edit
 */
class BackButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve button-specified settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * Get URL for back (reset) button.
     *
     * @return string
     */
    public function getBackUrl(): string
    {
        return $this->getUrl('*/*/');
    }
}
