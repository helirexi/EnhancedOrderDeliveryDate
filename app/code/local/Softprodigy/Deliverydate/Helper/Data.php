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
 
class Softprodigy_Deliverydate_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function getFormatedDeliveryDate($date = null)
	{
		if(empty($date) ||$date == null || $date == '0000-00-00 00:00:00'){
			return Mage::helper('deliverydate')->__("No Delivery Date Specified.");
		}

		$formatedDate = Mage::helper('core')->formatDate($date, 'medium');
		return $formatedDate; 
	}

	public function getFormatedDeliveryDateToSave($date = null)
	{
		if(empty($date) ||$date == null || $date == '0000-00-00 00:00:00'){
			return null;
		}

		$timestamp = null;
		try{
			$timestamp = strtotime($date);
			$dateArray = explode("-", $date);
			if(count($dateArray) != 3){
				return null;
			}
			$formatedDate = date('Y-m-d H:i:s',strtotime($date));
		} catch(Exception $e){
			return null;
		}                

		return $formatedDate;         
	}
	public function saveShippingArrivalDate($observer){

		$order = $observer->getEvent()->getOrder();
		if (Mage::getStoreConfig('deliverydate/deliverydate_general/on_which_page')==2){
			$desiredArrivalDate = Mage::helper('deliverydate')->getFormatedDeliveryDateToSave(Mage::app()->getRequest()->getParam('shipping_arrival_date'));
			if (isset($desiredArrivalDate) && !empty($desiredArrivalDate)){
				$order->setShippingArrivalComments(Mage::app()->getRequest()->getParam('shipping_arrival_comments'));
				$order->setShippingArrivalDate($desiredArrivalDate);
			}
		}else{
			$cart = Mage::getModel('checkout/cart')->getQuote()->getData();
			$desiredArrivalDate = Mage::helper('deliverydate')->getFormatedDeliveryDateToSave($cart['shipping_arrival_date']);
			$shipping_arrival_comments = $cart['shipping_arrival_comments'];
			if (isset($desiredArrivalDate) && !empty($desiredArrivalDate)){
				$order->setShippingArrivalComments($shipping_arrival_comments);
				$order->setShippingArrivalDate($desiredArrivalDate);
			}
		}
	}
	public function saveShippingArrivalDateAdmin($observer){

		$order = $observer->getEvent()->getOrder();
		$cart = Mage::app()->getRequest()->getParams();
		$desiredArrivalDate = Mage::helper('deliverydate')->getFormatedDeliveryDateToSave($cart['shipping_arrival_date_display']);
		$shipping_arrival_comments = $cart['shipping_arrival_comments'];
		if (isset($desiredArrivalDate) && !empty($desiredArrivalDate)){
			$order->setShippingArrivalComments($shipping_arrival_comments);
			$order->setShippingArrivalDate($desiredArrivalDate);
		}

	}

}
