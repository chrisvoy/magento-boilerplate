<?php

class Training_Orm_Model_Resource_Category {
	
	public function getCategoryTree() {
		$category = Mage::getModel('catalog/category');
		$resource = $category->getResource();
		$adapter = $resource->getReadConnection();
		$table = $resource->getEntityTable();
		
		$select = $adapter->select()
			->from($table)
			->where('level=?', 1);
		$rows = $adapter->fetchAll($select);

		$output = '';
		foreach($rows as $row) {
			$category->setData($row);
			$output .= $this->_renderCategory($category);
		}
		
		return $output;
	}
	
	private function _renderCategory(Mage_Catalog_Model_Category $category) {
		$output = str_pad('', $category->getLevel()*3, ' ') . $category->getId() . "\n";
		
		foreach($this->_getChildCategories($category) as $row) {
			$category->setData($row);
			$output .= $this->_renderCategory($category);
		}
		return $output;
	}
	
	private function _getChildCategories(Mage_Catalog_Model_Category $category) {
		$resource = $category->getResource();
		$adapter = $resource->getReadConnection();
		$table = $resource->getEntityTable();
		
		$select = $adapter->select()
			->from($table)
			->where('parent_id=:parentId');
		
		return $adapter->fetchAll($select, array('parentId' => $category->getId()));
	}
}