<?php

class Psquared_DisableStorefront_Model_Observer
{
	const CONFIG_ENABLED                = 'web/url/disable_storefront';
	const CONFIG_NOT_AFTER_BE_LOGIN     = 'web/url/not_after_be_login';

	public function checkRoute($observer)
	{
		// disable storefront
		if (Mage::getStoreConfig(self::CONFIG_ENABLED) == '1') {
			$isLoggedIn = Mage::helper('disablestorefront')->isAdminUserLoggedIn();

			// not after admin panel login
			if ($isLoggedIn && Mage::getStoreConfig(self::CONFIG_NOT_AFTER_BE_LOGIN) == '1') {
				return false;
			}

			$url = Mage::helper('adminhtml')->getUrl('adminhtml');
			Mage::app()->getResponse()->setRedirect($url)->sendResponse();
		}
	}
}