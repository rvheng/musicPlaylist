<?php

//======================================================================
// ADMIN ADD GENRE
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

$genre_name = $_POST['genre_name'];

$insert_genre = $db_connection->prepare(
    "INSERT INTO genre (genre_name) VALUES(?);");
$insert_genre->bind_param("s", $genre_name);
$insert_genre->execute();
$insert_genre->close();

echo "Successfully Created Genre";
  
?>
