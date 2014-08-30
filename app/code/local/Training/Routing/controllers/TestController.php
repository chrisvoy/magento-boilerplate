<?php

class Training_Routing_TestController extends Mage_Core_Controller_Front_Action {

	public function indexAction() {
		
	}

	public function practiceAction() {
		$this->getResponse()->setBody(__METHOD__);
	}
}