<?php

/**
 * Oksa Request Request model.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

declare(strict_types=1);

namespace Oksa\Request\Model;

//use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Oksa\Request\Api\Data\RequestInterface;

/**
 * Class Request
 *
 * @package Oksa\Request\Model
 */
class Request extends AbstractModel implements RequestInterface /*, IdentityInterface*/
{

    /**
     * Oksa Request cache tag.
     */
//    const CACHE_TAG = 'oksa_request_request';
//
//    /**
//     * Cache tag.
//     *
//     * @var string
//     */
//    public $cacheTag = 'oksa_request_request';
//
//    /**
//     * Prefix of model events names.
//     *
//     * @var string
//     */
//    public $eventPrefix = 'oksa_request_request';

    /**
     * Request construct.
     *
     * @return void
     */
    public function _construct(): void
    {
        $this->_init('Oksa\Request\Model\ResourceModel\Request');
    }

    /**
     * Get identities.
     *
     * @return array
     */
//    public function getIdentities(): array
//    {
//        return [self::CACHE_TAG . '_' . $this->getRequestId()];
//    }

    /**
     * Get ID.
     *
     * @return int
     */
    public function getRequestId(): int
    {
        return (int) $this->getData(self::REQUEST_ID);
    }

    /**
     * Set ID.
     *
     * @param int $id
     *
     * @return RequestInterface
     */
    public function setRequestId(int $id): RequestInterface
    {
        return $this->setData(self::REQUEST_ID, $id);
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name.
     *
     * @param string $name
     *
     * @return RequestInterface
     */
    public function setName(string $name): RequestInterface
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get Email.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Email.
     *
     * @param string $email
     *
     * @return RequestInterface
     */
    public function setLastName(string $email): RequestInterface
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get Product SKU.
     *
     * @return string
     */
    public function getProductSKU(): string
    {
        return $this->getData(self::SKU);
    }

    /**
     * Set Product SKU.
     *
     * @param string $SKU
     *
     * @return RequestInterface
     */
    public function setProductSKU(string $SKU): RequestInterface
    {
        return $this->setData(self::SKU, $SKU);
    }

    /**
     * Get Comment.
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->getData(self::COMMENT);
    }

    /**
     * Set Comment
     *
     * @param string $comment
     *
     * @return RequestInterface
     */
    public function setMessage(string $comment): RequestInterface
    {
        return $this->setData(self::COMMENT, $comment);
    }

    /**
     * Get Status.
     *
     * @return int
     */
    public function getStatus(): int
    {
        return (int) $this->getData(self::STATUS);
    }

    /**
     * Get Statuses
     *
     * @return array
     */
    public function getStatuses(): array
    {
        return [
            self::STATUS_NEW => __('New'),
            self::STATUS_IN_PROGRESS => __('In Progress'),
            self::STATUS_CLOSED => __('Closed')
        ];
    }

    /**
     * Set Status.
     *
     * @param int $status
     *
     * @return RequestInterface
     */
    public function setStatus(int $status): RequestInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get creation time.
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set creation time.
     *
     * @param string $creationTime
     *
     * @return RequestInterface
     */
    public function setCreatedAt(string $creationTime): RequestInterface
    {
        return $this->setData(self::CREATED_AT, $creationTime);
    }

    /**
     * Get updated time.
     *
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set updated time.
     *
     * @param string $updateTime
     *
     * @return RequestInterface
     */
    public function setUpdatedAt(string $updateTime): RequestInterface
    {
        return $this->setData(self::UPDATED_AT, $updateTime);
    }
}
