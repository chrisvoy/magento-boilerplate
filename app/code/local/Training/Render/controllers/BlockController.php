<?php

/**
 * @var Training_Render_Block_Hello $block
 */

class Training_Render_BlockController extends Mage_Core_Controller_Front_Action {

	public function indexAction() {
		$block = $this->getLayout()->createBlock('training_render/hello');
		$output = $block->toHtml();

		$this->getResponse()->setBody($output);
	}

	public function templateAction() {

		/** @var Training_Render_Block_Hello $block */
		$block = $this->getLayout()->createBlock('core/template', 'name.of.the.block');
		$block->setTemplate('training/render/first.phtml');
		$output = $block->toHtml();
		$this->getResponse()->setBody($output);
	}

	public function registryAction() {

		Mage::register('test_registry','test_registry');

		$block = $this->getLayout()->createBlock('training_render/registry');
		$block->setTemplate('training/render/registry.phtml');
		$output = $block->toHtml();
		$this->getResponse()->setBody($output);
	}

	public function textListAction() {
		$block = $this->getLayout()->createBlock('core/text_list');
		
		$child = $this->getLayout()->createBlock('core/text')->setText('Block 1 <br>');
		$block->append($child, 'first');
		$child = $this->getLayout()->createBlock('core/text')->setText('Block 2 <br>');
		$block->insert($child);
		$child = $this->getLayout()->createBlock('core/text')->setText('Block 3 <br>');
		$block->insert($child);

		$this->getResponse()->setBody($block->toHtml());
	}

	public function layoutAction() {
		$this->loadLayout();
		// $xml = $this->getLayout()->getUpdate()->asString();
		// $this->getResponse()->setBody($xml);
		// $this->getResponse()->setHeader('content-type', 'text/plain', true);
		$this->renderLayout();
	}

	public function newLayoutAction() {
		$this->loadLayout('wow_something_new')->renderLayout();
	}





}