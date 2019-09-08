<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\Stream as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Streams a given media file.
 */
class Stream extends RequestAbstract
{
	/**
	 * A string which uniquely identifies the file to stream. Obtained by calls to
	 * getMusicDirectory.
	 * @required Yes
	 */
	public $id;

	/**
	 * (Since 1.2.0) If specified, the server will attempt to limit the bitrate to
	 * this value, in kilobits per second. If set to zero, no limit is imposed.
	 * @required No
	 */
	public $maxBitRate;

	/**
	 * (Since 1.6.0) Specifies the preferred target format (e.g., "mp3" or "flv")
	 * in case there are multiple applicable transcodings. Starting with 1.9.0 you
	 * can use the special value "raw" to disable transcoding.
	 * @required No
	 */
	public $format;

	/**
	 * Only applicable to video streaming. If specified, start streaming at the
	 * given offset (in seconds) into the video. Typically used to implement video
	 * skipping.
	 * @required No
	 */
	public $timeOffset;

	/**
	 * (Since 1.6.0) Only applicable to video streaming. Requested video size
	 * specified as WxH, for instance "640x480".
	 * @required No
	 */
	public $size;

	/**
	 * (Since 1.8.0). If set to "true", the Content-Length HTTP header will be set
	 * to an estimated value for transcoded or downsampled media.
	 * @required No
	 * @default false
	 */
	public $estimateContentLength;

	/**
	 * (Since 1.14.0) Only applicable to video streaming. Subsonic can optimize
	 * videos for streaming by converting them to MP4. If a conversion exists for
	 * the video in question, then setting this parameter to "true" will cause the
	 * converted video to be returned instead of the original.
	 * @required No
	 * @default false
	 */
	public $converted;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("maxBitRate", $input))
			$this->maxBitRate = $input["maxBitRate"];

		if(array_key_exists("format", $input))
			$this->format = $input["format"];

		if(array_key_exists("timeOffset", $input))
			$this->timeOffset = $input["timeOffset"];

		if(array_key_exists("size", $input))
			$this->size = $input["size"];

		if(array_key_exists("estimateContentLength", $input))
			$this->estimateContentLength = $input["estimateContentLength"];

		if(array_key_exists("converted", $input))
			$this->converted = $input["converted"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"maxBitRate" => $this->maxBitRate,
			"format" => $this->format,
			"timeOffset" => $this->timeOffset,
			"size" => $this->size,
			"estimateContentLength" => $this->estimateContentLength,
			"converted" => $this->converted,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/stream", $this->toArray(), ResponseHandler::class);
	}
}
