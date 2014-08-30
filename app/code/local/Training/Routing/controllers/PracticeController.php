<?php

class Training_Routing_PracticeController extends Mage_Core_Controller_Front_Action {

	// training/practice/index
	public function indexAction() {
		$this->getResponse()->setBody("This is the RIGHT way to do it");
	}

	public function testAction() {
		$this->getResponse()->setBody(__METHOD__);
	}

}