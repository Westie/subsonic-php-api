<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Changes the password of an existing Subsonic user, using the following
 * parameters. You can only change your own password unless you have admin
 * privileges.
 */
class ChangePassword extends RequestAbstract
{
	/**
	 * The name of the user which should change its password.
	 * @required Yes
	 */
	public $username;

	/**
	 * The new password of the new user, either in clear text of hex-encoded (see
	 * above).
	 * @required Yes
	 */
	public $password;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("username", $input))
			$this->username = $input["username"];

		if(array_key_exists("password", $input))
			$this->password = $input["password"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"username" => $this->username,
			"password" => $this->password,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseInterface
	{
		return $client->executeRequest("/rest/changePassword", $this->toArray(), null);
	}
}
