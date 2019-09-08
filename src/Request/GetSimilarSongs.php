<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns a random collection of songs from the given artist and similar
 * artists, using data from last.fm. Typically used for artist radio features.
 */
class GetSimilarSongs extends RequestAbstract
{
	/**
	 * The artist, album or song ID.
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
	public function execute(SubsonicClient $client): Response
	{
		return $client->executeRequest("/rest/getSimilarSongs", $this->toArray(), Response::class);
	}
}
