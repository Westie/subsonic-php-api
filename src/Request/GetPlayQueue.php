<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns the state of the play queue for this user (as set by
 * savePlayQueue). This includes the tracks in the play queue, the currently
 * playing track, and the position within this track. Typically used to allow
 * a user to move between different clients/apps while retaining the same play
 * queue (for instance when listening to an audio book).
 */
class GetPlayQueue extends RequestAbstract
{
	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): Response
	{
		return $client->executeRequest("/rest/getPlayQueue", $this->toArray(), Response::class);
	}
}
