<?php

/**
 * Oksa Request Request save.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020 Smile.
 */

declare(strict_types=1);

namespace Oksa\Request\Controller\Adminhtml\Request;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Oksa\Request\Api\RequestRepositoryInterface;
use Oksa\Request\Model\RequestFactory;

/**
 * Class Save
 *
 * @package Oksa\Request\Controller\Adminhtml\Request
 */
class Save extends Action
{
    /**
     * Authorization level of a basic admin session.
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Oksa_Request::request_edit';

    /**
     * Data persistor interface.
     *
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * Request repository interface.
     *
     * @var RequestRepositoryInterface
     */
    private $requestRepository;

    /**
     * Request model.
     *
     * @var \Oksa\Request\Model\Request
     */
    private $request;

    /**
     * Save construct.
     *
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param RequestRepositoryInterface $requestRepository
     * @param RequestFactory $request
     *
     */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        RequestRepositoryInterface $requestRepository,
        RequestFactory $request
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->requestRepository = $requestRepository;
        $this->request = $request;
        parent::__construct($context);
    }

    /**
     * Save action.
     *
     * @return ResultInterface
     *
     */
    public function execute(): ResultInterface
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath($this->_redirect->getRefererUrl());
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            try {
                // save request price
                $model = $this->request->create()->setData($data);
                $this->requestRepository->save($model);

                // display success message
                $this->messageManager->addSuccessMessage(__('Your Request is Saved.'));

                $this->dataPersistor->clear('oksa_request_save');

                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {

                // display error message
                $this->messageManager->addExceptionMessage($e->getPrevious() ?: $e);
            } catch (\Exception $e) {

                // display error message
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Request.'));
            }
        }

        $this->dataPersistor->set('oksa_request_save', $data);

        // go back to edit form
        return $resultRedirect;
    }
}
