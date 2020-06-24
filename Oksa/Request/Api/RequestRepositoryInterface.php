<?php

/**
 * Oksa Request request repository interface.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

declare(strict_types=1);

namespace Oksa\Request\Api;

use Magento\Framework\Exception\NoSuchEntityException;
use Oksa\Request\Api\Data\RequestInterface;

/**
 * Interface RequestRepositoryInterface
 *
 * @package Oksa\Request\Api
 */
interface RequestRepositoryInterface
{
    /**
     * Retrieve a request by it's id.
     *
     * @param $objectId
     *
     * @return RequestInterface
     */
    public function getById(int $objectId): RequestInterface;

    /**
     * Save a request.
     *
     * @param RequestInterface $object
     *
     * @return RequestInterface
     */
    public function save(RequestInterface $object): RequestInterface;

    /**
     * Delete a request by its id.
     *
     * @param int $objectId
     *
     * @return bool
     *
     * @throws NoSuchEntityException
     */
    public function deleteById(int $objectId): bool;
}
