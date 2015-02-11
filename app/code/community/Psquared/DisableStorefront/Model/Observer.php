<?php

class Psquared_DisableStorefront_Model_Observer
{
	const CONFIG_ENABLED = 'web/url/disable_storefront';

    public function checkRoute($observer)
    {
		if (Mage::getStoreConfig(self::CONFIG_ENABLED) == '1') {
			$url = Mage::helper('adminhtml')->getUrl('adminhtml');
			Mage::app()->getResponse()->setRedirect($url)->sendResponse();
		}
    }
}