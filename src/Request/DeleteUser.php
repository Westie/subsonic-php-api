<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\DeleteUser as DeleteUserResponse;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Deletes an existing Subsonic user, using the following parameters:
 */
class DeleteUser extends RequestAbstract
{
	/**
	 * The name of the user to delete.
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
	public function execute(SubsonicClient $client)
	{
		return $client->executeRequest("/rest/deleteUser", $this->toArray());
	}
}
