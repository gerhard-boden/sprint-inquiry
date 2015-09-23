<?php
namespace NeosSprint\Inquiry\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "NeosSprint.Inquiry".    *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Inquiry {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $email;

	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @var string
	 */
	protected $Persistence_Object_Identifier;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @param string $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * @return string
	 */
	public function getId() {
		return $this->Persistence_Object_Identifier;
	}

	public function setId($id) {
		$this->Persistence_Object_Identifier = $id;
	}

}