<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetInternetRadioStations as GetInternetRadioStationsResponse;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns all internet radio stations. Takes no extra parameters.
 */
class GetInternetRadioStations extends RequestAbstract
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
	public function execute(SubsonicClient $client)
	{
		return $client->executeRequest("/rest/getInternetRadioStations", $this->toArray());
	}
}
