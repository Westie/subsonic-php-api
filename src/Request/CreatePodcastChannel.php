<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\CreatePodcastChannel as CreatePodcastChannelResponse;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Adds a new Podcast channel. Note: The user must be authorized for Podcast
 * administration (see Settings > Users > User is allowed to administrate
 * Podcasts).
 */
class CreatePodcastChannel extends RequestAbstract
{
	/**
	 * The URL of the Podcast to add.
	 * @required Yes
	 */
	public $url;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("url", $input))
			$this->url = $input["url"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"url" => $this->url,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client)
	{
		return $client->executeRequest("/rest/createPodcastChannel", $this->toArray());
	}
}
