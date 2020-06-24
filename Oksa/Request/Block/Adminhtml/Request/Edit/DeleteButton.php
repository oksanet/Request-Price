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
 * Class DeleteButton
 *
 * @package Oksa\Request\Block\Adminhtml\Request\Edit
 */
class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        $data = [];
        if ($this->getRequestId()) {
            $data = [
                'label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     *
     * Get URL for delete button.
     *
     * @return string
     */
    public function getDeleteUrl(): string
    {
        return $this->getUrl('*/*/delete', ['id' => $this->getRequestId()]);
    }
}
