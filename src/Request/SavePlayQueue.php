<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Saves the state of the play queue for this user. This includes the tracks
 * in the play queue, the currently playing track, and the position within
 * this track. Typically used to allow a user to move between different
 * clients/apps while retaining the same play queue (for instance when
 * listening to an audio book).
 */
class SavePlayQueue extends RequestAbstract
{
	/**
	 * ID of a song in the play queue. Use one id parameter for each song in the
	 * play queue.
	 * @required Yes
	 */
	public $id;

	/**
	 * The ID of the current playing song.
	 * @required No
	 */
	public $current;

	/**
	 * The position in milliseconds within the currently playing song.
	 * @required No
	 */
	public $position;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("current", $input))
			$this->current = $input["current"];

		if(array_key_exists("position", $input))
			$this->position = $input["position"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"current" => $this->current,
			"position" => $this->position,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): Response
	{
		return $client->executeRequest("/rest/savePlayQueue", $this->toArray(), Response::class);
	}
}
