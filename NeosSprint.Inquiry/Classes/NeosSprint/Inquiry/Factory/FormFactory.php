<?php
namespace NeosSprint\Inquiry\Factory;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Form\Core\Model\FormDefinition;

class FormFactory extends \TYPO3\Form\Factory\AbstractFormFactory
{

    /**
     * @param array $factorySpecificConfiguration
     * @param string $presetName
     * @return \TYPO3\Form\Core\Model\FormDefinition
     */
    public function build(array $factorySpecificConfiguration, $presetName)
    {
        $formConfiguration = $this->getPresetConfiguration($presetName);
        $form = new FormDefinition('Form', $formConfiguration);
        if (isset($factorySpecificConfiguration['inquiry'])) {
            $inquiry = $factorySpecificConfiguration['inquiry'];
        }

        $page1 = $form->createPage('firstpage');
        $name = $page1->createElement('name', 'TYPO3.Form:SingleLineText');
        $name->setLabel('Name');
        $mail = $page1->createElement('email', 'TYPO3.Form:SingleLineText');
        $mail->setLabel('Mail');
        $message = $page1->createElement('message', 'TYPO3.Form:MultiLineText');
        $message->setLabel('Nachricht');


        if (isset($inquiry) && $inquiry !== null) {
            $id = $page1->createElement('id', 'TYPO3.Form:HiddenField');
            $id->setDefaultValue($inquiry->getId());
            $name->setDefaultValue($inquiry->getName());
            $mail->setDefaultValue($inquiry->getEmail());
            $message->setDefaultValue($inquiry->getMessage());
        }

        $repoFinisher = new \NeosSprint\Inquiry\Form\RepositoryFinisher();
        $form->addFinisher($repoFinisher);

        return $form;
    }
}