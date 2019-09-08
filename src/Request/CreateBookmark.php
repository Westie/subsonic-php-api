<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response\CreateBookmark as ResponseHandler;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Creates or updates a bookmark (a position within a media file). Bookmarks
 * are personal and not visible to other users.
 */
class CreateBookmark extends RequestAbstract
{
	/**
	 * ID of the media file to bookmark. If a bookmark already exists for this
	 * file it will be overwritten.
	 * @required Yes
	 */
	public $id;

	/**
	 * The position (in milliseconds) within the media file.
	 * @required Yes
	 */
	public $position;

	/**
	 * A user-defined comment.
	 * @required No
	 */
	public $comment;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("position", $input))
			$this->position = $input["position"];

		if(array_key_exists("comment", $input))
			$this->comment = $input["comment"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"position" => $this->position,
			"comment" => $this->comment,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseHandler
	{
		return $client->executeRequest("/rest/createBookmark", $this->toArray(), ResponseHandler::class);
	}
}
