<?php

/** @see iMSCP_Api_Modules_Ftp_Backend_interface */
require_once 'iMSCP/Api/Modules/Ftp/Backend/Interface.php';

/**
 * Adapter class for the Proftpd server
 */
class iMSCP_Api_Modules_Ftp_Backend_Adapter_Proftpd implements iMSCP_Api_Modules_Ftp_Backend_interface
{
	/**
	 * Create the given Ftp account
	 */
	public function createFtpUser(iMSCP_Api_Modules_Ftp_Model_User $user)
	{
		$this->_getConfStorageImpl()->createConfigEntry($user);
		parent::createUser($user);
	}

	/**
	 * Update the given Ftp account
	 */
	public function updateFtpUser(iMSCP_Api_Modules_Ftp_Model_User $user)
	{
		$this->_getConfStorageImpl()->UpdateConfigEntry('proftpd', $user);
		parent::updateUser($user);
	}

	/**
	 * Delete the given Ftp account
	 *
	 */
	public function deleteFtpUser(iMSCP_Api_Modules_Ftp_Model_User $user)
	{
		$this->_getConfStorageImpl()->deleteConfigEntry($user);
		parent::deleteUser($user);
	}

	/**
	 * Returns proftpd conf storage implementation
	 *
	 * @return iMSCP_Api_Modules_Ftp_Backend_Adapter_Storage_Interface
	 */
	protected function _getConfStorageImpl()
	{
		$storage = $this->_config->ftp_storageType;
		$storage = 'iMSCP_Api_Modules_Ftp_Adapter_Proftpd_Storage_' . $storage;
		return new $storage();
	}
}
