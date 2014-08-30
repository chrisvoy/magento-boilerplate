<?php

/** @var $installer Mage_Catalog_Model_Resource_Setup */
$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');

$installer->startSetup();

if (! $installer->getAttributeId('catalog_product', 'my_attribute')) {

    $installer->addAttribute('catalog_product', 'my_attribute', array(
        'label' => 'My Attribute',
        'input' => 'text',
        'type' => 'varchar',
        'is_configurable' => 0,
        'required' => 0,
        'user_defined' => 0,
        //'group' => 'Prices' // EVERY ATTRIBUTE SET
    ));

}

$installer->addAttributeToSet('catalog_product', 'Default', 'General', 'my_attribute');

$installer->endSetup();