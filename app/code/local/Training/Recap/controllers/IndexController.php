<?php

// require_once Mage::getModuleDir('', 'Training_Recap') . '/AccountController.php';

class Training_Recap_IndexController extends Mage_Core_Controller_Front_Action {

	public function indexAction() {
		$object = Mage::getModel('training_recap/sample');

		$object->setData( array('test' => 666) );
		$this->getResponse()->setBody( get_class($object));
		
		var_dump($object);
	}
}