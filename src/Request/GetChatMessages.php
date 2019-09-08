<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetChatMessages as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns the current visible (non-expired) chat messages.
 */
class GetChatMessages extends RequestAbstract
{
	/**
	 * Only return messages newer than this time (in millis since Jan 1 1970).
	 * @required No
	 */
	public $since;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("since", $input))
			$this->since = $input["since"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"since" => $this->since,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getChatMessages", $this->toArray(), ResponseHandler::class);
	}
}
