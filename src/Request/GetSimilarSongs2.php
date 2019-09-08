<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetSimilarSongs2 as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Similar to getSimilarSongs, but organizes music according to ID3 tags.
 */
class GetSimilarSongs2 extends RequestAbstract
{
	/**
	 * The artist ID.
	 * @required Yes
	 */
	public $id;

	/**
	 * Max number of songs to return.
	 * @required No
	 * @default 50
	 */
	public $count;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("count", $input))
			$this->count = $input["count"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"count" => $this->count,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getSimilarSongs2", $this->toArray(), ResponseHandler::class);
	}
}
