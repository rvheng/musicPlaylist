<?php

//======================================================================
// Sessions
//======================================================================

  //include 'config.php'; // update include
  require_once(realpath(dirname(__FILE__).'/config.php'));
  session_start();
  
  $user_check = $_SESSION['login_user'];
  // Check user and get roll session from database

  $select_user = $db_connection->prepare(
    "SELECT username,role_id FROM user WHERE username = ?");
  $select_user->bind_param("s", $user_check);
  $select_user->execute();
  $select_user->bind_result($user_name, $user_role);
  $select_user->fetch();

  # Note this should be changed to prepare statement
  $_SESSION['user_name'] = $user_name;
  $_SESSION['user_role'] = $user_role;

  // if there is no User logged in
  if(!isset($user_name)){
    header("location: ./");
  }

  $select_user->close();
  // Close the mysql connection
  mysqli_close($db_connection); 
?>