<?php

/**
 * Interface for the Ftp configuration storage
 */
interface iMSCP_Api_Modules_Ftp_Backend_Adapter_Storage_Interface
{
	/**
	 * Create the given Ftp account entry
	 *
	 * @return true on success, false otherwise
	 */
	public function createConfigEntry(iMSCP_API_Modules_Ftp_Models_User $user);

	/**
	 * Update the given Ftp account entry
	 *
	 * @return true on success, false otherwise
	 */
	public function updateConfigEntry(iMSCP_API_Modules_Ftp_Models_User $user);

	/**
	 * Delete the given Ftp account entry
	 *
	 * @return true on success, false otherwise
	 */
	public function deleteConfigEntry(iMSCP_API_Modules_Ftp_Models_User $user);

}
