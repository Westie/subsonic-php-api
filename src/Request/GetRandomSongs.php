<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetRandomSongs as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns random songs matching the given criteria.
 */
class GetRandomSongs extends RequestAbstract
{
	/**
	 * The maximum number of songs to return. Max 500.
	 * @required No
	 * @default 10
	 */
	public $size;

	/**
	 * Only returns songs belonging to this genre.
	 * @required No
	 */
	public $genre;

	/**
	 * Only return songs published after or in this year.
	 * @required No
	 */
	public $fromYear;

	/**
	 * Only return songs published before or in this year.
	 * @required No
	 */
	public $toYear;

	/**
	 * Only return songs in the music folder with the given ID. See
	 * getMusicFolders.
	 * @required No
	 */
	public $musicFolderId;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("size", $input))
			$this->size = $input["size"];

		if(array_key_exists("genre", $input))
			$this->genre = $input["genre"];

		if(array_key_exists("fromYear", $input))
			$this->fromYear = $input["fromYear"];

		if(array_key_exists("toYear", $input))
			$this->toYear = $input["toYear"];

		if(array_key_exists("musicFolderId", $input))
			$this->musicFolderId = $input["musicFolderId"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"size" => $this->size,
			"genre" => $this->genre,
			"fromYear" => $this->fromYear,
			"toYear" => $this->toYear,
			"musicFolderId" => $this->musicFolderId,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getRandomSongs", $this->toArray(), ResponseHandler::class);
	}
}
