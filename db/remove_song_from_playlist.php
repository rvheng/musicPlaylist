
<?php
//======================================================================
// ADMIN REMOVE FROM SONGLIST 
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

$playlist_id = $_POST['music_playlist_rem_playlist'];
$song_id = $_POST['music_playlist_rem_song'];

$delete_songlist = $db_connection->prepare(
    "DELETE FROM songlist WHERE playlist_id = ? AND song_id = ?;");
$delete_songlist->bind_param("ii", $playlist_id, $song_id);
$delete_songlist->execute();
$delete_songlist->close();

header("Location: ./../admin/playlist_edit.php");

?>
