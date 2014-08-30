<?php

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = Mage::getResourceModel('core/setup', 'core_setup');

$installer->startSetup();


$scopeId = Mage::app()->getStore('german')->getId();
$scope = 'stores'; // "default" or "websites" or "stores"

// For default scope settings the last two arguments can be omitted
$installer->setConfigData('sales/general/hide_customer_ip', 1, $scope, $scopeId);


$installer->endSetup();