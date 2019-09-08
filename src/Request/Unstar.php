<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Removes the star from a song, album or artist.
 */
class Unstar extends RequestAbstract
{
	/**
	 * The ID of the file (song) or folder (album/artist) to unstar. Multiple
	 * parameters allowed.
	 * @required No
	 */
	public $id;

	/**
	 * The ID of an album to unstar. Use this rather than id if the client
	 * accesses the media collection according to ID3 tags rather than file
	 * structure. Multiple parameters allowed.
	 * @required No
	 */
	public $albumId;

	/**
	 * The ID of an artist to unstar. Use this rather than id if the client
	 * accesses the media collection according to ID3 tags rather than file
	 * structure. Multiple parameters allowed.
	 * @required No
	 */
	public $artistId;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("albumId", $input))
			$this->albumId = $input["albumId"];

		if(array_key_exists("artistId", $input))
			$this->artistId = $input["artistId"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"albumId" => $this->albumId,
			"artistId" => $this->artistId,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseInterface
	{
		return $client->executeRequest("/rest/unstar", $this->toArray(), null);
	}
}
