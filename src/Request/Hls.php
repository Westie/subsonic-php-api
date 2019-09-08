<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Creates an HLS (HTTP Live Streaming) playlist used for streaming video or
 * audio. HLS is a streaming protocol implemented by Apple and works by
 * breaking the overall stream into a sequence of small HTTP-based file
 * downloads. It's supported by iOS and newer versions of Android. This method
 * also supports adaptive bitrate streaming, see the bitRate parameter.
 */
class Hls extends RequestAbstract
{
	/**
	 * A string which uniquely identifies the media file to stream.
	 * @required Yes
	 */
	public $id;

	/**
	 * If specified, the server will attempt to limit the bitrate to this value,
	 * in kilobits per second. If this parameter is specified more than once, the
	 * server will create a variant playlist, suitable for adaptive bitrate
	 * streaming. The playlist will support streaming at all the specified
	 * bitrates. The server will automatically choose video dimensions that are
	 * suitable for the given bitrates. Since 1.9.0 you may explicitly request a
	 * certain width (480) and height (360) like so: bitRate=1000@480x360
	 * @required No
	 */
	public $bitRate;

	/**
	 * The ID of the audio track to use. See getVideoInfo for how to get the list
	 * of available audio tracks for a video.
	 * @required No
	 */
	public $audioTrack;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("bitRate", $input))
			$this->bitRate = $input["bitRate"];

		if(array_key_exists("audioTrack", $input))
			$this->audioTrack = $input["audioTrack"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"bitRate" => $this->bitRate,
			"audioTrack" => $this->audioTrack,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): Response
	{
		return $client->executeRequest("/rest/hls.m3u8", $this->toArray(), Response::class);
	}
}
