<?php

/**
 * Oksa Request Request delete.
 *
 * @author    Oksana Borodina
 * Copyright (c) 2020.
 */

declare(strict_types=1);

namespace Oksa\Request\Controller\Adminhtml\Request;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Oksa\Request\Api\RequestRepositoryInterface;

/**
 * Class Delete
 *
 * @package Oksa\Request\Controller\Adminhtml\Request
 */
class Delete extends Action
{
    /**
     * Authorization level of a basic admin session.
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Oksa_Request::request_edit';

    /**
     * Comment repository interface.
     *
     * @var RequestRepositoryInterface
     */
    private $requestRepository;

    /**
     * Delete constructor.
     *
     * @param Context $context
     * @param RequestRepositoryInterface $requestRepository
     */
    public function __construct(
        Context $context,
        RequestRepositoryInterface $requestRepository
    ) {
        $this->requestRepository = $requestRepository;
        parent::__construct($context);
    }

    /**
     * Delete action.
     *
     * @return Redirect
     */
    public function execute(): Redirect
    {
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('id');
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($id) {
            try {
                // delete request price
                $requestRepository = $this->requestRepository;
                $requestRepository->deleteById((int)$id);

                // display success message
                $this->messageManager->addSuccessMessage(__('The Request has been deleted.'));

                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {

                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());

                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }

        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a request to delete.'));

        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
