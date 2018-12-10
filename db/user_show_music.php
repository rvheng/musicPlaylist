<?php

//======================================================================
// USER SHOW MUSIC
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));
session_start();

$_SESSION['music_results'] = [];

if(!isset($_POST['artist_name']) && 
	!isset($_POST['song_name']) && 
	!isset($_POST['album_name']) && 
	!isset($_POST['genre_id'])) {
	
	$select_music = $db_connection->prepare("SELECT 
		songs.song_id, songs.song_title, songs.artist_name, albums.album_name, albums.genre_name FROM 
		(SELECT song_id, song_title, artist_name, album_id FROM song natural join artist) as songs,
		(SELECT album_name, genre_name, album_id, genre_id FROM album natural join genre) as albums;"); 
	$select_music->execute();
	$result = $select_music->get_result();

	while($row = $result->fetch_assoc()){
		$_SESSION['music_results'][] = $row;
	}

	$select_music->close();
}
else {
	$artist_name = "%{$_POST['artist_name']}%";
	$song_name = "%{$_POST['song_name']}%";
	$album_name = "%{$_POST['album_name']}%";
	$genre_id = $_POST['genre_id'];

	$select_music = $db_connection->prepare("SELECT 
		songs.song_id, songs.song_title, songs.artist_name, albums.album_name, albums.genre_name FROM 
		(SELECT song_id, song_title, artist_name, album_id FROM song natural join artist) as songs,
		(SELECT album_name, genre_name, album_id, genre_id FROM album natural join genre) as albums 
		WHERE
		songs.album_id = albums.album_id AND
		songs.song_title LIKE ? AND
		songs.artist_name LIKE ? AND
		albums.album_name LIKE ? AND
		albums.genre_id = ?;");
	$select_music->bind_param("sssi", $song_name, $artist_name, $album_name, $genre_id);
	$select_music->execute();
	$result = $select_music->get_result();

	while($row = $result->fetch_assoc()){
		$_SESSION['music_results'][] = $row;
	}

	$select_music->close();
}

header("Location: ../user/music_results.php");
?>
