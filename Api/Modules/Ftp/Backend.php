<?php

/**
 * Backend class for the Ftp service
 */
class iMSCP_Api_Modules_Ftp_Backend
{

	/**
	 * @var iMSCP_EntityManager
	 */
	protected $_em;

	/**
	 * Ftp backend adapter
	 *
	 * @var iMSCP_Api_Modules_Ftp_Backend_interface
	 */
	protected $_adapter;

	/**
	 * Constructor
	 *
	 * @param iMSCP_Api_Module_Server_Models_server
	 */
	public function __constructor(iMSCP_Api_Module_Server_Models_server $server)
	{
		$this->_em = iMSCP_Registry::get('em');

		$services = $server->getServices();
		$adapter = 'iMSCP_Api_Modules_Ftp_Backend_Adapter_' . $services['ftp']['server'];
		$this->_adapter = new $adapter();
	}

	/**
	 * Create the given Ftp account
	 */
	public function createFtpUser(iMSCP_Api_Modules_Ftp_Models_User $user)
	{
		$this->adapter->createFtpUser($user);
		$this->_em->persist($user);
		$this->_em->flush();
	}

	/**
	 * Update the given Ftp account
	 */
	public function updateFtpUser(iMSCP_Api_Modules_Ftp_Models_User $user)
	{
		$this->adapter->updateFtpUser($user);
		$this->_em->persist($user);
		$this->_em->flush();
	}

	/**
	 * Delete the given Ftp account
	 */
	public function deleteFtpUser(iMSCP_Api_Modules_Ftp_Models_User $user)
	{
		$this->adapter->deleteFtpUser($user);
		$this->_em->remove($user);
		$this->_em->flush();
	}

}
