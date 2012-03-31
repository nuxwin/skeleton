<?php

class iMSCP_Gui_Controller_Ftp extends iMSCP_Controller_Action
{
	/**
	 * Delete an Ftp user account
	 *
	 * @return void
	 */
	public function deleteFtpUserAction()
	{
		$request = $this->_request();
		$ftpUserId = intval($request->getParam('ftpUserId', null));

		// We want deal with an FTP user entity so we must first get the entity manager instance

		try {
			// Getting current user identify
			$user = iMSCP_Authentication::getInstance()->getIdentity();

			// Entity manager instance
			$em = iMSCP_Api_EntityManager::getInstance();

			// We want delete an FTP user so we retrieve it from the datastore by using our API
			$ftpUser = $em->findBy(array('id' => $ftpUserId, 'owner_id' => $user->id));

			if(!$ftpUser) {
				// Ftp account not found - Probably a wrong request...
				setPageMessage(tr('Unable to found Ftp user with Id %s', $ftpUserId), 'error');
				iMSCP_Registry::get('Log')->warn(sprintf('%s tried to deleted an inexistent Ftp account', $user->username));
			} else {
				// Here, we get the API proxy instance and will call the method ftp() on it that return an ftp dispatcheableAction
				// object (ftp) on which we dispatch the deleteFtpUser action over all declared servers that manage the Ftp service.
				$response = iMSCP_Registry::get('api')->ftp->deleteFtpUser($ftpUser); // TIMEOUT for response can be customized here

				############################################
				// Alternate way for the code line above is:
				$ftpApi = new iMSCP_Api_Modules_Ftp_Api();
				$response = $ftpApi->deleteFtpUser($ftpUser);
				############################################

				if($response->isSuccess()) {
					setPageMessage(tr('Ftp account successfully deleted'), 'success');
					iMSCP_Registry::get('Log')->info(sprintf('%s deleted Ftp account with id %s', $user->username, $ftpUserId));
				} else {
					setPageMessage(tr('Ftp account deletion failed.'));
					iMSCP_Registry::get('Log')->error(sprintf('%s was unable to delete Ftp account with id %s', $user->username, $ftpUserId));
				}
			}
		} catch(Exception $e) {
			setPageMessage(tr('Ftp account creation failed.'));
			iMSCP_Registry::get('Log')->error($e->toString);
		}

		$this->_redirect('ftp/list');
	}
}


redirectTo('ftp/list');
