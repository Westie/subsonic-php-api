<?php


namespace OUTRAGElib\Subsonic;

use \GuzzleHttp\Client as HttpClient;


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
	public function __construct($server, $username, $password)
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
	}
	
	
	/**
	 *	Execute request
	 */
	public function executeRequest($endpoint, $arguments)
	{
		if(empty($this->httpClient))
			$this->httpClient = $this->getHttpClient();
		
		$response = $this->httpClient->request("GET", $endpoint, [
			"query" => $this->getDefaultArguments() + $arguments
		]);
		
		var_dump($response);
		
		echo $response->getBody();
		exit;
		
		var_dump($this->httpClient, $endpoint, $arguments);
		exit;
	}
	
	
	/**
	 *	Get HTTP client
	 */
	public function getHttpClient()
	{
		$options = [
			"base_uri" => $this->server,
		];
		
		return new HttpClient($options);
	}
	
	
	/**
	 *	Get default arguments
	 */
	protected function getDefaultArguments()
	{
		$salt = sha1(uniqid());
		
		return [
			"u" => $this->username,
			"p" => $this->password,
			"v" => "1.16.1",
			"c" => "OUTRAGElib/Subsonic (PHP)",
			"f" => "json",
		];
	}
}