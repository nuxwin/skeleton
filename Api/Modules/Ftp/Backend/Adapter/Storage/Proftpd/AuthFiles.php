<?php

/**
 * Implements iMSCP_Api_Modules_Adapter_Storage_Interface SQL storage
 */
class iMSCP_Api_Modules_Adapter_Storage_Proftpd_AuthFiles implements iMSCP_Api_Modules_Ftp_Backend_Adapter_Storage_Interface
{
	/**
	 * Create the given Ftp account entry
	 */
	public function createConfigEntry(iMSCP_API_Modules_Ftp_Models_User $user)
	{
		$perlWrapper = new iMSCP_PerlConffileEditor();
		$perlWrapper->createConfigEntry('proftpd', serialize($user));

		return true;
	}

	/**
	 * Update the given Ftp account entry
	 */
	public function updateConfigEntry(iMSCP_API_Modules_Ftp_Models_User $user)
	{
		$perlWrapper = new iMSCP_PerlConffileEditor();
		$perlWrapper->updateConfigEntry('proftpd', serialize($user));

		return true;
	}

	/**
	 * Delete the given Ftp account entry
	 */
	public function deleteConfigEntry(iMSCP_API_Modules_Ftp_Models_User $user)
	{
		$perlWrapper = new iMSCP_PerlConffileEditor();
		$perlWrapper->deleteConfigEntry('proftpd', serialize($user));

		return true;
	}
}

