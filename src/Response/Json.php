<?php


namespace OUTRAGElib\Subsonic\Response;

use GuzzleHttp\Psr7\Response;
use OUTRAGElib\Subsonic\ResponseInterface;


/**
 *	Response interface
 */
class Json implements ResponseInterface
{
	/**
	 *	Store items
	 */
	private $response = null;
	
	
	/**
	 *	Store items
	 */
	private $results = null;
	
	
	/**
	 *	Constructor
	 */
	public function __construct($response, $responseTarget)
	{
		$this->response = strval($response->getBody());
		
		$json = json_decode($this->response);
		
		foreach($responseTarget as $responseTargetItem)
		{
			if(isset($json->{"subsonic-response"}->{$responseTargetItem}))
				$this->results = $json->{"subsonic-response"}->{$responseTargetItem};
		}
		
		return;
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
		return $this->results;
	}
}