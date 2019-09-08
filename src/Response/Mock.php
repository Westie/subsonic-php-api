<?php


namespace OUTRAGElib\Subsonic\Response;

use GuzzleHttp\Psr7\Response;
use OUTRAGElib\Subsonic\ResponseInterface;


/**
 *	Response interface
 */
class Mock implements ResponseInterface
{
	/**
	 *	Store items
	 */
	private $response = null;
	
	
	/**
	 *	Constructor
	 */
	public function __construct($response)
	{
		$this->response = $response;
	}
	
	
	/**
	 *	Get raw response
	 */
	public function getResponse()
	{
		return $this->response;
	}
	
	
	/**
	 *	Get results
	 */
	public function getResults()
	{
		return $this->response;
	}
}