<?php

//======================================================================
// ADMIN ADD GENRE
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

$award_name = $_POST['award_name'];

$insert_award = $db_connection->prepare(
    "INSERT INTO award (award_name) VALUES(?);");
$insert_award->bind_param("s", $award_name);
$insert_award->execute();
$insert_award->close();

header("Location: ../admin/music_add.php");

?>
