<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\UpdateShare as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Updates the description and/or expiration date for an existing share.
 */
class UpdateShare extends RequestAbstract
{
	/**
	 * ID of the share to update.
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
	 * The time at which the share expires. Given as milliseconds since 1970, or
	 * zero to remove the expiration.
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
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/updateShare", $this->toArray(), ResponseHandler::class);
	}
}
