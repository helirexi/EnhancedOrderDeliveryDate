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
 
class Softprodigy_Deliverydate_Model_Config_Dateformat extends Mage_Core_Model_Config_Data
{

	/**
	* Get possible sharing configuration options
	*
	* @return array
	*/
	public function toOptionArray()
	{
		return array(
			'd/M/Y' => Mage::helper('deliverydate')->__('d/M/Y'),
			'M/d/y' => Mage::helper('deliverydate')->__('M/d/y'),
			'd-M-Y' => Mage::helper('deliverydate')->__('d-M-Y'),
			'M-d-y' => Mage::helper('deliverydate')->__('M-d-y'),
			'm.d.y' => Mage::helper('deliverydate')->__('m.d.y'),
			'd.M.Y' => Mage::helper('deliverydate')->__('d.M.Y'),
			'M.d.y' => Mage::helper('deliverydate')->__('M.d.y'),
			'F j ,Y'=> Mage::helper('deliverydate')->__('F j ,Y'),
			'D M j' => Mage::helper('deliverydate')->__('D M j'),
			'Y-m-d' => Mage::helper('deliverydate')->__('Y-m-d')
		);
	}

}
