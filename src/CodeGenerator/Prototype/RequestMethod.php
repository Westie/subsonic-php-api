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
	 *	Arguments
	 */
	public $arguments = [];
	
	
	/**
	 *	Set method
	 */
	public function setMethod($method)
	{
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
	 *	Add argument
	 */
	public function addArgument(RequestMethodArgument $argument)
	{
		$this->arguments[] = $argument;
	}
}