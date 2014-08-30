<?php

// echo __FILE__;
// die();
require_once Mage::getModuleDir('controllers', 'Mage_Customer') . '/AccountController.php';

class Training_Routing_Customer_AccountController extends Mage_Customer_AccountController {
	
	public function loginPostAction() {
		$url = Mage::getUrl('catalog/category/view', array('id' => 10));
		$session = Mage::getSingleton('customer/session');
		$session->setAfterAuthUrl($url);

		return parent::loginPostAction();
	}

}