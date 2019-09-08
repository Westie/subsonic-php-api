<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Creates a public URL that can be used by anyone to stream music or video
 * from the Subsonic server. The URL is short and suitable for posting on
 * Facebook, Twitter etc. Note: The user must be authorized to share (see
 * Settings > Users > User is allowed to share files with anyone).
 */
class CreateShare extends RequestAbstract
{
	/**
	 * ID of a song, album or video to share. Use one id parameter for each entry
	 * to share.
	 * @required Yes
	 */
	public $id;

	/**
	 * A user-defined description that will be displayed to people visiting the
	 * shared media.
	 * @required No
	 */
	public $description;

	/**
	 * The time at which the share expires. Given as milliseconds since 1970.
	 * @required No
	 */
	public $expires;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("description", $input))
			$this->description = $input["description"];

		if(array_key_exists("expires", $input))
			$this->expires = $input["expires"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"description" => $this->description,
			"expires" => $this->expires,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): Response
	{
		return $client->executeRequest("/rest/createShare", $this->toArray(), Response::class);
	}
}
