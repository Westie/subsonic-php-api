<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetAlbumInfo2 as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Similar to getAlbumInfo, but organizes music according to ID3 tags.
 */
class GetAlbumInfo2 extends RequestAbstract
{
	/**
	 * The album ID.
	 * @required Yes
	 */
	public $id;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getAlbumInfo2", $this->toArray(), ResponseHandler::class);
	}
}
