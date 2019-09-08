<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetTopSongs as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns top songs for the given artist, using data from last.fm.
 */
class GetTopSongs extends RequestAbstract
{
	/**
	 * The artist name.
	 * @required Yes
	 */
	public $artist;

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
		if(array_key_exists("artist", $input))
			$this->artist = $input["artist"];

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
			"artist" => $this->artist,
			"count" => $this->count,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getTopSongs", $this->toArray(), ResponseHandler::class);
	}
}
