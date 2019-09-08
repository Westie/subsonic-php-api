<?php


namespace OUTRAGElib\Subsonic;


/**
 *	Request abstraction class
 */
class RequestAbstract
{
	/**
	 *	Constructor
	 */
	public function __construct($input = null)
	{
		if(is_array($input))
			$this->fromArray($input);
	}
}