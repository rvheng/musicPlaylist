<?php

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$servername = "localhost";
$username = "root";
$password = "snuggle";
$db_name = "practice";
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect($servername, $username, $password, $db_name);
//$db = mysqli_select_db($conn, $db_name) or die("No Database Found");
 
// Check connection
if(!$conn) {
    die("Connetcion failed: " . mysqli_connect_error());
}
$message = "DB Connected successfully";

?>