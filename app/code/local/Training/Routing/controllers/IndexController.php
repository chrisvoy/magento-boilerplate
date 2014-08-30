<?php

class Training_Routing_IndexController extends Mage_Core_Controller_Front_Action {

	// training/practice/index
	public function indexAction() {
		$this->getResponse()->setBody(__METHOD__);
	}

	public function anotheroneAction() {
		$this->getResponse()->setBody(__METHOD__);
	}
}