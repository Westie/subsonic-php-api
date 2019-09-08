<?php


namespace OUTRAGElib\Subsonic\CodeGenerator;

use \Nette\PhpGenerator\ClassType;
use \Nette\PhpGenerator\PhpFile;
use \Nette\PhpGenerator\PhpNamespace;
use \OUTRAGElib\Subsonic\CodeGenerator\Prototype\RequestMethod;


class ClientRequestGenerator
{
	/**
	 *	Create request
	 */
	public function createRequests($root, $methods)
	{
		# class names
		$requestNamespace = 'OUTRAGElib\Subsonic';
		$traitClass = "ClientRequestTrait";
		
		# create our class & namespace
		$file = new PhpFile();
		
		$namespace = $file->addNamespace($requestNamespace);
		
		foreach($methods as $method)
			$namespace->addUse('OUTRAGElib\Subsonic\Request\\'.ucfirst($method->method), ucfirst($method->method).'Request');
		
		$class = $namespace->addTrait($traitClass);
		$class->addComment("This trait is automatically generated. All changes to this may (or will) be overwritten");
		
		# add our methods
		foreach($methods as $method)
		{
			$shortClassName = ucfirst($method->method).'Request';
			
			$func = $class->addMethod($method->method);
			$func->addComment(wordwrap($method->description));
			$func->addParameter("input");
			$func->addBody('if($input instanceof '.$shortClassName.' === false)');
			$func->addBody("\t".'$input = new '.$shortClassName.'($input);');
			$func->addBody('');
			$func->addBody('return $input->execute($this)->getResults();');
		}
		
		# output file
		file_put_contents(implode(DIRECTORY_SEPARATOR, [ $root, $traitClass.".php" ]), (string) $file);
	}
}