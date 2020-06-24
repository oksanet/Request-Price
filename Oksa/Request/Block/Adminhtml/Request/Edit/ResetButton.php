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
 * Class ResetButton
 *
 * @package Oksa\Request\Block\Adminhtml\Request\Edit
 */
class ResetButton implements ButtonProviderInterface
{
    /**
     * Retrieve button-specified settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}
