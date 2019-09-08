<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Controls the jukebox, i.e., playback directly on the server's audio
 * hardware. Note: The user must be authorized to control the jukebox (see
 * Settings > Users > User is allowed to play files in jukebox mode).
 */
class JukeboxControl extends RequestAbstract
{
	/**
	 * The operation to perform. Must be one of: get, status (since 1.7.0), set
	 * (since 1.7.0), start, stop, skip, add, clear, remove, shuffle, setGain
	 * @required Yes
	 */
	public $action;

	/**
	 * Used by skip and remove. Zero-based index of the song to skip to or remove.
	 * @required No
	 */
	public $index;

	/**
	 * (Since 1.7.0) Used by skip. Start playing this many seconds into the track.
	 * @required No
	 */
	public $offset;

	/**
	 * Used by add and set. ID of song to add to the jukebox playlist. Use
	 * multiple id parameters to add many songs in the same request. (set is
	 * similar to a clear followed by a add, but will not change the currently
	 * playing track.)
	 * @required No
	 */
	public $id;

	/**
	 * Used by setGain to control the playback volume. A float value between 0.0
	 * and 1.0.
	 * @required No
	 */
	public $gain;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("action", $input))
			$this->action = $input["action"];

		if(array_key_exists("index", $input))
			$this->index = $input["index"];

		if(array_key_exists("offset", $input))
			$this->offset = $input["offset"];

		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("gain", $input))
			$this->gain = $input["gain"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"action" => $this->action,
			"index" => $this->index,
			"offset" => $this->offset,
			"id" => $this->id,
			"gain" => $this->gain,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseInterface
	{
		return $client->executeRequest("/rest/jukeboxControl", $this->toArray(), ["jukeboxStatus","jukeboxPlaylist"]);
	}
}
