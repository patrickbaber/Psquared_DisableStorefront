<?php

class Psquared_DisableStorefront_Helper_Data extends Mage_Core_Helper_Data
{
	public function isAdminUserLoggedIn() {
		$sessionId = isset($_COOKIE['adminhtml']) ? $_COOKIE['adminhtml'] : false;
		$session = false;
		if($sessionId) {
			$session = Mage::getSingleton('core/resource_session')->read($sessionId);
		}

		$loggedIn = false;
		if($session) {
			if(stristr($session, 'Mage_Admin_Model_User'))
			{
				$loggedIn = true;
			}
		}

		return $loggedIn;
	}
}
