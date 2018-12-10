<?php

//======================================================================
// ADMIN ADD SONGLIST
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

$playlist_id = $_POST['songlist_playlist_id'];
$song_id = $_POST['songlist_song_id'];

$insert_songlist = $db_connection->prepare(
    "INSERT INTO songlist (playlist_id, song_id) VALUES(?,?);");
$insert_songlist->bind_param("ii", $playlist_id, $song_id);
$insert_songlist->execute();
$insert_songlist->close();

header("Location: ../db/admin_show_music.php");

?>
