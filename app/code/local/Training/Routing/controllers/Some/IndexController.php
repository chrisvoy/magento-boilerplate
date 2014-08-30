<?php

class Training_Routing_Some_IndexController extends Mage_Core_Controller_Front_Action {

	// training/practice/index
	public function indexAction() {
		$this->getResponse()->setBody(__METHOD__);
	}
}