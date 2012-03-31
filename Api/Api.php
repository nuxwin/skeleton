<?php

/**
 * i-MSCP API class
 */
class iMSCP_Api {

	/**
	 * @var iMSCP_Api
	 */
	protected static $_instance;

	private function __construct() { }
	private function __clone() { }

	/**
	 * Implement singleton design pattern
	 *
	 * @return iMSCP_Api
	 */
	public static function getInstance()
	{
		if(null === self::$_instance) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Proxy to API classes
	 *
	 * @param $method
	 * @param $args
	 * @return mixed
	 * @throws iMSCP_Api_Exception
	 */
	public function __call($method, $args)
	{
		if(class_exists(($apiClass = "iMSCP_Api_" . strtoupper($method) . '_Api'))) {
			return new $apiClass();
		} else {
			throw new iMSCP_Api_Exception(sprintf('Unable to found the %s API class.', $apiClass));
		}
	}

}
