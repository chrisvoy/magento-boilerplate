<?php

class Training_Distributor_Model_Resource_Distributor_Collection 
	extends Mage_Core_Model_Resource_Db_Collection_Abstract {
	
	protected function _construct() {
		// Set model class alias
		$this->_init('training_distributor/distributor');
	}
}