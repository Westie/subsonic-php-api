<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns songs in a given genre.
 */
class GetSongsByGenre extends RequestAbstract
{
	/**
	 * The genre, as returned by getGenres.
	 * @required Yes
	 */
	public $genre;

	/**
	 * The maximum number of songs to return. Max 500.
	 * @required No
	 * @default 10
	 */
	public $count;

	/**
	 * The offset. Useful if you want to page through the songs in a genre.
	 * @required No
	 */
	public $offset;

	/**
	 * (Since 1.12.0) Only return albums in the music folder with the given ID.
	 * See getMusicFolders.
	 * @required No
	 */
	public $musicFolderId;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("genre", $input))
			$this->genre = $input["genre"];

		if(array_key_exists("count", $input))
			$this->count = $input["count"];

		if(array_key_exists("offset", $input))
			$this->offset = $input["offset"];

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
			"genre" => $this->genre,
			"count" => $this->count,
			"offset" => $this->offset,
			"musicFolderId" => $this->musicFolderId,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseInterface
	{
		return $client->executeRequest("/rest/getSongsByGenre", $this->toArray(), ["songsByGenre"]);
	}
}
