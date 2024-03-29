<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Adds a new internet radio station. Only users with admin privileges are
 * allowed to call this method.
 */
class CreateInternetRadioStation extends RequestAbstract
{
	/**
	 * The stream URL for the station.
	 * @required Yes
	 */
	public $streamUrl;

	/**
	 * The user-defined name for the station.
	 * @required Yes
	 */
	public $name;

	/**
	 * The home page URL for the station.
	 * @required No
	 */
	public $homepageUrl;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("streamUrl", $input))
			$this->streamUrl = $input["streamUrl"];

		if(array_key_exists("name", $input))
			$this->name = $input["name"];

		if(array_key_exists("homepageUrl", $input))
			$this->homepageUrl = $input["homepageUrl"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"streamUrl" => $this->streamUrl,
			"name" => $this->name,
			"homepageUrl" => $this->homepageUrl,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseInterface
	{
		return $client->executeRequest("/rest/createInternetRadioStation", $this->toArray(), null);
	}
}
