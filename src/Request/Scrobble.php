<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Registers the local playback of one or more media files. Typically used
 * when playing media that is cached on the client. This operation includes
 * the following:
 */
class Scrobble extends RequestAbstract
{
	/**
	 * A string which uniquely identifies the file to scrobble.
	 * @required Yes
	 */
	public $id;

	/**
	 * (Since 1.8.0) The time (in milliseconds since 1 Jan 1970) at which the song
	 * was listened to.
	 * @required No
	 */
	public $time;

	/**
	 * Whether this is a "submission" or a "now playing" notification.
	 * @required No
	 * @default True
	 */
	public $submission;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("time", $input))
			$this->time = $input["time"];

		if(array_key_exists("submission", $input))
			$this->submission = $input["submission"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"time" => $this->time,
			"submission" => $this->submission,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseInterface
	{
		return $client->executeRequest("/rest/scrobble", $this->toArray(), null);
	}
}
