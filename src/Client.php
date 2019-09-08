<?php


namespace OUTRAGElib\Subsonic;

use \GuzzleHttp\Client as HttpClient;
use \GuzzleHttp\Exception\ClientException as GuzzleClientException;
use \OUTRAGElib\Subsonic\Exception\MethodNotFound as MethodNotFoundException;
use \OUTRAGElib\Subsonic\Exception\Subsonic as SubsonicException;
use \OUTRAGElib\Subsonic\Exception\UndefinedError as UndefinedErrorException;
use \OUTRAGElib\Subsonic\Response\Binary as BinaryResponse;
use \OUTRAGElib\Subsonic\Response\Data as DataResponse;
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
		
		$data = null;
		$success = true;
		
		try
		{
			$response = $this->httpClient->request("GET", $endpoint, $options);
			
			# if the header is definitely application/json, then we can safely look into it
			# to see whether or not it contains an error state
			$headers = $response->getHeaders();
			
			if(in_array("application/json", $headers["Content-Type"]))
			{
				$data = json_decode((string) $response->getBody(), true);
				
				if(isset($data["subsonic-response"]["status"]))
				{
					if($data["subsonic-response"]["status"] === "failed")
					{
						$message = $data["subsonic-response"]["error"]["message"];
						$code = $data["subsonic-response"]["error"]["code"];
						
						throw new SubsonicException($message, $code);
					}
				}
			}
		}
		catch(GuzzleClientException $exception)
		{
			if($exception->getCode() === 404)
				throw new MethodNotFoundException("Method ".$endpoint." is not implemented", $exception->getCode(), $exception);
			else
				throw new UndefinedErrorException("An undefined error occurred within Guzzle", $exception->getCode(), $exception);
		}
		
		if($responseTarget === null)
			return new MockResponse($success);
		elseif(in_array("binary", $responseTarget))
			return new BinaryResponse($response);
		elseif(isset($data))
			return new DataResponse($data, $responseTarget);
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