<?php
namespace NeosSprint\Inquiry\Domain\Service;

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
use TYPO3\Neos\Domain\Exception;
use TYPO3\Flow\Security\Context;
use NeosSprint\Inquiry\Domain\Model\Inquiry;
use NeosSprint\Inquiry\Domain\Repository\InquiryRepository;

/**
 * A service for managing users
 *
 * @Flow\Scope("singleton")
 * @api
 */
class InquiryService {

    /**
     * @Flow\Inject
     * @var InquiryRepository
     */
    protected $inquiryRepository;


    public function getInquiries() {
        return $this->inquiryRepository->findAll();
    }

    public function getInquiryById($id) {
        return $this->inquiryRepository->findByIdentifier($id);
    }

    public function add(Inquiry $inquiry) {
        $this->inquiryRepository->add($inquiry);
    }

    public function update(Inquiry $inquiry){
        $this->inquiryRepository->update($inquiry);
    }

    public function removeInquiry(Inquiry $inquiry){
        $this->inquiryRepository->remove($inquiry);
    }

}
