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
 
class Softprodigy_Deliverydate_Block_Adminhtml_Deliverydate_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('deliverydate_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('deliverydate')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('deliverydate')->__('Item Information'),
          'title'     => Mage::helper('deliverydate')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('deliverydate/adminhtml_deliverydate_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}
