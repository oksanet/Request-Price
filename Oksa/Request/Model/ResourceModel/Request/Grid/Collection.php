<?php
/**
 * Oksa Request.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

declare(strict_types=1);

namespace Oksa\Request\Model\ResourceModel\Request\Grid;

use Magento\Framework\Api\Search\AggregationInterface;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\Document;
use Oksa\Request\Model\ResourceModel\Request;
use Oksa\Request\Model\ResourceModel\Request\Collection as RequestCollection;

/**
 * Class Collection
 *
 * @package Oksa\Request\Model\ResourceModel\Request\Grid
 */
class Collection extends RequestCollection implements SearchResultInterface
{
    /**
     * Aggregations.
     *
     * @var AggregationInterface
     */
    private $aggregations;

    /**
     * Collection constructor.
     *
     * @return void
     */
    public function _construct(): void
    {
        $this->_init(Document::class, Request::class);
    }

    /**
     * Set items list.
     *
     * @param \Magento\Framework\Api\ExtensibleDataInterface[] $items
     *
     * @return $this
     */
    public function setItems(array $items = null): Collection
    {
        return $this;
    }

    /**
     * Get aggregations.
     *
     * @return AggregationInterface
     */
    public function getAggregations(): AggregationInterface
    {
        return $this->aggregations;
    }

    /**
     * @param \Magento\Framework\Api\Search\AggregationInterface $aggregations
     *
     * @return $this
     */
    public function setAggregations($aggregations): Collection
    {
        $this->aggregations = $aggregations;
    }

    /**
     * Get search criteria.
     *
     * @return \Magento\Framework\Api\SearchCriteriaInterface
     */
    public function getSearchCriteria(): ?SearchCriteriaInterface
    {
        return null;
    }

    /**
     * Set search criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     *
     * @return $this
     */
    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria): Collection
    {
        return $this;
    }

    /**
     * Get total count.
     *
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->getSize();
    }

    /**
     * Set total count.
     *
     * @param int $totalCount
     *
     * @return $this
     */
    public function setTotalCount($totalCount)
    {
        return $this;
    }
}
