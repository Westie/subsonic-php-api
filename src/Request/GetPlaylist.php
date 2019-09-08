<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetPlaylist as GetPlaylistResponse;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns a listing of files in a saved playlist.
 */
class GetPlaylist extends RequestAbstract
{
	/**
	 * ID of the playlist to return, as obtained by getPlaylists.
	 * @required yes
	 */
	public $id;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client)
	{
		return $client->executeRequest("/rest/getPlaylist", $this->toArray());
	}
}
