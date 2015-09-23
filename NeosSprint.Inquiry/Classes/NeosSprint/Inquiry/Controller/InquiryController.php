<?php
namespace NeosSprint\Inquiry\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "NeosSprint.Inquiry".    *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class InquiryController extends \TYPO3\Flow\Mvc\Controller\ActionController {

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('foos', array(
			'bar', 'baz'
		));
	}

}