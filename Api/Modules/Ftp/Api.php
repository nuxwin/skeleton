<?php

/**
 * Provide API for the Ftp service.
 *
 * @author Laurent Declercq <l.declercq@nuxwin.com>
 */
class iMSCP_Api_Modules_Ftp_Api extends iMSCP_Api_Dispatcher_Dispatcheable
{
	/**
	 * Add an FTP user account
	 *
	 * @param array $params
	 * @return iMSCP_API_Dispatcher_Response
	 */
	public function addFtpUser(array $params)
	{
		// onBeforeAddFtUser

		return $this->getDispatcher()->dispatch('ftp', __FUNCTION__, $params);

		// onAfterAddFtpUser
	}

	/**
	 * Update an FTP user account
	 *
	 * @param array $params
	 * @return iMSCP_API_Dispatcher_Response
	 */
	public function updateFtpUser(array $params)
	{
		// onBeforeUpdateFtpUser

		return $this->getDispatcher()->dispatch('ftp', __FUNCTION__, $params);

		// onAfterUpdateFtpUser
	}

	/**
	 * Delete an FTP user account
	 *
	 * @param iMSCP_API_Modules_Ftp_Model_User $ftpUserId
	 * @return iMSCP_Api_Dispatcher_Response
	 */
	public function deleteFtpUser(iMSCP_API_Modules_Ftp_Model_User $ftpUserId)
	{
		// onBeforeDeleteFtpUser

		return $this->getDispatcher()->dispatch('ftp', __FUNCTION__, $ftpUserId);

		// onAfterDeleteFtpUser
	}
}

