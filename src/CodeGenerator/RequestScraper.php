<?php


namespace OUTRAGElib\Subsonic\CodeGenerator;

use \DOMXPath;
use \GuzzleHttp\Client as HttpClient;
use \OUTRAGElib\Subsonic\CodeGenerator\Prototype\RequestMethod;
use \OUTRAGElib\Subsonic\CodeGenerator\Prototype\RequestMethodArgument;


class RequestScraper
{
	/**
	 *	Target URL
	 */
	protected $url = "http://www.subsonic.org/pages/api.jsp";
	
	
	/**
	 *	Overrides (because the documentation can be very, very silly)
	 */
	protected $responseTargetOverrides = [
	];
	
	
	/**
	 *	Get methods
	 */
	public function getMethods()
	{
		$response = (new HttpClient())->request('GET', $this->url);
		
		$xml = XmlElement::loadHTML($response->getBody());
		
		$methods = [];
		$results = $xml->find("#main > div > div > section.box");
		
		# we do not want the first box, this is something to do with error
		# messages and everything
		array_shift($results);
		
		foreach($results as $result)
			$methods[] = $this->parseMethodBlock($result);
		
		return $methods;
	}
	
	
	/**
	 *	Parse method block
	 */
	public function parseMethodBlock(XmlElement $result)
	{
		# create our method
		$method = new RequestMethod();
		
		$method->setMethod($result->find("h3:nth-of-type(1)"));
		$method->setEndpoint($result->find("p:nth-of-type(1) > code:nth-of-type(1)"));
		$method->setDescription($result->find("p:nth-of-type(2)"));
		
		# if we have any arguments, proceed with adding these in
		$table = $result->find("table:nth-of-type(1)");
		
		if(!empty($table))
		{
			$rows = array_slice($result->find("tr"), 1);
			
			foreach($rows as $row)
			{
				$arg = new RequestMethodArgument();
				
				$arg->setVariable($row->find("td:nth-of-type(1) > code"));
				$arg->setRequired($row->find("td:nth-of-type(2)"));
				$arg->setDefault($row->find("td:nth-of-type(3)"));
				$arg->setDescription($row->find("td:nth-of-type(4)"));
				
				$method->addArgument($arg);
			}
		}
		
		return $method;
	}
}