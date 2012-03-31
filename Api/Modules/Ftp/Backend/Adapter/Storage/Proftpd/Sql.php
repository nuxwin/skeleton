<?php

/** @see iMSCP_Api_Modules_Ftp_Backend_Adapter_Storage_Interface */
require_once 'iMSCP/Api/Modules/Ftp/Backends/Adapter/Storage/Interface.php';

/**
 * Implements iMSCP_Api_Modules_Ftp_Backend_Adapter_Storage_Interface SQL storage
 */
class iMSCP_Api_Modules_Ftp_Backend_Adapter_Storage_Proftpd_Sql implements iMSCP_Api_Modules_Ftp_Backend_Adapter_Storage_Interface
{
	/**
	 * Create the given Ftp account entry
	 */
	public function createConfigEntry(iMSCP_API_Modules_Ftp_Models_User $user);
	{
		// Do something only if SQL storage is different than iMSCP master storage
	}

	/**
	 * Update the given Ftp account entry
	 */
	public function updateConfigEntry(iMSCP_API_Modules_Ftp_Models_User $user)
	{
		// Do something only if SQL storage is different than iMSCP master storage
	}

	/**
	 * Delete the given Ftp account entry
	 */
	public function deleteConfigEntry(iMSCP_API_Modules_Ftp_Models_User $user)
	{
		// Do something only if SQL storage is different than iMSCP master storage
	}
}
