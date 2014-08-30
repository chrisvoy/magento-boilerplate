<?php

ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
umask(0);

require_once 'app/Mage.php';
Mage::setIsDeveloperMode(true);
Mage::app();

$classAlias = 'training_distributor/distributor';

/** @var Training_Distributor_Model_Distributor $model */
$model = Mage::getModel($classAlias);

if(! is_object($model) || ! $model instanceof Mage_Core_Model_Abstract) {
	echo "The model is broken\n";
	print_r($model);
	exit();
}

$resource = $model->getResource();
if(! is_object($resource) || ! $resource instanceof Mage_Core_Model_Resource_Db_Abstract) {
	echo "The resource model is broken\n";
	print_r($resource);
	exit();
}

$table = $resource->getMainTable();
if(! is_string($table) ) {
	echo "Resource model table configuration is broken\n";
	print_r($table);
	exit();
}

$collection = $model->getCollection();
if(! is_object($collection) || ! $collection instanceof Mage_Core_Model_Resource_Db_Collection_Abstract) {
	echo "The collection is broken\n";
	print_r($collection);
	exit();
}

$collectionModel = $collection->getNewEmptyItem();
if(! is_object($collectionModel) || get_class($collectionModel) != get_class($model)) {
	echo "The collection Model is broken\n";
	print_r($collectionModel);
	exit();
}

$model->load('test@example.com', 'email');
if( $model->getId() ) {
	$model->delete();
}
$model->setData(array());
$model->setEmail('test@example.com');
$model->setName('Test Distributor');
$model->setComment('This is a comment');
$model->save();

echo "All GOOD!\n";