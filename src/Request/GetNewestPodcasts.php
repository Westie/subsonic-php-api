<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetNewestPodcasts as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns the most recently published Podcast episodes.
 */
class GetNewestPodcasts extends RequestAbstract
{
	/**
	 * The maximum number of episodes to return.
	 * @required No
	 * @default 20
	 */
	public $count;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("count", $input))
			$this->count = $input["count"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"count" => $this->count,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getNewestPodcasts", $this->toArray(), ResponseHandler::class);
	}
}
