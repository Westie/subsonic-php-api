<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetLyrics as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Searches for and returns lyrics for a given song.
 */
class GetLyrics extends RequestAbstract
{
	/**
	 * The artist name.
	 * @required No
	 */
	public $artist;

	/**
	 * The song title.
	 * @required No
	 */
	public $title;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("artist", $input))
			$this->artist = $input["artist"];

		if(array_key_exists("title", $input))
			$this->title = $input["title"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"artist" => $this->artist,
			"title" => $this->title,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getLyrics", $this->toArray(), ResponseHandler::class);
	}
}
