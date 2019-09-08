<?php


namespace OUTRAGElib\Subsonic\CodeGenerator;

use \Nette\PhpGenerator\ClassType;
use \Nette\PhpGenerator\PhpFile;
use \Nette\PhpGenerator\PhpNamespace;
use \OUTRAGElib\Subsonic\CodeGenerator\Prototype\RequestMethod;


class RequestGenerator
{
	/**
	 *	Create request
	 */
	public function createRequest($root, RequestMethod $method)
	{
		# class names
		$requestAbstractClass = 'OUTRAGElib\Subsonic\RequestAbstract';
		$requestNamespace = 'OUTRAGElib\Subsonic\Request';
		$clientClass = 'OUTRAGElib\Subsonic\Client';
		$requestClass = ucfirst($method->method);
		$responseClass = 'OUTRAGElib\Subsonic\Response\\'.ucfirst($method->method);
		
		# create our class & namespace
		$file = new PhpFile();
		
		$namespace = $file->addNamespace($requestNamespace);
		$namespace->addUse($clientClass, 'SubsonicClient');
		$namespace->addUse($requestAbstractClass);
		$namespace->addUse($responseClass, $requestClass.'Response');
		
		$class = $namespace->addClass($requestClass);
		$class->addComment("This class is automatically generated. All changes to this may (or will) be overwritten");
		
		if(!empty($method->description))
		{
			$class->addComment('');
			$class->addComment(wordwrap($method->description));
		}
		
		$class->setExtends($requestAbstractClass);
		
		# create our variable names
		foreach($method->arguments as $arg)
		{
			$prop = $class->addProperty($arg->variable);
			$prop->setVisibility("public");
			
			if(!empty($arg->description))
				$prop->addComment(wordwrap($arg->description));
			
			if(!empty($arg->required))
				$prop->addComment("@required ".$arg->required);
			
			if(!empty($arg->default))
				$prop->addComment("@default ".$arg->default);
		}
		
		# populate properties within this object from an array (for example, if someone using
		# this library has decided to pass an array instead of the request)
		$func = $class->addMethod("fromArray");
		$func->addComment("Populate this object from an array");
		$func->addParameter("input")->setTypeHint('array');
		
		foreach($method->arguments as $arg)
		{
			$func->addBody('if(array_key_exists('.json_encode($arg->variable).', $input))');
			$func->addBody("\t".'$this->'.$arg->variable.' = $input['.json_encode($arg->variable).'];');
			$func->addBody('');
		}
		
		$func->addBody('return $this;');
		
		# create call to serialize all valid variables to an array
		$func = $class->addMethod("toArray");
		$func->setReturnType("array");
		$func->addComment("Serialize this object to an array");
		$func->addBody('return [');
		
		foreach($method->arguments as $arg)
			$func->addBody("\t".json_encode($arg->variable).' => $this->'.$arg->variable.',');
		
		$func->addBody('];');
		
		# create call to execute this particular API call
		$func = $class->addMethod("execute");
		$func->addComment("Request information from API endpoint, using a Guzzle client");
		#$func->setReturnType($responseClass);
		$func->addParameter("client")->setTypeHint($clientClass);
		$func->setBody('return $client->executeRequest("'.$method->endpoint.'", $this->toArray());');
		
		# output file
		file_put_contents(implode(DIRECTORY_SEPARATOR, [ $root, $requestClass.".php" ]), (string) $file);
	}
}