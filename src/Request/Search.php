<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\Search as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns a listing of files matching the given search criteria. Supports
 * paging through the result.
 */
class Search extends RequestAbstract
{
	/**
	 * Artist to search for.
	 * @required No
	 */
	public $artist;

	/**
	 * Album to searh for.
	 * @required No
	 */
	public $album;

	/**
	 * Song title to search for.
	 * @required No
	 */
	public $title;

	/**
	 * Searches all fields.
	 * @required No
	 */
	public $any;

	/**
	 * Maximum number of results to return.
	 * @required No
	 * @default 20
	 */
	public $count;

	/**
	 * Search result offset. Used for paging.
	 * @required No
	 */
	public $offset;

	/**
	 * Only return matches that are newer than this. Given as milliseconds since
	 * 1970.
	 * @required No
	 */
	public $newerThan;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("artist", $input))
			$this->artist = $input["artist"];

		if(array_key_exists("album", $input))
			$this->album = $input["album"];

		if(array_key_exists("title", $input))
			$this->title = $input["title"];

		if(array_key_exists("any", $input))
			$this->any = $input["any"];

		if(array_key_exists("count", $input))
			$this->count = $input["count"];

		if(array_key_exists("offset", $input))
			$this->offset = $input["offset"];

		if(array_key_exists("newerThan", $input))
			$this->newerThan = $input["newerThan"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"artist" => $this->artist,
			"album" => $this->album,
			"title" => $this->title,
			"any" => $this->any,
			"count" => $this->count,
			"offset" => $this->offset,
			"newerThan" => $this->newerThan,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/search", $this->toArray(), ResponseHandler::class);
	}
}
