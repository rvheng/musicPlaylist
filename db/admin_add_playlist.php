<?php

//======================================================================
// ADMIN ADD PLAYLIST
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

session_start();

$user = $_SESSION['user_name'];
$select_user = $db_connection->prepare(
	"SELECT user_id FROM user WHERE username = ?");
$select_user->bind_param("s", $user);
$select_user->execute();
$select_user->bind_result($user_id);
$select_user->fetch();
$select_user->close();

$playlist_name = $_POST['playlist_name'];
$status = 1;
$insert_playlist = $db_connection->prepare(
	"INSERT INTO playlist(
		playlist_title, 
		user_id,
		private_status) VALUES(?,?,?);");
$insert_playlist->bind_param("sii",
	$playlist_name,
	$user_id,
	$status);
$insert_playlist->execute();
$insert_playlist->close();

header("Location: ../db/admin_show_music.php");
  
?>
