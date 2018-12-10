<?php

//======================================================================
// ADMIN ADD PLAYLIST
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));


// SANITIZE THE DATABASE. THIS SHOULD ONLY BE RUN ONCE SO DO NOT COPY-PASTE
// TO OTHER FUNCTION

$drop_songlist = $db_connection->prepare("DROP table songlist;");
$drop_songlist->execute();
$drop_songlist->close();

$alter_table = $db_connection->prepare("ALTER table playlist modify COLUMN playlist_id int auto_increment");
$alter_table->execute();
$alter_table->close();

$create_songlist = $db_connection->prepare(
	"CREATE TABLE songlist
	(song_id int NOT NULL,
	playlist_id int NOT NULL,
	FOREIGN KEY(song_id) REFERENCES song(song_id)
	ON UPDATE CASCADE
	ON DELETE CASCADE,
	FOREIGN KEY(playlist_id) REFERENCES playlist(playlist_id)
	ON UPDATE CASCADE
	ON DELETE CASCADE)");

$create_songlist->execute();
$create_songlist->close();

echo "Database successfully patched."
  
?>
