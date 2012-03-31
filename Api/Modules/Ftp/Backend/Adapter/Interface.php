<?php

/**
 * Backend interface for the Ftp service
 */
interface iMSCP_Api_Modules_Ftp_Backend_interface
{
	/**
	 * Create the given Ftp account
	 *
	 * @abstract
	 * @param iMSCP_Api_Modules_Ftp_Model_User $user
	 */
	public function createFtpUser(iMSCP_Api_Modules_Ftp_Model_User $user);


	/**
	 * Update the given Ftp account
	 *
	 * @abstract
	 * @param iMSCP_Api_Modules_Ftp_Model_User $user
	 */
	public function updateFtpUser(iMSCP_Api_Modules_Ftp_Model_User $user);


	/**
	 * Delete the given Ftp account
	 *
	 * @abstract
	 * @param iMSCP_Api_Modules_Ftp_Model_User $user
	 */
	public function deleteFtpUser(iMSCP_Api_Modules_Ftp_Model_User $user);
}
