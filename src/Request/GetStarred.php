<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetStarred as GetStarredResponse;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns starred songs, albums and artists.
 */
class GetStarred extends RequestAbstract
{
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
			"musicFolderId" => $this->musicFolderId,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client)
	{
		return $client->executeRequest("/rest/getStarred", $this->toArray());
	}
}
