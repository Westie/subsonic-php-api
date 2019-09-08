<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns all Podcast channels the server subscribes to, and (optionally)
 * their episodes. This method can also be used to return details for only one
 * channel - refer to the id parameter. A typical use case for this method
 * would be to first retrieve all channels without episodes, and then retrieve
 * all episodes for the single channel the user selects.
 */
class GetPodcasts extends RequestAbstract
{
	/**
	 * (Since 1.9.0) Whether to include Podcast episodes in the returned result.
	 * @required No
	 * @default true
	 */
	public $includeEpisodes;

	/**
	 * (Since 1.9.0) If specified, only return the Podcast channel with this ID.
	 * @required No
	 */
	public $id;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("includeEpisodes", $input))
			$this->includeEpisodes = $input["includeEpisodes"];

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
			"includeEpisodes" => $this->includeEpisodes,
			"id" => $this->id,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): Response
	{
		return $client->executeRequest("/rest/getPodcasts", $this->toArray(), Response::class);
	}
}
