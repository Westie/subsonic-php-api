<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetUsers as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Get details about all users, including which authorization roles and folder
 * access they have. Only users with admin privileges are allowed to call this
 * method.
 */
class GetUsers extends RequestAbstract
{
	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getUsers", $this->toArray(), ResponseHandler::class);
	}
}
