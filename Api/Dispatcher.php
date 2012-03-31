<?php

/**
 * Dispatcher class
 */
class iMSCP_Api_Dispatcher
{
	/**
	 * @var Zend_Db_Table
	 */
	protected $_db;

	/**
	 * @var iMSCP_Api_Modules_Server_Api
	 */
	protected $_server;

	/**
	 * Constructor
 	 */
	public function __constructor()
	{
		$this->_server = new iMSCP_Api_Modules_Server_Api();
	}

	/**
	 * Dispatch the given action through all server(s) that provide such service
	 *
	 * @param $service
	 * @param $action
	 * @param array $args
	 * @return iMSCP_Api_Dispatcher_Response
	 */
	public function dispatch($service, $action, array $args)
	{
		foreach($this->_server->getServersByService($service) as $server) {
			$ssh = new iMSCP_Api_Ssh($server->getHostname, $server->getCredentials);

			/** @var $remoteResponse  */
			$remoteResponse = $ssh->execute($action, json_encode($args));

			if($remoteResponse->hasFailed()) {
				$response = new iMSCP_Api_Dispatcher_Response();
				$response->setStatus($remoteResponse->getStatus());
				$response->setMessage($remoteResponse->getMessage());

				return response;
			}
		}

		$response = new iMSCP_Api_Dispatcher_Response();
		$response->setStatus(200);
		$response->setMessage('success');

		return $response;
	}
}

