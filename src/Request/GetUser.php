<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Get details about a given user, including which authorization roles and
 * folder access it has. Can be used to enable/disable certain features in the
 * client, such as jukebox control.
 */
class GetUser extends RequestAbstract
{
	/**
	 * The name of the user to retrieve. You can only retrieve your own user
	 * unless you have admin privileges.
	 * @required Yes
	 */
	public $username;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("username", $input))
			$this->username = $input["username"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"username" => $this->username,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseInterface
	{
		return $client->executeRequest("/rest/getUser", $this->toArray(), ["user"]);
	}
}
