<?php

class Training_Distributor_Model_Distributor extends Mage_Core_Model_Abstract {
	
	protected function _construct() {
		// Set the resource model class alias
		$this->_init('training_distributor/distributor');
	}
	
	protected function _beforeSave() {
		if(! Zend_Validate::is($this->getEmail(), 'EmailAddress')) {
			Mage::throwException('Invalid Email Address');
		}
	}
}