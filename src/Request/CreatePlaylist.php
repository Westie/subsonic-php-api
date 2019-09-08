<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\CreatePlaylist as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Creates (or updates) a playlist.
 */
class CreatePlaylist extends RequestAbstract
{
	/**
	 * The playlist ID.
	 * @required Yes (if updating)
	 */
	public $playlistId;

	/**
	 * The human-readable name of the playlist.
	 * @required Yes (if creating)
	 */
	public $name;

	/**
	 * ID of a song in the playlist. Use one songId parameter for each song in the
	 * playlist.
	 * @required No
	 */
	public $songId;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("playlistId", $input))
			$this->playlistId = $input["playlistId"];

		if(array_key_exists("name", $input))
			$this->name = $input["name"];

		if(array_key_exists("songId", $input))
			$this->songId = $input["songId"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"playlistId" => $this->playlistId,
			"name" => $this->name,
			"songId" => $this->songId,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/createPlaylist", $this->toArray(), ResponseHandler::class);
	}
}
