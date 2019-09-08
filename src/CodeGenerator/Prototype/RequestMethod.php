<?php


namespace OUTRAGElib\Subsonic\CodeGenerator\Prototype;


class RequestMethod
{
	/**
	 *	Method name
	 */
	public $method = null;
	
	
	/**
	 *	URL endpoint
	 */
	public $endpoint = null;
	
	
	/**
	 *	Description
	 */
	public $description = null;
	
	
	/**
	 *	Response target
	 */
	public $responseTarget = null;
	
	
	/**
	 *	Response target (if there is an error)
	 */
	public $responseErrorTarget = null;
	
	
	/**
	 *	Arguments
	 */
	public $arguments = [];
	
	
	/**
	 *	Set method
	 */
	public function setMethod($method)
	{
		if(!is_string($method))
			$method = strval($method[0]->asXml() ?? null);
		
		$method = strip_tags($method);
		$method = trim($method);
		
		$this->method = $method;
	}
	
	
	/**
	 *	Set endpoint
	 */
	public function setEndpoint($endpoint)
	{
		if(!is_string($endpoint))
			$endpoint = strval($endpoint[0]->asXml() ?? null);
		
		$endpoint = strip_tags($endpoint);
		$endpoint = str_replace("http://your-server", "", $endpoint);
		$endpoint = trim($endpoint);
		
		$this->endpoint = $endpoint;
	}
	
	
	/**
	 *	Set description
	 */
	public function setDescription($description)
	{
		if(!is_string($description))
			$description = strval($description[0]->asXml() ?? null);
		
		$description = strip_tags($description);
		$description = preg_replace('/&#13;/', '', $description);
		$description = preg_replace('/\s+/', ' ', $description);
		$description = preg_replace('/\t/', ' ', $description);
		$description = html_entity_decode($description);
		$description = trim($description);
		
		$this->description = $description;
	}
	
	
	/**
	 *	Set response target
	 */
	public function setResponseTarget($target)
	{
		if(!is_string($target))
			$target = strval($target[0]->asXml() ?? null);
		
		$target = strip_tags($target);
		$target = trim($target);
		$target = trim($target, "<>");
		
		$this->responseTarget = $target;
	}
	
	
	/**
	 *	Set error response target
	 */
	public function setResponseErrorTarget($target)
	{
		if(!is_string($target))
			$target = strval($target[0]->asXml() ?? null);
		
		$target = strip_tags($target);
		$target = trim($target);
		$target = trim($target, "<>");
		
		$this->responseErrorTarget = $target;
	}
	
	
	/**
	 *	Add argument
	 */
	public function addArgument(RequestMethodArgument $argument)
	{
		$this->arguments[] = $argument;
	}
}