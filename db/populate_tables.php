<?php
require_once(realpath(dirname(__FILE__).'/create_tables.php'));

$insert_record = $db_connection->prepare(
	"INSERT INTO record_label
	(record_id,record_label) VALUES(?,?)");
$insert_record->bind_param("is", $record_id, $record_label);

$record_id = 1;
$record_label = "Universal Music Group";
$insert_record->execute();

$record_id = 2;
$record_label = "Sony Music Entertainment";
$insert_record->execute();

$record_id = 3;
$record_label = "Warner Music Group";
$insert_record->execute();

$record_id = 4;
$record_label = "Independent Labels";
$insert_record->execute();

$record_id = 5;
$record_label = "EMI Group";
$insert_record->execute();

$insert_record->close();

$insert_role = $db_connection->prepare(
	"INSERT INTO role 
	(role_id, role_type) VALUES(?,?);");

$insert_role->bind_param("is", $role_id, $role_title);

$role_id = 1;
$role_title = "admin";
$insert_role->execute();

$role_id = 2;
$role_title = "regular user";
$insert_role->execute();

$role_id = 3;
$role_title = "paid user";
$insert_role->execute();

$role_id = 4;
$role_title = "guest";
$insert_role->execute();

$insert_role->close();

$insert_era = $db_connection->prepare(
	"INSERT INTO era
       (era_id, era_year) VALUES(?,?);");
$insert_era->bind_param("ii",$era_id,$era_timeframe);

$era_id = 1;
$era_timeframe = 1950;
$insert_era->execute();

$era_id = 2;
$era_timeframe = 1960;
$insert_era->execute();

$era_id = 3;
$era_timeframe = 1970;
$insert_era->execute();

$era_id = 4;
$era_timeframe = 1980;
$insert_era->execute();

$era_id = 5;
$era_timeframe = 1990;
$insert_era->execute();

$era_id = 6;
$era_timeframe = 2000;
$insert_era->execute();

$era_id = 7;
$era_timeframe = 2010;
$insert_era->execute();

$insert_era->close();

$insert_genre = $db_connection->prepare(
	"INSERT INTO genre
	(genre_id, genre_name) VALUES (?,?);");
$insert_genre->bind_param("is",$genre_id,$genre_name);

$genre_id = 1;
$genre_name = "pop";
$insert_genre->execute();

$genre_id = 2;
$genre_name = "rock";
$insert_genre->execute();

$genre_id = 3;
$genre_name = "country";
$insert_genre->execute();

$genre_id = 4;
$genre_name = "hip-hop";
$insert_genre->execute();
$insert_genre->close();

$insert_award = $db_connection->prepare(
	"INSERT INTO award
       (award_id, award_name) VALUES(?,?);");
$insert_award->bind_param("is",$award_id, $award_name);

$award_id = 1;
$award_name = "People's Choice award";
$insert_award->execute();

$award_id = 2;
$award_name = "Teen's Choice award";
$insert_award->execute();

$award_id = 3;
$award_name = "Billboard Top 100";
$insert_award->execute();

$insert_award->close();

$insert_artist = $db_connection->prepare(
	"INSERT INTO artist
       (artist_id, artist_name, artist_type) VALUES(?,?,?);");

$insert_artist->bind_param("iss",$artist_id,$artist_name,$artist_type);

$artist_id = 1;
$artist_name = "Mike Shinoda";
$artist_type = "Rapper";

$artist_id = 2;
$artist_name = "Red Velvet";
$artist_type = "Japanese Band";

$insert_artist->execute();
$insert_artist->close();

$insert_album = $db_connection->prepare(
	"INSERT INTO album
       (album_id,
	album_name,
	album_release,
	record_id,
	award_id,
	genre_id,
	downloaded,
	era_id) VALUES(?,?,?,?,?,?,?,?);");
$insert_album->bind_param("isiiiiii",
	$album_id,
	$album_name,
	$album_release,
	$record_id,
	$award_id,
	$genre_id,
	$dowloaded,
	$era_id);

$album_id = 1;
$album_name = "Post Traumatic";
$album_release = 2018;
$record_id = 4;
$award_id = NULL;
$genre_id = 4;
$dowloaded = 0;
$era_id = 7;
$insert_album->execute();
		
$album_id = 2;
$album_name = "Cookie Jar";
$album_release = 2018;
$record_id = 4;
$award_id = NULL;
$genre_id = 1;
$dowloaded = 0;
$era_id = 7;
$insert_album->execute();
$insert_album->close();

$insert_user = $db_connection->prepare(
	"INSERT INTO user
	(user_id,
	username,
	password,
	email,
	first_name,
	last_name,
	role_id,
	creation_date) VALUES(?,?,?,?,?,?,?,?);");
$insert_user->bind_param("isssssii",
	$user_id,
	$username,
	$password,
	$email,
	$first_name,
	$last_name,
	$role_id,
	$creation_date);

$user_id = 1;	
$username = "rheng";
$password = "frogprince";
$email = "rheng@email.com";
$first_name = "rithy";
$last_name = "heng";
$role_id = 1;
$creation_date = 2018;
$insert_user->execute();

$insert_user->close();

$insert_song = $db_connection->prepare(
	"INSERT INTO song
	(song_id,
	song_title,
	artist_id,
	album_id,
	song_release,
	song_length) VALUES(?,?,?,?,?,?);");
$insert_song->bind_param("isiiii",
	$song_id,
	$song_title,
	$artist_id,
	$album_id,
	$song_release,
	$song_length);

$song_id = 1;
$song_title = "Cause it's You";
$artist_id = 2;
$album_id = 2;
$song_release = 2018;
$song_length = 3;
$insert_song->execute();

$song_id = 2;
$song_title = "Place to Start";
$artist_id = 1;
$album_id = 1;
$song_release = 2018;
$song_length = 3;
$insert_song->execute();

$insert_song->close();

/*$insert_playlist = $db_connection->prepare(
	"INSERT INTO playlist
	playlist_id,
	playlist_title,
	user_id,
	private_status) VALUES(?,?,?,?);");
$insert_playlist->bind_param("isii",
	$playlist_id,
	$playlist_title,
	$user_id,
	$private_status);

$playlist_id = 1;
$playlist_title = "My first playlist";
$user_id = 1;
$private_status = 1;
$insert_playlist->execute();

$playlist_id = 2;
$playlist_title = "My second playlist";
$user_id = 1;
$private_status = 1;
$insert_playlist->execute();
 
$insert_playlist->close();

$insert_songlist = $db_connection->prepare(
	"INSERT INTO songlist
	(song_id,playlist__id) VALUES(?,?);");
$insert_songlist->bind_param("ii",
	$song_id,
	$playlist_id);
$song_id = 2;
$playlist_id = 1;
$insert_songlist->execute();

$insert_songlist->close();
$insert_popularity = $db_connection->prepare(
	"INSERT INTO popularity
	(song_id,
	user_id,
	rating,
	num_downloads,
	num_played) VALUES(?,?,?,?,?);");
$insert_popularity->bind_param("iiiii",
	$song_id,
	$user_id,
	$rating,
	$num_downloads,
	$num_played);

$song_id = 1;
$user_id = 1;
$rating = 5;
$num_downloads = 2;
$num_played = 52;
$insert_popularity->execute();
$insert_popularity->close();
 */
$db_connection->close();

?>
