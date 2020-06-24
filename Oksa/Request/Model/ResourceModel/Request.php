<?php
/**
 * Oksa Request.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

declare(strict_types=1);

namespace Oksa\Request\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

/**
 * Class Request
 *
 * @package Oksa\Request\Model\ResourceModel
 */
class Request extends AbstractDb
{

    /**
     * Request constructor.
     *
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Initialize resource model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('request_price', 'request_id');
    }
}
