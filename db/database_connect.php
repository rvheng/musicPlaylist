<?php

// Make sure the database exists first
require_once(realpath(dirname(__FILE__).'/create_database.php'));

$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	OR die("Failed to connect to Database <br>" .
	$db_connection->connect_error);

?>
