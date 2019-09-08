<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\DeletePodcastChannel as DeletePodcastChannelResponse;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Deletes a Podcast channel. Note: The user must be authorized for Podcast
 * administration (see Settings > Users > User is allowed to administrate
 * Podcasts).
 */
class DeletePodcastChannel extends RequestAbstract
{
	/**
	 * The ID of the Podcast channel to delete.
	 * @required Yes
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
		return $client->executeRequest("/rest/deletePodcastChannel", $this->toArray());
	}
}
