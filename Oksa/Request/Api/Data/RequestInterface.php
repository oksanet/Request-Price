<?php

/**
 * Oksa Request Request interface.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

declare(strict_types=1);

namespace Oksa\Request\Api\Data;

/**
 * Interface RequestInterface
 *
 * @package Oksa\Request\Api\Data
 */
interface RequestInterface
{
    /**
     * Table name.
     */
    const TABLE_NAME = 'request_price';

    /**
     * Request's Statuses.
     */
    const STATUS_NEW = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_CLOSED = 3;

    /**
     * Constants defined for keys of data array.
     */
    const REQUEST_ID = 'request_id';
    const NAME       = 'name';
    const EMAIL      = 'email';
    const SKU        = 'sku';
    const COMMENT    = 'comment';
    const STATUS     = 'status';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get ID.
     *
     * @return int
     */
    public function getRequestId(): int;

    /**
     * Set ID.
     *
     * @param int $id
     *
     * @return RequestInterface
     */
    public function setRequestId(int $id): RequestInterface;

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set Name.
     *
     * @param string $name
     *
     * @return RequestInterface
     */
    public function setName(string $name): RequestInterface;

    /**
     * Get Product SKU.
     *
     * @return string
     */
    public function getProductSKU(): string;

    /**
     * Set Product SKU.
     *
     * @param string $sku
     *
     * @return RequestInterface
     */
    public function setProductSKU(string $sku): RequestInterface;

    /**
     * Get Comment.
     *
     * @return string
     */
    public function getComment(): string;

    /**
     * Set Comment.
     *
     * @param string $comment
     *
     * @return RequestInterface
     */
    public function setMessage(string $comment): RequestInterface;

    /**
     * Get Status.
     *
     * @return int
     */
    public function getStatus(): int;

    /**
     * Get Statuses.
     *
     * @return array
     */
    public function getStatuses(): array;

    /**
     * Set Status.
     *
     * @param int $status
     *
     * @return RequestInterface
     */
    public function setStatus(int $status): RequestInterface;

    /**
     * Get creation time.
     *
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * Set creation time.
     *
     * @param string $creationTime
     *
     * @return RequestInterface
     */
    public function setCreatedAt(string $creationTime): RequestInterface;

    /**
     * Get updated time.
     *
     * @return string
     */
    public function getUpdatedAt(): string;

    /**
     * Set updated time.
     *
     * @param string $updateTime
     *
     * @return RequestInterface
     */
    public function setUpdatedAt(string $updateTime): RequestInterface;

}
