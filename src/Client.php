<?php


namespace OUTRAGElib\Subsonic;

use \GuzzleHttp\Client as HttpClient;
use \OUTRAGElib\Subsonic\Response\Binary as BinaryResponse;
use \OUTRAGElib\Subsonic\Response\Json as JsonResponse;
use \OUTRAGElib\Subsonic\Response\Mock as MockResponse;


/**
 *	Client
 */
class Client
{
	/**
	 *	Subsonic API server
	 */
	protected $server;
	
	
	/**
	 *	Username
	 */
	protected $username;
	
	
	/**
	 *	Password
	 */
	protected $password;
	
	
	/**
	 *	HTTP client
	 */
	protected $httpClient;
	
	
	/**
	 *	Constructor
	 */
	public final function __construct($server, $username, $password)
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
	}
	
	
	/**
	 *	Execute request
	 */
	public final function executeRequest($endpoint, array $arguments, $responseTarget = null): ResponseInterface
	{
		if(empty($this->httpClient))
			$this->httpClient = $this->getHttpClient();
		
		$options = [
			"query" => $this->getDefaultArguments() + $arguments
		];
		
		$response = $this->httpClient->request("GET", $endpoint, $options);
		
		$success = true;
		
		if($responseTarget === null)
			return new MockResponse($success);
		elseif(in_array("binary", $responseTarget))
			return new BinaryResponse($response);
		else
			return new JsonResponse($response, $responseTarget);
	}
	
	
	/**
	 *	Get HTTP client
	 */
	public final function getHttpClient()
	{
		$options = [
			"base_uri" => $this->server,
		];
		
		return new HttpClient($options);
	}
	
	
	/**
	 *	Get default arguments
	 */
	protected final function getDefaultArguments()
	{
		return [
			"u" => $this->username,
			"p" => $this->password,
			"v" => "1.16.1",
			"c" => "OUTRAGElib/Subsonic (PHP)",
			"f" => "json",
		];
	}
	
	
	/**
	 *	Include the automatically generated list of shorthand methods
	 */
	use ClientRequestTrait;
}