<?php

/**
 * Oksa Request request repository.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020 Smile.
 */

declare(strict_types=1);

namespace Oksa\Request\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Oksa\Request\Api\Data\RequestInterface;
use Oksa\Request\Api\RequestRepositoryInterface;
use Oksa\Request\Model\RequestFactory as RequestFactory;
use Oksa\Request\Model\ResourceModel\Request as ResourceRequest;

/**
 * Class RequestRepository
 *
 * @package Oksa\Request\Model
 */
class RequestRepository implements RequestRepositoryInterface
{
    /**
     * Resource request.
     *
     * @var ResourceRequest
     */
    private $resource;

    /**
     * Request factory.
     *
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     * RequestRepository constructor.
     *
     * @param ResourceRequest $resource
     * @param RequestFactory $requestFactory
     */
    public function __construct(
        ResourceRequest $resource,
        RequestFactory  $requestFactory
    ) {
        $this->resource = $resource;
        $this->requestFactory = $requestFactory;
    }

    /**
     * Save Request data.
     *
     * @param RequestInterface $request
     *
     * @return RequestInterface
     *
     * @throws CouldNotSaveException
     */
    public function save(RequestInterface $request): RequestInterface
    {
        try {
            /** @var \Oksa\Request\Model\Request $request */
            $this->resource->save($request);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $request;
    }

    /**
     * Load Request data by given Request Identity.
     *
     * @param int $requestId
     *
     * @return RequestInterface
     *
     * @throws NoSuchEntityException
     */
    public function getById(int $requestId): RequestInterface
    {
        /** @var \Oksa\Request\Model\Request $request */
        $request = $this->requestFactory->create();
        $this->resource->load($request, $requestId);
        if (!$request->getRequestId()) {
            throw new NoSuchEntityException(__('Request with id "%1" does not exist.', $requestId));
        }

        return $request;
    }

    /**
     * Delete Request.
     *
     * @param RequestInterface $request
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     */
    public function delete(RequestInterface $request): bool
    {
        try {
            /** @var \Oksa\Request\Model\Request $request */
            $this->resource->delete($request);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Delete Request by given Request Identity.
     *
     * @param int $requestId
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $requestId): bool
    {
        return $this->delete($this->getById($requestId));
    }
}
