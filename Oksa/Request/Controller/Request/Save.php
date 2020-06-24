<?php
/**
 * Oksa Request Request save.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020 Smile.
 */

declare(strict_types=1);

namespace Oksa\Request\Controller\Request;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\LocalizedException;
use Oksa\Request\Model\RequestFactory;
use Oksa\Request\Api\RequestRepositoryInterface;

/**
 * Class Save
 *
 * @package Oksa\Request\Controller\Request
 */
class Save extends Action
{

    /**
     * Request repository interface.
     *
     * @var RequestRepositoryInterface
     */
    private $requestRepository;

    /**
     * Request factory.
     *
     * @var RequestFactory
     */
    private $request;

    /**
     * Save constructor.
     *
     * @param Context $context
     * @param RequestRepositoryInterface $requestRepository
     * @param RequestFactory $request
     */
    public function __construct(
        Context $context,
        RequestRepositoryInterface $requestRepository,
        RequestFactory $request
    ) {
        $this->requestRepository = $requestRepository;
        $this->request = $request;
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        try {
            $model = $this->request->create()->setData($this->validatedParams($this->getRequest()));

            $this->requestRepository->save($model);

            $this->messageManager->addSuccessMessage(__('Your Request is Sent.'));

        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while sending the Request.'));
        }

        return;
    }

    private function validatedParams(RequestInterface $request)
    {
        if (trim($request->getParam('name')) === '') {
            throw new LocalizedException(__('Enter the Name and try again.'));
        }
        if (false === \strpos($request->getParam('email'), '@')) {
            throw new LocalizedException(__('The email address is invalid. Verify the email address and try again.'));
        }
        if (trim($request->getParam('sku')) === '') {
            throw new LocalizedException(__('Enter the product SKU and try again.'));
        }

        return $request->getParams();
    }
}
