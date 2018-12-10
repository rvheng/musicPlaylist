<?php

//======================================================================
// GET PLAYLISTS
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));
session_start();

$_SESSION['playlist_results'] = [];

if(!isset($_POST['playlist_name'])){	
	$select_playlist = $db_connection->prepare("SELECT playlist_id, playlist_title FROM playlist;");
	$select_playlist->execute();
	$result = $select_playlist->get_result();

	while($row = $result->fetch_assoc()){
		$_SESSION['playlist_results'][] = $row;
	}

	$select_playlist->close();
	
	//If coming from music +
	if(isset($_POST['music_playlist_add'])){
		$music_id = $_POST['music_playlist_add'];
		$_SESSION['music_playlist_add_id'] = $music_id;
	}
}
else {
	$playlist_name = "%{$_POST['playlist_name']}%";
	$select_playlist = $db_connection->prepare("SELECT playlist_id, playlist_title FROM playlist WHERE playlist_title LIKE ?;");
	$select_playlist->bind_param("s", $playlist_name);
	$select_playlist->execute();
	$result = $select_playlist->get_result();

	while($row = $result->fetch_assoc()){
		$_SESSION['playlist_results'][] = $row;
	}
		
	$select_playlist->close();

	//If coming from music +
	if(isset($_POST['music_playlist_add'])){
		$music_id = $_POST['music_playlist_add'];
		$_SESSION['music_playlist_add_id'] = $music_id;
	}
}

header("Location: ../admin/playlist_results.php");
?>
