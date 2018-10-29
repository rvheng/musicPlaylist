<?php
require_once(realpath(dirname(__FILE__).'/database_connect.php'));

$create_record = $db_connection->prepare(
	"CREATE OR REPLACE TABLE record_label
	(record_id int NOT NULL AUTO_INCREMENT,
	record_label varchar(255) NOT NULL,
	PRiMARY KEY(record_id));");
$create_record->execute();
$create_record->close();

$create_role = $db_connection->prepare(
	"CREATE OR REPLACE TABLE role
       (role_id int NOT NULL AUTO_INCREMENT,
	role_type varchar(255) NOT NULL,
	PRIMARY KEY(role_id));");
$create_role->execute();
$create_role->close();

$create_era = $db_connection->prepare(
	"CREATE OR REPLACE TABLE era
       (era_id int NOT NULL AUTO_INCREMENT,
	era_year int NOT NULL,
	PRIMARY KEY(era_id));");
$create_era->execute();
$create_era->close();

$create_genre = $db_connection->prepare(
	"CREATE OR REPLACE TABLE genre
       (genre_id int NOT NULL AUTO_INCREMENT,
	genre_name varchar(255) NOT NULL,
	PRIMARY KEY(genre_id));");
$create_genre->execute();
$create_genre->close();

$create_award = $db_connection->prepare(
	"CREATE OR REPLACE TABLE award
       (award_id int NOT NULL AUTO_INCREMENT,
	award_name varchar(255) NOT NULL,
	PRIMARY KEY(award_id));");
$create_award->execute();
$create_award->close();

$create_artist = $db_connection->prepare(
	"CREATE OR REPLACE TABLE artist
       (artist_id int NOT NULL AUTO_INCREMENT,
	artist_name varchar(255) NOT NULL,
	artist_type varchar(255),
	PRIMARY KEY(artist_id));");
$create_artist->execute();
$create_artist->close();

$create_album = $db_connection->prepare(
	"CREATE OR REPLACE TABLE album
       (album_id int NOT NULL AUTO_INCREMENT,
	album_name varchar(255) NOT NULL,
	album_release int NOT NULL,
	record_id int,
	award_id int,
	genre_id int NOT NULL,
	downloaded bit NOT NULL,
	era_id int NOT NULL,
	PRIMARY KEY(album_id),
	FOREIGN KEY(record_id) REFERENCES record_label(record_id),
	FOREIGN KEY(award_id) REFERENCES award(award_id),	
	FOREIGN KEY(genre_id) REFERENCES genre(genre_id), 	
	FOREIGN KEY(era_id) REFERENCES era(era_id));");
$create_album->execute();
$create_album->close();

$create_user = $db_connection->prepare(
	"CREATE OR REPLACE TABLE user
	(user_id int NOT NULL AUTO_INCREMENT,
	username varchar(255) NOT NULL,
	pass varchar(255) NOT NULL,
	email varchar(255),
	first_name varchar(255),
	last_name varchar(255),
	role_id int NOT NULL,
	creation_date timestamp,
	PRIMARY KEY(user_id),
	FOREIGN KEY(role_id) REFERENCES role(role_id));");
$create_user->execute();
$create_user->close();

$create_song = $db_connection->prepare(
	"CREATE OR REPLACE TABLE song
	(song_id int NOT NULL AUTO_INCREMENT,
	song_title varchar(255) NOT NULL,
	artist_id int NOT NULL,
	album_id int NOT NULL,
	song_release date,
	song_length time,
	PRIMARY KEY(song_id),
	FOREIGN KEY(artist_id) REFERENCES artist(artist_id),
	FOREIGN KEY(album_id) REFERENCES album(album_id));");	
$create_song->execute();
$create_song->close();

$create_playlist = $db_connection->prepare(
	"CREATE OR REPLACE TABLE playlist
	(playlist_id int NOT NULL,
	playlist_title varchar(255),
	user_id int NOT NULL,
	private_status int,
	PRIMARY KEY(playlist_id),
	FOREIGN KEY(user_id) REFERENCES user(user_id));");
$create_playlist->execute();
$create_playlist->close();

$create_songlist = $db_connection->prepare(
	"CREATE OR REPLACE TABLE songlist
	(song_id int NOT NULL,
	playlist_id int NOT NULL,
	FOREIGN KEY(song_id) REFERENCES song(song_id),
	FOREIGN KEY(playlist_id) REFERENCES playlist(playlist_id));");	
$create_songlist->execute();
$create_songlist->close();

$create_popularity = $db_connection->prepare(
	"CREATE OR REPLACE TABLE popularity
	(song_id int NOT NULL,
	user_id int NOT NULL,
	rating int NOT NULL,
	num_downloads int NOT NULL,
	num_played int NOT NULL,
	FOREIGN KEY(song_id) REFERENCES song(song_id),
	FOREIGN KEY(user_id) REFERENCES user(user_id));");
$create_popularity->execute();
$create_popularity->close();

?>
