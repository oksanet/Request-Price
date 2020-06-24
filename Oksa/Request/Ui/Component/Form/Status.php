<?php

/**
 * Oksa Blog comment status.
 *
 * @author    Oksana Borodina
 * @copyright 2020 Smile
 */

declare(strict_types=1);

namespace Oksa\Request\Ui\Component\Form;

use Magento\Framework\Data\OptionSourceInterface;
use Oksa\Request\Model\Request;

/**
 * Class Status
 *
 * @package Oksa\Blog\Model\Comment\Source\Status
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
