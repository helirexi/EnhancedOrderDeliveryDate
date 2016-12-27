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
 
class Softprodigy_Deliverydate_Model_Observer
{				
	public function checkout_controller_onepage_save_shipping_method($observer)
	{
		if (Mage::getStoreConfig('deliverydate/deliverydate_general/on_which_page')==1){
			$request = $observer->getEvent()->getRequest();
			$quote =  $observer->getEvent()->getQuote();

			$desiredArrivalDate = Mage::helper('deliverydate')->getFormatedDeliveryDateToSave($request->getPost('shipping_arrival_date', ''));
			if (isset($desiredArrivalDate) && !empty($desiredArrivalDate)){
				$quote->setShippingArrivalDate($desiredArrivalDate);
				$quote->setShippingArrivalComments($request->getPost('shipping_arrival_comments'));
				$quote->save();
			}
		}

		return $this;
	}
}
