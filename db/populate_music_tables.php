<?php
require_once(realpath(dirname(__FILE__).'/config.php'));

// Sanitize The Database, by only keeping the values from populate_tables.php
// This restores the Database to it's original state and then inserts default
// songs.
//
$delete_eras = $db_connection->prepare("DELETE FROM era where era_id > 7;");
$delete_eras->execute();
$delete_eras->close();

$delete_genres = $db_connection->prepare("DELETE FROM genre where genre_id > 4;");
$delete_genres->execute();
$delete_genres->close();

$delete_awards = $db_connection->prepare("DELETE FROM award where award_id > 3;");
$delete_awards->execute();
$delete_awards->close();

$delete_song = $db_connection->prepare("DELETE FROM song;");
$delete_song->execute();
$delete_song->close();

$delete_artists = $db_connection->prepare("DELETE FROM artist;");
$delete_artists->execute();
$delete_artists->close();

$delete_albums = $db_connection->prepare("DELETE FROM album;");
$delete_albums->execute();
$delete_albums->close();

// End Sanitize


$insert_album = $db_connection->prepare(
	"INSERT INTO album
       (album_id,
	album_name,
	album_release,
	record_id,
	award_id,
	genre_id,
	era_id) VALUES(?,?,?,?,?,?,?);");
$insert_album->bind_param("isiiiii",
	$album_id,
	$album_name,
	$album_release,
	$record_id,
	$award_id,
	$genre_id,
	$era_id);


$album_name = "Post Traumatic";
$album_id = 1;
$album_release = 2018;
$record_id = 4;
$award_id = NULL;
$genre_id = 4;
$era_id = 7;
$insert_album->execute();

$album_name = "Cookie Jar";
$album_id = 2;
$album_release = 2018;
$record_id = 4;
$award_id = NULL;
$genre_id = 1;
$era_id = 7;
$insert_album->execute();

$album_name = "Age ain't nothing but a Number";
$album_id = 3;
$album_release = 1994;
$record_id = 1;
$award_id = NULL;
$genre_id = 1;
$era_id = 5;
$insert_album->execute();
		
$album_name = "Cher";
$album_id = 4;
$album_release = 1966;
$record_id = 1;
$award_id = NULL;
$genre_id = 1;
$era_id = 2;
$insert_album->execute();

$album_name = "Love Songs";
$album_id = 10;
$album_release = 1977;
$record_id = 3;
$award_id = NULL;
$genre_id = 2;
$era_id = 3;
$insert_album->execute();

$album_name = "American Idiot";
$album_id = 11;
$album_release = 2004;
$record_id = 2;
$award_id = NULL;
$genre_id = 2;
$era_id = 6;
$insert_album->execute();

$album_name = "All I Want";
$album_id = 12;
$album_release = 1995;
$record_id = 3;
$award_id = NULL;
$genre_id = 3;
$era_id = 5;
$insert_album->execute();

$album_name = "Blown Away";
$album_id = 13;
$album_release = 2012;
$record_id = 2;
$award_id = NULL;
$genre_id = 3;
$era_id = 7;
$insert_album->execute();

$album_name = "Poetic Justice";
$album_id = 14;
$album_release = 1992;
$record_id = 4;
$award_id = NULL;
$genre_id = 4;
$era_id = 5;
$insert_album->execute();

$album_name = "Control";
$album_id = 15;
$album_release = 1986;
$record_id = 4;
$award_id = NULL;
$genre_id = 4;
$era_id = 4;
$insert_album->execute();

$insert_album->close();

$insert_artist = $db_connection->prepare(
	"INSERT INTO artist
	(artist_id,
	artist_name,
	artist_type) VALUES(?,?,?);");
$insert_artist->bind_param("iss",
	$artist_id,
	$artist_name,
	$artist_type);

$artist_id = 1;
$artist_name = "Mike Shinoda";
$artist_type = "Rapper";
$insert_artist->execute();

$artist_id = 2;
$artist_name = "Red Velvet";
$artist_type = "Japanese Band";
$insert_artist->execute();

$artist_id = 3;
$artist_name = "Aaliyah";
$artist_type = "Singer";
$insert_artist->execute();

$artist_id = 4;
$artist_name = "Cher";
$artist_type = "Singer";
$insert_artist->execute();

$artist_id = 10;
$artist_name = "The Beatles";
$artist_type = "Band";
$insert_artist->execute();

$artist_id = 11;
$artist_name = "Green Day";
$artist_type = "Band";
$insert_artist->execute();

$artist_id = 12;
$artist_name = "Tim McGraw";
$artist_type = "Singer";
$insert_artist->execute();

$artist_id = 13;
$artist_name = "Carrie Underwood";
$artist_type = "Singer";
$insert_artist->execute();

$artist_id = 14;
$artist_name = "Tupac Sha'kur";
$artist_type = "Solo";
$insert_artist->execute();

$artist_id = 15;
$artist_name = "Janet Jackson";
$artist_type = "Solo";
$insert_artist->execute();

$insert_artist->close();


$insert_song = $db_connection->prepare(
	"INSERT INTO song
	(song_title,
	artist_id,
	album_id,
	song_release,
	song_length) VALUES(?,?,?,?,?);");
$insert_song->bind_param("siiii",
	$song_title,
	$artist_id,
	$album_id,
	$song_release,
	$song_length);

$song_title = "Cause It's You";
$artist_id = 2;
$album_id = 2;
$song_release = 2018;
$song_length = 3;
$insert_song->execute();

$song_title = "Place to Start";
$artist_id = 1;
$album_id = 1;
$song_release = 2018;
$song_length = 3;
$insert_song->execute();

$song_title = "Intro";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Intro";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Throw your hands up";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Back and Forth";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Age ain't nothing but a number";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Down with the Clique";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "No one knows how to love me like you do";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "I'm So into You";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Street Thang";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Young Nation";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Old School";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "I'm Down";
$artist_id = 3;
$album_id = 3;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Sunny";
$artist_id = 4;
$album_id = 4;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Twelf of Never";
$artist_id = 4;
$album_id = 4;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "You don't have to Say you Love me";
$artist_id = 4;
$album_id = 4;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Magic in the Air";
$artist_id = 4;
$album_id = 4;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Will You Love Me Tomorrow";
$artist_id = 4;
$album_id = 4;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Until it's Time for you to go";
$artist_id = 4;
$album_id = 4;
$song_release = 1994;
$song_length = 3;
$insert_song->execute();

$song_title = "Yesterday";
$artist_id = 10;
$album_id = 10;
$song_release = 1977;
$song_length = 3;
$insert_song->execute();

$song_title = "I'll Follow the Sun";
$artist_id = 10;
$album_id = 10;
$song_release = 1977;
$song_length = 3;
$insert_song->execute();

$song_title = "I Need You";
$artist_id = 10;
$album_id = 10;
$song_release = 1977;
$song_length = 3;
$insert_song->execute();

$song_title = "Girl";
$artist_id = 10;
$album_id = 10;
$song_release = 1977;
$song_length = 3;
$insert_song->execute();

$song_title = "In My Life";
$artist_id = 10;
$album_id = 10;
$song_release = 1977;
$song_length = 3;
$insert_song->execute();

$song_title = "Words of Love";
$artist_id = 10;
$album_id = 10;
$song_release = 1977;
$song_length = 3;
$insert_song->execute();

$song_title = "American Idiot";
$artist_id = 11;
$album_id = 11;
$song_release = 2004;
$song_length = 3;
$insert_song->execute();

$song_title = "Jesus of Suburbia";
$artist_id = 11;
$album_id = 11;
$song_release = 2004;
$song_length = 3;
$insert_song->execute();

$song_title = "Holiday";
$artist_id = 11;
$album_id = 11;
$song_release = 2004;
$song_length = 3;
$insert_song->execute();

$song_title = "Boulevard of Broken Dreams";
$artist_id = 11;
$album_id = 11;
$song_release = 2004;
$song_length = 3;
$insert_song->execute();

$song_title = "Are We the Waiting";
$artist_id = 11;
$album_id = 11;
$song_release = 2004;
$song_length = 3;
$insert_song->execute();

$song_title = "Wake Me Up When September Ends";
$artist_id = 11;
$album_id = 11;
$song_release = 2004;
$song_length = 3;
$insert_song->execute();

$song_title = "She Never Lets It Go to Her Heart";
$artist_id = 12;
$album_id = 12;
$song_release = 1995;
$song_length = 3;
$insert_song->execute();

$song_title = "All I Want Is a Life";
$artist_id = 12;
$album_id = 12;
$song_release = 1995;
$song_length = 3;
$insert_song->execute();

$song_title = "Can't Be Really Gone";
$artist_id = 12;
$album_id = 12;
$song_release = 1995;
$song_length = 3;
$insert_song->execute();

$song_title = "Maybe We Should Just Sleep on It";
$artist_id = 12;
$album_id = 12;
$song_release = 1995;
$song_length = 3;
$insert_song->execute();

$song_title = "I didn't Ask and She Didn't Say";
$artist_id = 12;
$album_id = 12;
$song_release = 1995;
$song_length = 3;
$insert_song->execute();

$song_title = "Renegade";
$artist_id = 12;
$album_id = 12;
$song_release = 1995;
$song_length = 3;
$insert_song->execute();

$song_title = "I Like It, I Love It";
$artist_id = 12;
$album_id = 12;
$song_release = 1995;
$song_length = 3;
$insert_song->execute();

$song_title = "Good Girl";
$artist_id = 13;
$album_id = 13;
$song_release = 2012;
$song_length = 3;
$insert_song->execute();

$song_title = "Blown Away";
$artist_id = 13;
$album_id = 13;
$song_release = 2012;
$song_length = 3;
$insert_song->execute();

$song_title = "Two Black Cadillacs";
$artist_id = 13;
$album_id = 13;
$song_release = 2012;
$song_length = 3;
$insert_song->execute();

$song_title = "See You Again";
$artist_id = 13;
$album_id = 13;
$song_release = 2012;
$song_length = 3;
$insert_song->execute();

$song_title = "Don't You Think About Me";
$artist_id = 13;
$album_id = 13;
$song_release = 2012;
$song_length = 3;
$insert_song->execute();

$song_title = "Forever Changed";
$artist_id = 13;
$album_id = 13;
$song_release = 2012;
$song_length = 3;
$insert_song->execute();

$song_title = "Nobody Ever Told You";
$artist_id = 13;
$album_id = 13;
$song_release = 2012;
$song_length = 3;
$insert_song->execute();

$song_title = "One Way Ticket";
$artist_id = 13;
$album_id = 13;
$song_release = 2012;
$song_length = 3;
$insert_song->execute();

$song_title = "Thank God For Hometowns";
$artist_id = 13;
$album_id = 13;
$song_release = 2012;
$song_length = 3;
$insert_song->execute();

$song_title = "Get It Up";
$artist_id = 14;
$album_id = 14;
$song_release = 1992;
$song_length = 3;
$insert_song->execute();

$song_title = "Indo Smoke";
$artist_id = 14;
$album_id = 14;
$song_release = 1992;
$song_length = 3;
$insert_song->execute();

$song_title = "One in a Million";
$artist_id = 14;
$album_id = 14;
$song_release = 1992;
$song_length = 3;
$insert_song->execute();

$song_title = "Poor Man's Poetry";
$artist_id = 14;
$album_id = 14;
$song_release = 1992;
$song_length = 3;
$insert_song->execute();

$song_title = "Definition of a Thug Nigga";
$artist_id = 14;
$album_id = 14;
$song_release = 1992;
$song_length = 3;
$insert_song->execute();

$song_title = "Cash in My Hands";
$artist_id = 14;
$album_id = 14;
$song_release = 1992;
$song_length = 3;
$insert_song->execute();

$song_title = "I Wanna Be a Man";
$artist_id = 14;
$album_id = 14;
$song_release = 1992;
$song_length = 3;
$insert_song->execute();

$song_title = "Well Alright";
$artist_id = 14;
$album_id = 14;
$song_release = 1992;
$song_length = 3;
$insert_song->execute();


$song_title = "Control";
$artist_id = 15;
$album_id = 15;
$song_release = 1986;
$song_length = 3;
$insert_song->execute();

$song_title = "Nasty";
$artist_id = 15;
$album_id = 15;
$song_release = 1986;
$song_length = 3;
$insert_song->execute();

$song_title = "What Have You Done for Me Lately";
$artist_id = 15;
$album_id = 15;
$song_release = 1986;
$song_length = 3;
$insert_song->execute();

$song_title = "You Can be Mine";
$artist_id = 15;
$album_id = 15;
$song_release = 1986;
$song_length = 3;
$insert_song->execute();

$song_title = "The Pleasure Principle";
$artist_id = 15;
$album_id = 15;
$song_release = 1986;
$song_length = 3;
$insert_song->execute();

$song_title = "When I Think of You";
$artist_id = 15;
$album_id = 15;
$song_release = 1986;
$song_length = 3;
$insert_song->execute();

$song_title = "He Doesn't Know I'm Alive";
$artist_id = 15;
$album_id = 15;
$song_release = 1986;
$song_length = 3;
$insert_song->execute();

$song_title = "Let's Wait Awhile";
$artist_id = 15;
$album_id = 15;
$song_release = 1986;
$song_length = 3;
$insert_song->execute();

$insert_song->close();

echo "Successfuly Populated Music";

?>
