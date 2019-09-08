<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetIndexes as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns an indexed structure of all artists.
 */
class GetIndexes extends RequestAbstract
{
	/**
	 * If specified, only return artists in the music folder with the given ID.
	 * See getMusicFolders.
	 * @required No
	 */
	public $musicFolderId;

	/**
	 * If specified, only return a result if the artist collection has changed
	 * since the given time (in milliseconds since 1 Jan 1970).
	 * @required No
	 */
	public $ifModifiedSince;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("musicFolderId", $input))
			$this->musicFolderId = $input["musicFolderId"];

		if(array_key_exists("ifModifiedSince", $input))
			$this->ifModifiedSince = $input["ifModifiedSince"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"musicFolderId" => $this->musicFolderId,
			"ifModifiedSince" => $this->ifModifiedSince,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getIndexes", $this->toArray(), ResponseHandler::class);
	}
}
