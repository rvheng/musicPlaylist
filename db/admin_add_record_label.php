<?php

//======================================================================
// ADMIN ADD RECORD LABEL
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));

$record_name = $_POST['record_name'];

$insert_record_label = $db_connection->prepare(
    "INSERT INTO record_label (record_label) VALUES(?);");
$insert_record_label->bind_param("s", $record_name);
$insert_record_label->execute();
$insert_record_label->close();

header("Location: ../admin/music_add.php");
  
?>
