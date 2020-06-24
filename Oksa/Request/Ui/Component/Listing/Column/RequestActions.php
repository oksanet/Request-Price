<?php

/**
 * Oksa Request Request actions.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

declare(strict_types=1);

namespace Oksa\Request\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class RequestActions
 *
 * @package Oksa\Request\Ui\Component\Listing\Colum\RequestActions
 */
class RequestActions extends Column
{
    const URL_EDIT   = 'oksa_request/request/edit';
    const URL_DELETE = 'oksa_request/request/delete';

    /**
     * RequestActions construct.
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        parent::__construct(
            $context,
            $uiComponentFactory,
            $components,
            $data
        );
    }

    /**
     * Prepare Data Source.
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {

                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->context->getUrl(
                            static::URL_EDIT,
                            [
                                'id' => $item[$item['id_field_name']]
                            ]
                        ),
                        'label' => __('Edit')
                    ],
                    'delete' => [
                        'href' => $this->context->getUrl(
                            static::URL_DELETE,
                            [
                                'id' => $item[$item['id_field_name']]
                            ]
                        ),
                        'confirm' => [
                            'title' => __('Delete Request'),
                            'message' => __('Are you sure you want to do this?'),
                        ],
                        'label' => __('Delete')
                    ]
                ];
            }
        }

        return $dataSource;
    }
}
