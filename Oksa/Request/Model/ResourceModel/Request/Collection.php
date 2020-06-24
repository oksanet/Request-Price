<?php
/**
 * Oksa Request.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

declare(strict_types=1);

namespace Oksa\Request\Model\ResourceModel\Request;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Oksa\Request\Model\Request as RequestModel;
use Oksa\Request\Model\ResourceModel\Request as RequestResourceModel;

/**
 * Class Collection
 *
 * @package Oksa\Request\Model\ResourceModel\Request
 */
class Collection extends AbstractCollection
{
    /**
     * Collection constructor.
     */
    public function _construct(): void
    {
        $this->_init(RequestModel::class, RequestResourceModel::class);
    }
}
