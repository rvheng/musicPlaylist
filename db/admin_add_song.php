<?php

//======================================================================
// ADMIN ADD SONG
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

$song_name = $_POST['song_name'];
$song_artist = $_POST['artist_id'];
$song_album = $_POST['album_id'];
$song_release = $_POST['song_release'];
$song_length = $_POST['song_length'];

$insert_song = $db_connection->prepare(
	"INSERT INTO song (
		song_title, 
		artist_id,
		album_id,
		song_release,
		song_length) VALUES(?,?,?,?,?);");
$insert_song->bind_param("siiii", 
		$song_name,
		$song_artist,
		$song_album,
		$song_release,
		$song_length);
$insert_song->execute();
$insert_song->close();


header("Location: ../admin/music_add.php");
  
?>
