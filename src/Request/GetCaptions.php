<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\GetCaptions as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Returns captions (subtitles) for a video. Use getVideoInfo to get a list of
 * available captions.
 */
class GetCaptions extends RequestAbstract
{
	/**
	 * The ID of the video.
	 * @required Yes
	 */
	public $id;

	/**
	 * Preferred captions format ("srt" or "vtt").
	 * @required No
	 */
	public $format;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("format", $input))
			$this->format = $input["format"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"format" => $this->format,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/getCaptions", $this->toArray(), ResponseHandler::class);
	}
}
