<?php

/* @var $installer Mage_Catalog_Model_Resource_Setup */
$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');

$installer->startSetup();

$germanStoreId = Mage::app()->getStore('german')->getId();

$attribute = Mage::getSingleton('eav/config')->getAttribute('catalog_product', 'jedi');
$found = false;
foreach ($attribute->getSource()->getAllOptions() as $option) {
    if ($option['label'] == 'Luke') {
        $found = true; break;
    }
}

if (! $found) {
    // Add new options to an existing select attribute
    $installer->addAttributeOption(array(
        'attribute_id' => $installer->getAttributeId('catalog_product', 'jedi'),
        // again, 'a' is a temporary ID placeholder to map the order and the
        // value together
        'order' => array('a' => 40),
        'value' => array(
            'a' => array(0 => 'Luke', $germanStoreId => 'German Luke')
        )
    ));
}

$installer->endSetup();