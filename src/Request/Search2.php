<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\Search2 as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns albums, artists and songs matching the given search criteria.
 * Supports paging through the result.
 */
class Search2 extends RequestAbstract
{
	/**
	 * Search query.
	 * @required Yes
	 */
	public $query;

	/**
	 * Maximum number of artists to return.
	 * @required No
	 * @default 20
	 */
	public $artistCount;

	/**
	 * Search result offset for artists. Used for paging.
	 * @required No
	 */
	public $artistOffset;

	/**
	 * Maximum number of albums to return.
	 * @required No
	 * @default 20
	 */
	public $albumCount;

	/**
	 * Search result offset for albums. Used for paging.
	 * @required No
	 */
	public $albumOffset;

	/**
	 * Maximum number of songs to return.
	 * @required No
	 * @default 20
	 */
	public $songCount;

	/**
	 * Search result offset for songs. Used for paging.
	 * @required No
	 */
	public $songOffset;

	/**
	 * (Since 1.12.0) Only return results from the music folder with the given ID.
	 * See getMusicFolders.
	 * @required No
	 */
	public $musicFolderId;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("query", $input))
			$this->query = $input["query"];

		if(array_key_exists("artistCount", $input))
			$this->artistCount = $input["artistCount"];

		if(array_key_exists("artistOffset", $input))
			$this->artistOffset = $input["artistOffset"];

		if(array_key_exists("albumCount", $input))
			$this->albumCount = $input["albumCount"];

		if(array_key_exists("albumOffset", $input))
			$this->albumOffset = $input["albumOffset"];

		if(array_key_exists("songCount", $input))
			$this->songCount = $input["songCount"];

		if(array_key_exists("songOffset", $input))
			$this->songOffset = $input["songOffset"];

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
			"query" => $this->query,
			"artistCount" => $this->artistCount,
			"artistOffset" => $this->artistOffset,
			"albumCount" => $this->albumCount,
			"albumOffset" => $this->albumOffset,
			"songCount" => $this->songCount,
			"songOffset" => $this->songOffset,
			"musicFolderId" => $this->musicFolderId,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/search2", $this->toArray(), ResponseHandler::class);
	}
}
