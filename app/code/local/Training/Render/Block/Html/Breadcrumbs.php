<?php

class Training_Render_Block_Html_Breadcrumbs extends Mage_Page_Block_Html_Breadcrumbs {

	protected function _prepareLayout() {
		$this->addCrumb('test', array('label'=>'test'));
		parent::_prepareLayout();
	}
}