<?php

//======================================================================
// ADMIN ADD ALBUM
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

$album_name = $_POST['album_name'];
$album_release = $_POST['album_release'];
$album_record_label = $_POST['record_id'];
$album_era = $_POST['era_id'];
$album_genre = $_POST['genre_id'];
$album_award = $_POST['award_id'];

$insert_album = $db_connection->prepare(
	"INSERT INTO album (
		album_name, 
		album_release,
		record_id,
		award_id,
		genre_id,
		era_id) VALUES(?,?,?,?,?,?);");
$insert_album->bind_param("siiiii", 
		$album_name,
		$album_release,
		$album_record_label,
		$album_era,
		$album_genre,
		$album_award);
$insert_album->execute();
$insert_album->close();

header("Location: ../admin/music_add.php");

?>
