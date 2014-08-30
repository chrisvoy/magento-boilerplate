<?php

class Training_Practice_Model_Observer {

	public function catalogProductLoadAfter(Varien_Event_Observer $args) {
		/** @var Mage_Catalog_Model_Product $product */
		$product = $args->getData('product');
		$product = $args->getProduct();

		$product->setSpecialPrice($product->getPrice() - 1);
	}

	public function catalogProductCollectionLoadAfter(Varien_Event_Observer $args) {
		/** @var Mage_Catalog_Model_Product $product */
		$collection = $args->getData('collection');

		foreach($collection as $product) {
			$product->setFinalPrice($product->getPrice() - 1);
			$product->setSpecialPrice($product->getPrice() - 1);
		}
	}
}