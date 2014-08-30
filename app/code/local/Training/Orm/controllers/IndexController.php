<?php

class Training_Orm_IndexController extends Mage_Core_Controller_Front_Action {

	public function rootCategoriesAction() {
		$this->getResponse()->setHeader('content-type', 'text/plain', true);
		
		// Create Store Collection
		$stores = Mage::getResourceModel('core/store_collection');
		// $store = Maget::getModel('core/store')->getCollection();
		
		// Get Root Category Id
		$rootCategoryIds = array();
		foreach($stores as $store) {
			$rootCategoryIds[] = $store->getRootCategoryId();
		}
		
		// Get Category Collection
		$categories = Mage::getModel('catalog/category')->getCollection();
		
		// Filter by Root Catefory Ids
		$categories->addFieldToFilter('entity_id', array('in' => $rootCategoryIds));
		$categories->addAttributeToSelect('name');

		// Display Stores with Root Categories
		foreach($stores as $store) {
			$category = $categories->getItemById($store->getRootCategoryId());
			$this->getResponse()->appendBody(
				"{$store->getName()} has the root category {$category->getName()}\n"
			);
		}		
	}
	
	public function categoryTreeAction() {
		
		$this->getResponse()->setHeader('content-type', 'text/plain', true);
		
		$resource = Mage::getResourceModel('training_orm/category');
		
		$output = $resource->getCategoryTree();
		
		$this->getResponse()->setBody($output);
	}
	
	public function indexAction() {
		echo "haha";
	}
}