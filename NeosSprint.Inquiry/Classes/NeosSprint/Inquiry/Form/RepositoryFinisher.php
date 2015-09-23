<?php
namespace NeosSprint\Inquiry\Form;
/*                                                                        *
 * This script belongs to the TYPO3 Flow package "NeosDemoTypo3Org".      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License as published by the Free   *
 * Software Foundation, either version 3 of the License, or (at your      *
 * option) any later version.                                             *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Form\Core\Model\AbstractFinisher;
use TYPO3\Form\Exception\FinisherException;
use NeosSprint\Inquiry\Domain\Model\Inquiry;
use NeosSprint\Inquiry\Domain\Service\InquiryService;


/**
     * Add Description here
     *
     */
class RepositoryFinisher extends AbstractFinisher {

    /**
     * @Flow\Inject
     * @var Inquiry
     */
    protected $inquiry;

    /**
     * @Flow\Inject
     * @var InquiryService
     */
    protected $inquiryService;


    /**
     * Executes this finisher
     * @see AbstractFinisher::execute()
     *
     * @return void
     * @throws FinisherException
     */
    protected function executeInternal() {
        $formRuntime = $this->finisherContext->getFormRuntime();
        $fields = $formRuntime->getRequest()->getArguments();

        if (isset($fields['id']) && !empty($fields['id']) && $this->inquiryService->getInquiryById($fields['id'])) {
            $this->inquiry = $this->inquiryService->getInquiryById($fields['id']);
        }

        foreach ($fields as $fieldname => $value) {
            if (!empty($value)) {
                $setter = 'set'.ucfirst($fieldname);
                $this->inquiry->$setter($value);
            }
        }

        //$request = $formRuntime->getRequest()->getMainRequest();
        //$formRuntime->getResponse()->setStatus(300);
        //$uri = $request->getHttpRequest()->getBaseUri();
        //$formRuntime->getResponse()->setHeader('Location', (string)$uri);
        $formRuntime->getResponse()->setContent('send');


        if (isset($fields['id']) && !empty($fields['id']) && $this->inquiryService->getInquiryById($fields['id'])) {
            $this->inquiryService->update($this->inquiry);
        } else {
            $this->inquiryService->add($this->inquiry);
        }
    }
}
