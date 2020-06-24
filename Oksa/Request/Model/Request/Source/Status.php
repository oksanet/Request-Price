<?php

/**
 * Oksa Request Request status.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

declare(strict_types=1);

namespace Oksa\Request\Model\Request\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Oksa\Request\Model\Request;

/**
 * Class Status
 *
 * @package Oksa\Request\Model\Request\Source
 */
class Status implements OptionSourceInterface
{
    /**
     * Request.
     *
     * @var Request
     */
    private $request;

    /**
     * Status constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get options.
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        $availableOptions = $this->request->getStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }

        return $options;
    }
}
