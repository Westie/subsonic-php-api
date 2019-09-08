<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\UpdatePlaylist as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Updates a playlist. Only the owner of a playlist is allowed to update it.
 */
class UpdatePlaylist extends RequestAbstract
{
	/**
	 * The playlist ID.
	 * @required Yes
	 */
	public $playlistId;

	/**
	 * The human-readable name of the playlist.
	 * @required No
	 */
	public $name;

	/**
	 * The playlist comment.
	 * @required No
	 */
	public $comment;

	/**
	 * true if the playlist should be visible to all users, false otherwise.
	 * @required No
	 */
	public $public;

	/**
	 * Add this song with this ID to the playlist. Multiple parameters allowed.
	 * @required No
	 */
	public $songIdToAdd;

	/**
	 * Remove the song at this position in the playlist. Multiple parameters
	 * allowed.
	 * @required No
	 */
	public $songIndexToRemove;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("playlistId", $input))
			$this->playlistId = $input["playlistId"];

		if(array_key_exists("name", $input))
			$this->name = $input["name"];

		if(array_key_exists("comment", $input))
			$this->comment = $input["comment"];

		if(array_key_exists("public", $input))
			$this->public = $input["public"];

		if(array_key_exists("songIdToAdd", $input))
			$this->songIdToAdd = $input["songIdToAdd"];

		if(array_key_exists("songIndexToRemove", $input))
			$this->songIndexToRemove = $input["songIndexToRemove"];

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
			"comment" => $this->comment,
			"public" => $this->public,
			"songIdToAdd" => $this->songIdToAdd,
			"songIndexToRemove" => $this->songIndexToRemove,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/updatePlaylist", $this->toArray(), ResponseHandler::class);
	}
}
