<?php

/** @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();


$table = $installer->getTable('training_distributor/distributor');

if ($installer->tableExists($table)) {
	$installer->getConnection()->dropTable($table);
}

/** @var $ddlTable Varien_Db_Ddl_Table */
$ddlTable = $installer->getConnection()->newTable($table);

$ddlTable->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'primary'  => true,
		'identity' => true,
		'unsigned' => true,
		'nullable' => false,
), 'Entity ID')
->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => false,
), 'Distributor Name')
->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => false,
		'default'  => ''
), 'Distributor Email')
->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		'nullable' => false,
), 'Created At')
->addColumn('modified_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		'nullable' => false,
), 'Modified At')
->addIndex(
		$installer->getIdxName($table, array('name')),
		array('name'),
		array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE)
)
->addIndex(
		$installer->getIdxName($table, array('email')),
		array('email'),
		array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE)
)
->setComment('Distributor Training Example Entity');

$installer->getConnection()->createTable($ddlTable);


$installer->endSetup();