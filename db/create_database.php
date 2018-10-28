<?php

DEFINE('DB_HOST', "localhost");
DEFINE('DB_USER', "root");
DEFINE('DB_PASSWORD', "snuggle"); //Note: this should be your root password
DEFINE('DB_NAME', "music_db");

$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD)
	OR die("Connection failed: " . $db_connection->connect_error);

$create_stmt = "CREATE OR REPLACE DATABASE music_db";
$prep_stmt = $db_connection -> prepare($create_stmt);
$prep_stmt->execute();
$prep_stmt->close();

$db_connection->close();

?>
