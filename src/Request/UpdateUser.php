<?php

namespace OUTRAGElib\Subsonic\Request;

use OUTRAGElib\Subsonic\Client as SubsonicClient;
use OUTRAGElib\Subsonic\RequestAbstract;
use OUTRAGElib\Subsonic\ResponseInterface;

/**
 * This class is automatically generated. All changes to this may (or will) be overwritten
 *
 * Modifies an existing Subsonic user, using the following parameters:
 */
class UpdateUser extends RequestAbstract
{
	/**
	 * The name of the user.
	 * @required Yes
	 */
	public $username;

	/**
	 * The password of the user, either in clear text of hex-encoded (see above).
	 * @required No
	 */
	public $password;

	/**
	 * The email address of the user.
	 * @required No
	 */
	public $email;

	/**
	 * Whether the user is authenicated in LDAP.
	 * @required No
	 */
	public $ldapAuthenticated;

	/**
	 * Whether the user is administrator.
	 * @required No
	 */
	public $adminRole;

	/**
	 * Whether the user is allowed to change personal settings and password.
	 * @required No
	 */
	public $settingsRole;

	/**
	 * Whether the user is allowed to play files.
	 * @required No
	 */
	public $streamRole;

	/**
	 * Whether the user is allowed to play files in jukebox mode.
	 * @required No
	 */
	public $jukeboxRole;

	/**
	 * Whether the user is allowed to download files.
	 * @required No
	 */
	public $downloadRole;

	/**
	 * Whether the user is allowed to upload files.
	 * @required No
	 */
	public $uploadRole;

	/**
	 * Whether the user is allowed to change cover art and tags.
	 * @required No
	 */
	public $coverArtRole;

	/**
	 * Whether the user is allowed to create and edit comments and ratings.
	 * @required No
	 */
	public $commentRole;

	/**
	 * Whether the user is allowed to administrate Podcasts.
	 * @required No
	 */
	public $podcastRole;

	/**
	 * Whether the user is allowed to share files with anyone.
	 * @required No
	 */
	public $shareRole;

	/**
	 * (Since 1.15.0) Whether the user is allowed to start video conversions.
	 * @required No
	 * @default false
	 */
	public $videoConversionRole;

	/**
	 * (Since 1.12.0) IDs of the music folders the user is allowed access to.
	 * Include the parameter once for each folder.
	 * @required No
	 */
	public $musicFolderId;

	/**
	 * (Since 1.13.0) The maximum bit rate (in Kbps) for the user. Audio streams
	 * of higher bit rates are automatically downsampled to this bit rate. Legal
	 * values: 0 (no limit), 32, 40, 48, 56, 64, 80, 96, 112, 128, 160, 192, 224,
	 * 256, 320.
	 * @required No
	 */
	public $maxBitRate;


	/**
	 * Populate this object from an array
	 */
	public function fromArray(array $input)
	{
		if(array_key_exists("username", $input))
			$this->username = $input["username"];

		if(array_key_exists("password", $input))
			$this->password = $input["password"];

		if(array_key_exists("email", $input))
			$this->email = $input["email"];

		if(array_key_exists("ldapAuthenticated", $input))
			$this->ldapAuthenticated = $input["ldapAuthenticated"];

		if(array_key_exists("adminRole", $input))
			$this->adminRole = $input["adminRole"];

		if(array_key_exists("settingsRole", $input))
			$this->settingsRole = $input["settingsRole"];

		if(array_key_exists("streamRole", $input))
			$this->streamRole = $input["streamRole"];

		if(array_key_exists("jukeboxRole", $input))
			$this->jukeboxRole = $input["jukeboxRole"];

		if(array_key_exists("downloadRole", $input))
			$this->downloadRole = $input["downloadRole"];

		if(array_key_exists("uploadRole", $input))
			$this->uploadRole = $input["uploadRole"];

		if(array_key_exists("coverArtRole", $input))
			$this->coverArtRole = $input["coverArtRole"];

		if(array_key_exists("commentRole", $input))
			$this->commentRole = $input["commentRole"];

		if(array_key_exists("podcastRole", $input))
			$this->podcastRole = $input["podcastRole"];

		if(array_key_exists("shareRole", $input))
			$this->shareRole = $input["shareRole"];

		if(array_key_exists("videoConversionRole", $input))
			$this->videoConversionRole = $input["videoConversionRole"];

		if(array_key_exists("musicFolderId", $input))
			$this->musicFolderId = $input["musicFolderId"];

		if(array_key_exists("maxBitRate", $input))
			$this->maxBitRate = $input["maxBitRate"];

		return $this;
	}


	/**
	 * Serialize this object to an array
	 */
	public function toArray(): array
	{
		return [
			"username" => $this->username,
			"password" => $this->password,
			"email" => $this->email,
			"ldapAuthenticated" => $this->ldapAuthenticated,
			"adminRole" => $this->adminRole,
			"settingsRole" => $this->settingsRole,
			"streamRole" => $this->streamRole,
			"jukeboxRole" => $this->jukeboxRole,
			"downloadRole" => $this->downloadRole,
			"uploadRole" => $this->uploadRole,
			"coverArtRole" => $this->coverArtRole,
			"commentRole" => $this->commentRole,
			"podcastRole" => $this->podcastRole,
			"shareRole" => $this->shareRole,
			"videoConversionRole" => $this->videoConversionRole,
			"musicFolderId" => $this->musicFolderId,
			"maxBitRate" => $this->maxBitRate,
		];
	}


	/**
	 * Request information from API endpoint, using a Guzzle client
	 */
	public function execute(SubsonicClient $client): ResponseInterface
	{
		return $client->executeRequest("/rest/updateUser", $this->toArray(), null);
	}
}
