<?php

class Training_Distributor_Model_Resource_Distributor extends Mage_Core_Model_Resource_Db_Abstract {
	
	protected function _construct() {
		// Set the table alias and the primary key
		$this->_init('training_distributor/distributor', 'entity_id');
	}
	
	protected function _beforeSave(Mage_Core_Model_Abstract $object) {
		$now = Varien_Date::now();
		$object->setUpdatedAt($now);
		if($object->isObjectNew()) {
			$object->setCreatedAt($now);
		}
		return parent::_beforeSave($object);
	}
}