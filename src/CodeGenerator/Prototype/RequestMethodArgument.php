<?php


namespace OUTRAGElib\Subsonic\CodeGenerator\Prototype;


class RequestMethodArgument
{
	/**
	 *	Variable name
	 */
	public $variable = null;
	
	
	/**
	 *	Required?
	 */
	public $required = null;
	
	
	/**
	 *	Default value
	 */
	public $default = null;
	
	
	/**
	 *	Description
	 */
	public $description = null;
	
	
	/**
	 *	Set variable
	 */
	public function setVariable($variable)
	{
		$variable = strval($variable[0]->asXml() ?? null);
		$variable = strip_tags($variable);
		$variable = trim($variable);
		
		$this->variable = $variable;
	}
	
	
	/**
	 *	Set required
	 */
	public function setRequired($required)
	{
		$required = strval($required[0]->asXml() ?? null);
		$required = strip_tags($required);
		$required = trim($required);
		
		$this->required = $required;
	}
	
	
	/**
	 *	Set variable
	 */
	public function setDefault($default)
	{
		$default = strval($default[0]->asXml() ?? null);
		$default = strip_tags($default);
		$default = trim($default);
		
		$this->default = $default;
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
}