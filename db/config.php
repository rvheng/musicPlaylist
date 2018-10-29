<?php
//======================================================================
// CREATE ACCOUNT
//======================================================================

/* Important - COMMENT THIS SECTION OUT */
error_reporting(E_ALL); //Error Reporting
ini_set('display_errors', 1); //Error Reporting
// end of error reporting

DEFINE('DB_HOST', "localhost");
DEFINE('DB_USER', "root");
DEFINE('DB_PASSWORD', "snuggle"); //Note: this should be your root password
DEFINE('DB_NAME', "music_db");

try {
  $db_connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die("Connection failed: " . $db_connection->connect_error);
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
} 

?>