<?php

//======================================================================
// ADMIN ADD ARTIST
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

$artist_name = $_POST['artist_name'];
$artist_type = $_POST['artist_type'];

$insert_artist = $db_connection->prepare(
    "INSERT INTO artist (artist_name, artist_type) VALUES(?,?);");
$insert_artist->bind_param("ss", $artist_name, $artist_type);
$insert_artist->execute();
$insert_artist->close();

header("Location: ../admin/music_add.php");
?>
