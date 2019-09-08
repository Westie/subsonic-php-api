<?php


namespace OUTRAGElib\Subsonic\CodeGenerator;

use \DOMXPath;
use \Exception;
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
		"stream" => "binary",
		"download" => "binary",
		"hls" => "binary",
		"getCaptions" => "binary",
		"getCoverArt" => "binary",
		"getAvatar" => "binary",
		"jukeboxControl" => "jukeboxStatus|jukeboxPlaylist",
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
		
		# and what about the return types?
		# there's a pattern here, we're going to look for the last paragraph, the first code
		# item should be 'subsonic-response' - if this exists, and the second code block
		# does not exist, we can presume it to not exist
		$last = $result->find("p:last-child")[0] ?? null;
		
		if(isset($this->responseTargetOverrides[$method->method]))
		{
			$method->setResponseTarget($this->responseTargetOverrides[$method->method]);
		}
		elseif(!empty($last))
		{
			$codes = $last->find("code");
			
			if(isset($codes[0]) && strval($codes[0]) === "<subsonic-response>")
			{
				if(isset($codes[1]))
					$method->setResponseTarget($codes[1]);
			}
			else
			{
				if(empty($method->responseTarget))
					throw new Exception("Undefined response target for ".$method->method);
			}
		}
		
		return $method;
	}
}