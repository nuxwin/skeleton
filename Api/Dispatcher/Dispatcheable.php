<?php

/**
 * Abstract class for dispatcheable action
 */
abstract class iMSCP_Api_Dispatcher_Dispatcheable
{
	/**
	 * @var iMSCP_Api_Dispatcher
	 */
	protected $_dispatcher;

	/**
	 * Returns dispatcher instance.
	 *
	 * @return iMSCP_Api_Dispatcher
	 */
	public function getDispatcher()
	{
		if(null === $this->_dispatcher) {
			$this->_dispatcher = new iMSCP_Api_Dispatcher();
		}

		return $this->_dispatcher;
	}
}
