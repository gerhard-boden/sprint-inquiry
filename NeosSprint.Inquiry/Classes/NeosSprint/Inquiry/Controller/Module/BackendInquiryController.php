<?php

namespace NeosSprint\Inquiry\Controller\Module;


/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Neos".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Error\Message;
use TYPO3\Flow\Property\PropertyMappingConfiguration;
use TYPO3\Flow\Property\TypeConverter\PersistentObjectConverter;
use TYPO3\Flow\Security\Authorization\PrivilegeManagerInterface;
use NeosSprint\Inquiry\Domain\Model\Inquiry;
use NeosSprint\Inquiry\Domain\Service\InquiryService;
use TYPO3\Neos\Controller\Module\AbstractModuleController;

/**
 * The Inquiry module controller
 *
 * @Flow\Scope("singleton")
 */
class BackendInquiryController extends AbstractModuleController {

    /**
     * @Flow\Inject
     * @var PrivilegeManagerInterface
     */
    protected $privilegeManager;

    /**
     * @Flow\Inject
     * @var InquiryService
     */
    protected $inquiryService;

    /**
     * @return void
     */
    protected function initializeAction() {
        parent::initializeAction();

    }

    /**
     * Index
     *
     * @return void
     */
    public function indexAction() {
        //$this->forward('edit');
        $inquiries = $this->inquiryService->getInquiries();
        $this->view->assign('inquiries', $inquiries);
    }

    public function detailAction(Inquiry $inquiry){
        //var_dump($inquiry);

        $this->view->assign('inquiry', $inquiry);
    }

    public function updateAction(Inquiry $inquiry){
        $this->inquiryService->updateInquiry($inquiry);

        $this->addFlashMessage('The inquiry has been updated.', 'Inquiry updated', Message::SEVERITY_OK);

        $this->redirect('detail', NULL, NULL, array('inquiry' => $inquiry));
    }

    public function deleteAction(Inquiry $inquiry){
        $this->inquiryService->removeInquiry($inquiry);

        $this->addFlashMessage('The inquiry has been deleted.', 'Inquiry deleted', Message::SEVERITY_NOTICE);
        $this->redirect('index');
    }


}
