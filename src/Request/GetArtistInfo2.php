<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Similar to getArtistInfo, but organizes music according to ID3 tags.
 */
class GetArtistInfo2 extends RequestAbstract
{
	/**
	 * The artist ID.
	 * @required Yes
	 */
	public $id;

	/**
	 * Max number of similar artists to return.
	 * @required No
	 * @default 20
	 */
	public $count;

	/**
	 * Whether to return artists that are not present in the media library.
	 * @required No
	 * @default false
	 */
	public $includeNotPresent;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("count", $input))
			$this->count = $input["count"];

		if(array_key_exists("includeNotPresent", $input))
			$this->includeNotPresent = $input["includeNotPresent"];

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
			"includeNotPresent" => $this->includeNotPresent,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseInterface
	{
		return $client->executeRequest("/rest/getArtistInfo2", $this->toArray(), ["artistInfo2"]);
	}
}
