<?php

class Training_Practice_Model_Catalog_Product extends Mage_Catalog_Model_Product {
	
	public function validate() {
		if($this->getPrice() == 0) {
			Mage::throwException('Please specify a price greater that zero.');
		}

		return parent::validate();
	}
}