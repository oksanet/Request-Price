<?php

/**
 * Oksa Request Request data provider.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020 Smile.
 */

declare(strict_types=1);

namespace Oksa\Request\Ui;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Oksa\Request\Model\ResourceModel\Request\CollectionFactory as CollectionFactory;

/**
 * Class RequestDataProvider
 */
class RequestDataProvider extends AbstractDataProvider
{
    protected $collection;

    /**
     * Loaded data.
     *
     * @var array
     */
    private $loadedData;

    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data
        );
        $this->collection = $collectionFactory->create();
    }

    public function getData(): array
    {
        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }
        $items = $this->getCollection()->getItems();
        foreach ($items as $item) {
            $this->loadedData[$item->getData($this->primaryFieldName)] = $item->getData();
        }
        return $this->loadedData;
    }
}
