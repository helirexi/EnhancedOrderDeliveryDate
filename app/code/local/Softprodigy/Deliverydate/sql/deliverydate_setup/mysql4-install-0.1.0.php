<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Softprodigy
 * @package    Softprodigy_Deliverydate
 * @copyright  Copyright (c) 2014 SoftProdigy <magento@softprodigy.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
 
$installer = $this;

$installer->startSetup();

$installer->run("CREATE TABLE IF NOT EXISTS {$this->getTable('deliverydate')} (
  `deliverydate_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `filename` varchar(255) NOT NULL default '',
  `content` text NOT NULL default '',
  `status` smallint(6) NOT NULL default '0',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`deliverydate_id`)
);");

try{
    $this->_conn->addColumn($this->getTable('sales_flat_quote'), 'shipping_arrival_date', 'datetime');
    $this->_conn->addColumn($this->getTable('sales_flat_quote'), 'shipping_arrival_comments', 'text');
    $this->_conn->addColumn($this->getTable('sales_flat_order'), 'shipping_arrival_date', 'datetime');
    $this->_conn->addColumn($this->getTable('sales_flat_order'), 'shipping_arrival_comments', 'text');
 
} catch (Exception $ex) {
    Mage::log($ex->getMessage());
}

$installer->endSetup(); 
