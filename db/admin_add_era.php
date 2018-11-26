<?php

//======================================================================
// ADMIN ADD ERA
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

$era_year = $_POST['era_name'];

$insert_era = $db_connection->prepare(
    "INSERT INTO era (era_year) VALUES(?);");
$insert_era->bind_param("i", $era_year);
$insert_era->execute();
$insert_era->close();

header("Location: ../admin/music_add.php");
  
?>
