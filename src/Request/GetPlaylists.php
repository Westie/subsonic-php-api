<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns all playlists a user is allowed to play.
 */
class GetPlaylists extends RequestAbstract
{
	/**
	 * (Since 1.8.0) If specified, return playlists for this user rather than for
	 * the authenticated user. The authenticated user must have admin role if this
	 * parameter is used.
	 * @required no
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
		return $client->executeRequest("/rest/getPlaylists", $this->toArray(), ["playlists"]);
	}
}
