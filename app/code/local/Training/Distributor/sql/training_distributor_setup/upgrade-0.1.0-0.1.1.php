<?php

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$tableName = $installer->getTable('training_distributor/distributor');

$installer->getConnection()->addColumn($tableName, 'comment', array(
	'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
	'nullable' => true,
	'length' => '1k',
	'comment' => 'Comment Field',
    'after' => 'name'
));

$installer->getConnection()->changeColumn($tableName, 'modified_at', 'updated_at', array(
	'type' => Varien_Db_Ddl_Table::TYPE_DATETIME,
	'nullable' => false,
	'comment' => 'Updated At'
));

$installer->endSetup();