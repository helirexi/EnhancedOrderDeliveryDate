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
 
class Softprodigy_Deliverydate_Model_Deliverydate extends Mage_Core_Model_Abstract
{
	const TYPE_SHIPPING_METHOD    = 1;
	const TYPE_REVIEW_PAGE    = 2;
	public function _construct()
	{
		parent::_construct();
		$this->_init('deliverydate/deliverydate');
	}

	public function toOptionArray()
	{
		return array(
			self::TYPE_SHIPPING_METHOD => Mage::helper('adminhtml')->__('Shipping Method'),
			self::TYPE_REVIEW_PAGE => Mage::helper('adminhtml')->__('Order Review Page')
		);
	}
}
