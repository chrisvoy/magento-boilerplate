<?php

/** @var $installer Mage_Catalog_Model_Resource_Setup */
$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');

$installer->startSetup();

// This is an example for updateAttribute()
$installer->updateAttribute('catalog_product', 'my_attribute', 'frontend_label', 'My Test Attribute');

$installer->endSetup();