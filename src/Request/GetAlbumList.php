<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetAlbumList as GetAlbumListResponse;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns a list of random, newest, highest rated etc. albums. Similar to the
 * album lists on the home page of the Subsonic web interface.
 */
class GetAlbumList extends RequestAbstract
{
	/**
	 * The list type. Must be one of the following: random, newest, highest,
	 * frequent, recent. Since 1.8.0 you can also use alphabeticalByName or
	 * alphabeticalByArtist to page through all albums alphabetically, and starred
	 * to retrieve starred albums. Since 1.10.1 you can use byYear and byGenre to
	 * list albums in a given year range or genre.
	 * @required Yes
	 */
	public $type;

	/**
	 * The number of albums to return. Max 500.
	 * @required No
	 * @default 10
	 */
	public $size;

	/**
	 * The list offset. Useful if you for example want to page through the list of
	 * newest albums.
	 * @required No
	 */
	public $offset;

	/**
	 * The first year in the range. If fromYear > toYear a reverse chronological
	 * list is returned.
	 * @required Yes (if type is byYear)
	 */
	public $fromYear;

	/**
	 * The last year in the range.
	 * @required Yes (if type is byYear)
	 */
	public $toYear;

	/**
	 * The name of the genre, e.g., "Rock".
	 * @required Yes (if type is byGenre)
	 */
	public $genre;

	/**
	 * (Since 1.11.0) Only return albums in the music folder with the given ID.
	 * See getMusicFolders.
	 * @required No
	 */
	public $musicFolderId;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("type", $input))
			$this->type = $input["type"];

		if(array_key_exists("size", $input))
			$this->size = $input["size"];

		if(array_key_exists("offset", $input))
			$this->offset = $input["offset"];

		if(array_key_exists("fromYear", $input))
			$this->fromYear = $input["fromYear"];

		if(array_key_exists("toYear", $input))
			$this->toYear = $input["toYear"];

		if(array_key_exists("genre", $input))
			$this->genre = $input["genre"];

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
			"type" => $this->type,
			"size" => $this->size,
			"offset" => $this->offset,
			"fromYear" => $this->fromYear,
			"toYear" => $this->toYear,
			"genre" => $this->genre,
			"musicFolderId" => $this->musicFolderId,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client)
	{
		return $client->executeRequest("/rest/getAlbumList", $this->toArray());
	}
}
