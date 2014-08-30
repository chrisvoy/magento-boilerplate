<?php

class Training_Render_Block_Registry extends Mage_Core_Block_Template {

	public function getTestRegistry() {
		$testRegistry = $this->getData('test_registry');
		if(is_null($testRegistry)) {
			$testRegistry = Mage::registry('test_registry');
			$this->setData('test_registry');
		}
		return $testRegistry;
	}
}