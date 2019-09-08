<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns a cover art image.
 */
class GetCoverArt extends RequestAbstract
{
	/**
	 * The ID of a song, album or artist.
	 * @required Yes
	 */
	public $id;

	/**
	 * If specified, scale image to this size.
	 * @required No
	 */
	public $size;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("size", $input))
			$this->size = $input["size"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"size" => $this->size,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): Response
	{
		return $client->executeRequest("/rest/getCoverArt", $this->toArray(), Response::class);
	}
}
