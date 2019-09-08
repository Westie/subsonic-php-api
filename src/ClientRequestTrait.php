<?php

namespace OUTRAGElib\Subsonic;

use OUTRAGElib\Subsonic\Request\AddChatMessage as AddChatMessageRequest;
use OUTRAGElib\Subsonic\Request\ChangePassword as ChangePasswordRequest;
use OUTRAGElib\Subsonic\Request\CreateBookmark as CreateBookmarkRequest;
use OUTRAGElib\Subsonic\Request\CreateInternetRadioStation as CreateInternetRadioStationRequest;
use OUTRAGElib\Subsonic\Request\CreatePlaylist as CreatePlaylistRequest;
use OUTRAGElib\Subsonic\Request\CreatePodcastChannel as CreatePodcastChannelRequest;
use OUTRAGElib\Subsonic\Request\CreateShare as CreateShareRequest;
use OUTRAGElib\Subsonic\Request\CreateUser as CreateUserRequest;
use OUTRAGElib\Subsonic\Request\DeleteBookmark as DeleteBookmarkRequest;
use OUTRAGElib\Subsonic\Request\DeleteInternetRadioStation as DeleteInternetRadioStationRequest;
use OUTRAGElib\Subsonic\Request\DeletePlaylist as DeletePlaylistRequest;
use OUTRAGElib\Subsonic\Request\DeletePodcastChannel as DeletePodcastChannelRequest;
use OUTRAGElib\Subsonic\Request\DeletePodcastEpisode as DeletePodcastEpisodeRequest;
use OUTRAGElib\Subsonic\Request\DeleteShare as DeleteShareRequest;
use OUTRAGElib\Subsonic\Request\DeleteUser as DeleteUserRequest;
use OUTRAGElib\Subsonic\Request\Download as DownloadRequest;
use OUTRAGElib\Subsonic\Request\DownloadPodcastEpisode as DownloadPodcastEpisodeRequest;
use OUTRAGElib\Subsonic\Request\GetAlbum as GetAlbumRequest;
use OUTRAGElib\Subsonic\Request\GetAlbumInfo as GetAlbumInfoRequest;
use OUTRAGElib\Subsonic\Request\GetAlbumInfo2 as GetAlbumInfo2Request;
use OUTRAGElib\Subsonic\Request\GetAlbumList as GetAlbumListRequest;
use OUTRAGElib\Subsonic\Request\GetAlbumList2 as GetAlbumList2Request;
use OUTRAGElib\Subsonic\Request\GetArtist as GetArtistRequest;
use OUTRAGElib\Subsonic\Request\GetArtistInfo as GetArtistInfoRequest;
use OUTRAGElib\Subsonic\Request\GetArtistInfo2 as GetArtistInfo2Request;
use OUTRAGElib\Subsonic\Request\GetArtists as GetArtistsRequest;
use OUTRAGElib\Subsonic\Request\GetAvatar as GetAvatarRequest;
use OUTRAGElib\Subsonic\Request\GetBookmarks as GetBookmarksRequest;
use OUTRAGElib\Subsonic\Request\GetCaptions as GetCaptionsRequest;
use OUTRAGElib\Subsonic\Request\GetChatMessages as GetChatMessagesRequest;
use OUTRAGElib\Subsonic\Request\GetCoverArt as GetCoverArtRequest;
use OUTRAGElib\Subsonic\Request\GetGenres as GetGenresRequest;
use OUTRAGElib\Subsonic\Request\GetIndexes as GetIndexesRequest;
use OUTRAGElib\Subsonic\Request\GetInternetRadioStations as GetInternetRadioStationsRequest;
use OUTRAGElib\Subsonic\Request\GetLicense as GetLicenseRequest;
use OUTRAGElib\Subsonic\Request\GetLyrics as GetLyricsRequest;
use OUTRAGElib\Subsonic\Request\GetMusicDirectory as GetMusicDirectoryRequest;
use OUTRAGElib\Subsonic\Request\GetMusicFolders as GetMusicFoldersRequest;
use OUTRAGElib\Subsonic\Request\GetNewestPodcasts as GetNewestPodcastsRequest;
use OUTRAGElib\Subsonic\Request\GetNowPlaying as GetNowPlayingRequest;
use OUTRAGElib\Subsonic\Request\GetPlayQueue as GetPlayQueueRequest;
use OUTRAGElib\Subsonic\Request\GetPlaylist as GetPlaylistRequest;
use OUTRAGElib\Subsonic\Request\GetPlaylists as GetPlaylistsRequest;
use OUTRAGElib\Subsonic\Request\GetPodcasts as GetPodcastsRequest;
use OUTRAGElib\Subsonic\Request\GetRandomSongs as GetRandomSongsRequest;
use OUTRAGElib\Subsonic\Request\GetScanStatus as GetScanStatusRequest;
use OUTRAGElib\Subsonic\Request\GetShares as GetSharesRequest;
use OUTRAGElib\Subsonic\Request\GetSimilarSongs as GetSimilarSongsRequest;
use OUTRAGElib\Subsonic\Request\GetSimilarSongs2 as GetSimilarSongs2Request;
use OUTRAGElib\Subsonic\Request\GetSong as GetSongRequest;
use OUTRAGElib\Subsonic\Request\GetSongsByGenre as GetSongsByGenreRequest;
use OUTRAGElib\Subsonic\Request\GetStarred as GetStarredRequest;
use OUTRAGElib\Subsonic\Request\GetStarred2 as GetStarred2Request;
use OUTRAGElib\Subsonic\Request\GetTopSongs as GetTopSongsRequest;
use OUTRAGElib\Subsonic\Request\GetUser as GetUserRequest;
use OUTRAGElib\Subsonic\Request\GetUsers as GetUsersRequest;
use OUTRAGElib\Subsonic\Request\GetVideoInfo as GetVideoInfoRequest;
use OUTRAGElib\Subsonic\Request\GetVideos as GetVideosRequest;
use OUTRAGElib\Subsonic\Request\Hls as HlsRequest;
use OUTRAGElib\Subsonic\Request\JukeboxControl as JukeboxControlRequest;
use OUTRAGElib\Subsonic\Request\Ping as PingRequest;
use OUTRAGElib\Subsonic\Request\RefreshPodcasts as RefreshPodcastsRequest;
use OUTRAGElib\Subsonic\Request\SavePlayQueue as SavePlayQueueRequest;
use OUTRAGElib\Subsonic\Request\Scrobble as ScrobbleRequest;
use OUTRAGElib\Subsonic\Request\Search as SearchRequest;
use OUTRAGElib\Subsonic\Request\Search2 as Search2Request;
use OUTRAGElib\Subsonic\Request\Search3 as Search3Request;
use OUTRAGElib\Subsonic\Request\SetRating as SetRatingRequest;
use OUTRAGElib\Subsonic\Request\Star as StarRequest;
use OUTRAGElib\Subsonic\Request\StartScan as StartScanRequest;
use OUTRAGElib\Subsonic\Request\Stream as StreamRequest;
use OUTRAGElib\Subsonic\Request\Unstar as UnstarRequest;
use OUTRAGElib\Subsonic\Request\UpdateInternetRadioStation as UpdateInternetRadioStationRequest;
use OUTRAGElib\Subsonic\Request\UpdatePlaylist as UpdatePlaylistRequest;
use OUTRAGElib\Subsonic\Request\UpdateShare as UpdateShareRequest;
use OUTRAGElib\Subsonic\Request\UpdateUser as UpdateUserRequest;

/**
 * This trait is automatically generated. All changes to this may (or will) be overwritten
 */
trait ClientRequestTrait
{
	/**
	 * Used to test connectivity with the server. Takes no extra parameters.
	 */
	public function ping($input = null)
	{
		if($input instanceof PingRequest === false)
			$input = new PingRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Get details about the software license. Takes no extra parameters. Please
	 * note that access to the REST API requires that the server has a valid
	 * license (after a 30-day trial period). To get a license key you must
	 * upgrade to Subsonic Premium.
	 */
	public function getLicense($input = null)
	{
		if($input instanceof GetLicenseRequest === false)
			$input = new GetLicenseRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns all configured top-level music folders. Takes no extra parameters.
	 */
	public function getMusicFolders($input = null)
	{
		if($input instanceof GetMusicFoldersRequest === false)
			$input = new GetMusicFoldersRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns an indexed structure of all artists.
	 */
	public function getIndexes($input = null)
	{
		if($input instanceof GetIndexesRequest === false)
			$input = new GetIndexesRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns a listing of all files in a music directory. Typically used to get
	 * list of albums for an artist, or list of songs for an album.
	 */
	public function getMusicDirectory($input = null)
	{
		if($input instanceof GetMusicDirectoryRequest === false)
			$input = new GetMusicDirectoryRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns all genres.
	 */
	public function getGenres($input = null)
	{
		if($input instanceof GetGenresRequest === false)
			$input = new GetGenresRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Similar to getIndexes, but organizes music according to ID3 tags.
	 */
	public function getArtists($input = null)
	{
		if($input instanceof GetArtistsRequest === false)
			$input = new GetArtistsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns details for an artist, including a list of albums. This method
	 * organizes music according to ID3 tags.
	 */
	public function getArtist($input = null)
	{
		if($input instanceof GetArtistRequest === false)
			$input = new GetArtistRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns details for an album, including a list of songs. This method
	 * organizes music according to ID3 tags.
	 */
	public function getAlbum($input = null)
	{
		if($input instanceof GetAlbumRequest === false)
			$input = new GetAlbumRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns details for a song.
	 */
	public function getSong($input = null)
	{
		if($input instanceof GetSongRequest === false)
			$input = new GetSongRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns all video files.
	 */
	public function getVideos($input = null)
	{
		if($input instanceof GetVideosRequest === false)
			$input = new GetVideosRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns details for a video, including information about available audio
	 * tracks, subtitles (captions) and conversions.
	 */
	public function getVideoInfo($input = null)
	{
		if($input instanceof GetVideoInfoRequest === false)
			$input = new GetVideoInfoRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns artist info with biography, image URLs and similar artists, using
	 * data from last.fm.
	 */
	public function getArtistInfo($input = null)
	{
		if($input instanceof GetArtistInfoRequest === false)
			$input = new GetArtistInfoRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Similar to getArtistInfo, but organizes music according to ID3 tags.
	 */
	public function getArtistInfo2($input = null)
	{
		if($input instanceof GetArtistInfo2Request === false)
			$input = new GetArtistInfo2Request($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns album notes, image URLs etc, using data from last.fm.
	 */
	public function getAlbumInfo($input = null)
	{
		if($input instanceof GetAlbumInfoRequest === false)
			$input = new GetAlbumInfoRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Similar to getAlbumInfo, but organizes music according to ID3 tags.
	 */
	public function getAlbumInfo2($input = null)
	{
		if($input instanceof GetAlbumInfo2Request === false)
			$input = new GetAlbumInfo2Request($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns a random collection of songs from the given artist and similar
	 * artists, using data from last.fm. Typically used for artist radio features.
	 */
	public function getSimilarSongs($input = null)
	{
		if($input instanceof GetSimilarSongsRequest === false)
			$input = new GetSimilarSongsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Similar to getSimilarSongs, but organizes music according to ID3 tags.
	 */
	public function getSimilarSongs2($input = null)
	{
		if($input instanceof GetSimilarSongs2Request === false)
			$input = new GetSimilarSongs2Request($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns top songs for the given artist, using data from last.fm.
	 */
	public function getTopSongs($input = null)
	{
		if($input instanceof GetTopSongsRequest === false)
			$input = new GetTopSongsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns a list of random, newest, highest rated etc. albums. Similar to the
	 * album lists on the home page of the Subsonic web interface.
	 */
	public function getAlbumList($input = null)
	{
		if($input instanceof GetAlbumListRequest === false)
			$input = new GetAlbumListRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Similar to getAlbumList, but organizes music according to ID3 tags.
	 */
	public function getAlbumList2($input = null)
	{
		if($input instanceof GetAlbumList2Request === false)
			$input = new GetAlbumList2Request($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns random songs matching the given criteria.
	 */
	public function getRandomSongs($input = null)
	{
		if($input instanceof GetRandomSongsRequest === false)
			$input = new GetRandomSongsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns songs in a given genre.
	 */
	public function getSongsByGenre($input = null)
	{
		if($input instanceof GetSongsByGenreRequest === false)
			$input = new GetSongsByGenreRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns what is currently being played by all users. Takes no extra
	 * parameters.
	 */
	public function getNowPlaying($input = null)
	{
		if($input instanceof GetNowPlayingRequest === false)
			$input = new GetNowPlayingRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns starred songs, albums and artists.
	 */
	public function getStarred($input = null)
	{
		if($input instanceof GetStarredRequest === false)
			$input = new GetStarredRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Similar to getStarred, but organizes music according to ID3 tags.
	 */
	public function getStarred2($input = null)
	{
		if($input instanceof GetStarred2Request === false)
			$input = new GetStarred2Request($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns a listing of files matching the given search criteria. Supports
	 * paging through the result.
	 */
	public function search($input = null)
	{
		if($input instanceof SearchRequest === false)
			$input = new SearchRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns albums, artists and songs matching the given search criteria.
	 * Supports paging through the result.
	 */
	public function search2($input = null)
	{
		if($input instanceof Search2Request === false)
			$input = new Search2Request($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Similar to search2, but organizes music according to ID3 tags.
	 */
	public function search3($input = null)
	{
		if($input instanceof Search3Request === false)
			$input = new Search3Request($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns all playlists a user is allowed to play.
	 */
	public function getPlaylists($input = null)
	{
		if($input instanceof GetPlaylistsRequest === false)
			$input = new GetPlaylistsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns a listing of files in a saved playlist.
	 */
	public function getPlaylist($input = null)
	{
		if($input instanceof GetPlaylistRequest === false)
			$input = new GetPlaylistRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Creates (or updates) a playlist.
	 */
	public function createPlaylist($input = null)
	{
		if($input instanceof CreatePlaylistRequest === false)
			$input = new CreatePlaylistRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Updates a playlist. Only the owner of a playlist is allowed to update it.
	 */
	public function updatePlaylist($input = null)
	{
		if($input instanceof UpdatePlaylistRequest === false)
			$input = new UpdatePlaylistRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Deletes a saved playlist.
	 */
	public function deletePlaylist($input = null)
	{
		if($input instanceof DeletePlaylistRequest === false)
			$input = new DeletePlaylistRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Streams a given media file.
	 */
	public function stream($input = null)
	{
		if($input instanceof StreamRequest === false)
			$input = new StreamRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Downloads a given media file. Similar to stream, but this method returns
	 * the original media data without transcoding or downsampling.
	 */
	public function download($input = null)
	{
		if($input instanceof DownloadRequest === false)
			$input = new DownloadRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Creates an HLS (HTTP Live Streaming) playlist used for streaming video or
	 * audio. HLS is a streaming protocol implemented by Apple and works by
	 * breaking the overall stream into a sequence of small HTTP-based file
	 * downloads. It's supported by iOS and newer versions of Android. This method
	 * also supports adaptive bitrate streaming, see the bitRate parameter.
	 */
	public function hls($input = null)
	{
		if($input instanceof HlsRequest === false)
			$input = new HlsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns captions (subtitles) for a video. Use getVideoInfo to get a list of
	 * available captions.
	 */
	public function getCaptions($input = null)
	{
		if($input instanceof GetCaptionsRequest === false)
			$input = new GetCaptionsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns a cover art image.
	 */
	public function getCoverArt($input = null)
	{
		if($input instanceof GetCoverArtRequest === false)
			$input = new GetCoverArtRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Searches for and returns lyrics for a given song.
	 */
	public function getLyrics($input = null)
	{
		if($input instanceof GetLyricsRequest === false)
			$input = new GetLyricsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns the avatar (personal image) for a user.
	 */
	public function getAvatar($input = null)
	{
		if($input instanceof GetAvatarRequest === false)
			$input = new GetAvatarRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Attaches a star to a song, album or artist.
	 */
	public function star($input = null)
	{
		if($input instanceof StarRequest === false)
			$input = new StarRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Removes the star from a song, album or artist.
	 */
	public function unstar($input = null)
	{
		if($input instanceof UnstarRequest === false)
			$input = new UnstarRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Sets the rating for a music file.
	 */
	public function setRating($input = null)
	{
		if($input instanceof SetRatingRequest === false)
			$input = new SetRatingRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Registers the local playback of one or more media files. Typically used
	 * when playing media that is cached on the client. This operation includes
	 * the following:
	 */
	public function scrobble($input = null)
	{
		if($input instanceof ScrobbleRequest === false)
			$input = new ScrobbleRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns information about shared media this user is allowed to manage.
	 * Takes no extra parameters.
	 */
	public function getShares($input = null)
	{
		if($input instanceof GetSharesRequest === false)
			$input = new GetSharesRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Creates a public URL that can be used by anyone to stream music or video
	 * from the Subsonic server. The URL is short and suitable for posting on
	 * Facebook, Twitter etc. Note: The user must be authorized to share (see
	 * Settings > Users > User is allowed to share files with anyone).
	 */
	public function createShare($input = null)
	{
		if($input instanceof CreateShareRequest === false)
			$input = new CreateShareRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Updates the description and/or expiration date for an existing share.
	 */
	public function updateShare($input = null)
	{
		if($input instanceof UpdateShareRequest === false)
			$input = new UpdateShareRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Deletes an existing share.
	 */
	public function deleteShare($input = null)
	{
		if($input instanceof DeleteShareRequest === false)
			$input = new DeleteShareRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns all Podcast channels the server subscribes to, and (optionally)
	 * their episodes. This method can also be used to return details for only one
	 * channel - refer to the id parameter. A typical use case for this method
	 * would be to first retrieve all channels without episodes, and then retrieve
	 * all episodes for the single channel the user selects.
	 */
	public function getPodcasts($input = null)
	{
		if($input instanceof GetPodcastsRequest === false)
			$input = new GetPodcastsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns the most recently published Podcast episodes.
	 */
	public function getNewestPodcasts($input = null)
	{
		if($input instanceof GetNewestPodcastsRequest === false)
			$input = new GetNewestPodcastsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Requests the server to check for new Podcast episodes. Note: The user must
	 * be authorized for Podcast administration (see Settings > Users > User is
	 * allowed to administrate Podcasts).
	 */
	public function refreshPodcasts($input = null)
	{
		if($input instanceof RefreshPodcastsRequest === false)
			$input = new RefreshPodcastsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Adds a new Podcast channel. Note: The user must be authorized for Podcast
	 * administration (see Settings > Users > User is allowed to administrate
	 * Podcasts).
	 */
	public function createPodcastChannel($input = null)
	{
		if($input instanceof CreatePodcastChannelRequest === false)
			$input = new CreatePodcastChannelRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Deletes a Podcast channel. Note: The user must be authorized for Podcast
	 * administration (see Settings > Users > User is allowed to administrate
	 * Podcasts).
	 */
	public function deletePodcastChannel($input = null)
	{
		if($input instanceof DeletePodcastChannelRequest === false)
			$input = new DeletePodcastChannelRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Deletes a Podcast episode. Note: The user must be authorized for Podcast
	 * administration (see Settings > Users > User is allowed to administrate
	 * Podcasts).
	 */
	public function deletePodcastEpisode($input = null)
	{
		if($input instanceof DeletePodcastEpisodeRequest === false)
			$input = new DeletePodcastEpisodeRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Request the server to start downloading a given Podcast episode. Note: The
	 * user must be authorized for Podcast administration (see Settings > Users >
	 * User is allowed to administrate Podcasts).
	 */
	public function downloadPodcastEpisode($input = null)
	{
		if($input instanceof DownloadPodcastEpisodeRequest === false)
			$input = new DownloadPodcastEpisodeRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Controls the jukebox, i.e., playback directly on the server's audio
	 * hardware. Note: The user must be authorized to control the jukebox (see
	 * Settings > Users > User is allowed to play files in jukebox mode).
	 */
	public function jukeboxControl($input = null)
	{
		if($input instanceof JukeboxControlRequest === false)
			$input = new JukeboxControlRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns all internet radio stations. Takes no extra parameters.
	 */
	public function getInternetRadioStations($input = null)
	{
		if($input instanceof GetInternetRadioStationsRequest === false)
			$input = new GetInternetRadioStationsRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Adds a new internet radio station. Only users with admin privileges are
	 * allowed to call this method.
	 */
	public function createInternetRadioStation($input = null)
	{
		if($input instanceof CreateInternetRadioStationRequest === false)
			$input = new CreateInternetRadioStationRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Updates an existing internet radio station. Only users with admin
	 * privileges are allowed to call this method.
	 */
	public function updateInternetRadioStation($input = null)
	{
		if($input instanceof UpdateInternetRadioStationRequest === false)
			$input = new UpdateInternetRadioStationRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Deletes an existing internet radio station. Only users with admin
	 * privileges are allowed to call this method.
	 */
	public function deleteInternetRadioStation($input = null)
	{
		if($input instanceof DeleteInternetRadioStationRequest === false)
			$input = new DeleteInternetRadioStationRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns the current visible (non-expired) chat messages.
	 */
	public function getChatMessages($input = null)
	{
		if($input instanceof GetChatMessagesRequest === false)
			$input = new GetChatMessagesRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Adds a message to the chat log.
	 */
	public function addChatMessage($input = null)
	{
		if($input instanceof AddChatMessageRequest === false)
			$input = new AddChatMessageRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Get details about a given user, including which authorization roles and
	 * folder access it has. Can be used to enable/disable certain features in the
	 * client, such as jukebox control.
	 */
	public function getUser($input = null)
	{
		if($input instanceof GetUserRequest === false)
			$input = new GetUserRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Get details about all users, including which authorization roles and folder
	 * access they have. Only users with admin privileges are allowed to call this
	 * method.
	 */
	public function getUsers($input = null)
	{
		if($input instanceof GetUsersRequest === false)
			$input = new GetUsersRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Creates a new Subsonic user, using the following parameters:
	 */
	public function createUser($input = null)
	{
		if($input instanceof CreateUserRequest === false)
			$input = new CreateUserRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Modifies an existing Subsonic user, using the following parameters:
	 */
	public function updateUser($input = null)
	{
		if($input instanceof UpdateUserRequest === false)
			$input = new UpdateUserRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Deletes an existing Subsonic user, using the following parameters:
	 */
	public function deleteUser($input = null)
	{
		if($input instanceof DeleteUserRequest === false)
			$input = new DeleteUserRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Changes the password of an existing Subsonic user, using the following
	 * parameters. You can only change your own password unless you have admin
	 * privileges.
	 */
	public function changePassword($input = null)
	{
		if($input instanceof ChangePasswordRequest === false)
			$input = new ChangePasswordRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns all bookmarks for this user. A bookmark is a position within a
	 * certain media file.
	 */
	public function getBookmarks($input = null)
	{
		if($input instanceof GetBookmarksRequest === false)
			$input = new GetBookmarksRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Creates or updates a bookmark (a position within a media file). Bookmarks
	 * are personal and not visible to other users.
	 */
	public function createBookmark($input = null)
	{
		if($input instanceof CreateBookmarkRequest === false)
			$input = new CreateBookmarkRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Deletes the bookmark for a given file.
	 */
	public function deleteBookmark($input = null)
	{
		if($input instanceof DeleteBookmarkRequest === false)
			$input = new DeleteBookmarkRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns the state of the play queue for this user (as set by
	 * savePlayQueue). This includes the tracks in the play queue, the currently
	 * playing track, and the position within this track. Typically used to allow
	 * a user to move between different clients/apps while retaining the same play
	 * queue (for instance when listening to an audio book).
	 */
	public function getPlayQueue($input = null)
	{
		if($input instanceof GetPlayQueueRequest === false)
			$input = new GetPlayQueueRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Saves the state of the play queue for this user. This includes the tracks
	 * in the play queue, the currently playing track, and the position within
	 * this track. Typically used to allow a user to move between different
	 * clients/apps while retaining the same play queue (for instance when
	 * listening to an audio book).
	 */
	public function savePlayQueue($input = null)
	{
		if($input instanceof SavePlayQueueRequest === false)
			$input = new SavePlayQueueRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Returns the current status for media library scanning. Takes no extra
	 * parameters.
	 */
	public function getScanStatus($input = null)
	{
		if($input instanceof GetScanStatusRequest === false)
			$input = new GetScanStatusRequest($input ?? []);

		return $input->execute($this)->getResults();
	}


	/**
	 * Initiates a rescan of the media libraries. Takes no extra parameters.
	 */
	public function startScan($input = null)
	{
		if($input instanceof StartScanRequest === false)
			$input = new StartScanRequest($input ?? []);

		return $input->execute($this)->getResults();
	}
}
