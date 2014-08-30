<?php

/* @var $installer Mage_Catalog_Model_Resource_Setup */
$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');

$installer->startSetup();

$germanStoreId = Mage::app()->getStore('german')->getId();

$installer->addAttribute('catalog_product', 'jedi', array(
    'type'             => 'int',
    'input'            => 'select',
    'label'            => 'Jedi',
    'user_defined'     => 1,
    'group'            => 'General',
    'sort_order'       => 3,
    'is_configurable'  => 1,
    'visible_on_front' => 1,
    'required'         => 0,
    // default source model: 'source'           => 'eav/entity_attribute_source_table',
    'option'           => array(
        // a, b and c are ID placeholders to map the order and tha values together
        // before they are inserted
        'order' => array('a' => 10, 'b' => 20, 'c' => 30),
        'value' => array(
            'a' => array(0 => 'Yoda',    $germanStoreId => 'German Yoda'),
            'b' => array(0 => 'Obi-Wan',      $germanStoreId => 'Herman Obi-Wan'),
            'c' => array(0 => 'Vader', $germanStoreId => 'German Vader'),
        )
    )
));

$installer->endSetup();