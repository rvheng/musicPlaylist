<?php
//======================================================================
// CREATE ACCOUNT
//======================================================================

require_once(realpath(dirname(__FILE__).'/config.php'));
    
session_start(); 

//-----------------------------------------------------
// Primary Function
//-----------------------------------------------------

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $salt = '$1$somethin$';

  $stmt = "INSERT INTO user
  (username,
  pass,
  email,
  first_name,
  last_name,
  role_id) VALUES(?,?,?,?,?,?)"

  // prepare and bind
  if($insert_user = $db_connection->prepare($stmt)) { // problem here

    $insert_user->bind_param("isssssii",
      $username,
      $pass,
      $email,
      $first_name,
      $last_name,
      $role_id);

      // set parameters and execute
      $username = $_POST['username'];
      $pass = crypt($_POST["password"], $salt );
      $email = $_POST['email'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $role_id = 1;

    $insert_user->execute();

    echo "New records created succesfully";
  } else {
    $error = $mysqli->errno . ' ' . $mysqli->error;
    echo $error; // 1054 Unknown column 'foo' in 'field list'
  }

  $insert_user->close();
  $db_connection->close();

}else{
  //remove all session variables
  session_unset(); 

  // destroy the session 
  session_destroy();
}
 
?>