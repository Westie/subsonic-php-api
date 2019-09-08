<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\Response;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Sets the rating for a music file.
 */
class SetRating extends RequestAbstract
{
	/**
	 * A string which uniquely identifies the file (song) or folder (album/artist)
	 * to rate.
	 * @required Yes
	 */
	public $id;

	/**
	 * The rating between 1 and 5 (inclusive), or 0 to remove the rating.
	 * @required Yes
	 */
	public $rating;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("id", $input))
			$this->id = $input["id"];

		if(array_key_exists("rating", $input))
			$this->rating = $input["rating"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"id" => $this->id,
			"rating" => $this->rating,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): Response
	{
		return $client->executeRequest("/rest/setRating", $this->toArray(), Response::class);
	}
}
