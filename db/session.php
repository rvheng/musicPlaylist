<?php

//======================================================================
// Sessions
//======================================================================

  include 'config.php'; // update include
  session_start();
   
  $user_check = $_SESSION['login_user'];
  // Check user and get roll session from database
  $ses_sql = mysqli_query($conn,"SELECT username FROM user WHERE username ='$user_check'");

  # Note this should be changed to prepare statement
  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $user_name = $row['username'];
  //$user_role = $row['role'];

  // if there is no User logged in
  if(!isset($_SESSION['login_user'])){
    header("location: ./");
  }

  // Close the mysql connection
  // mysqli_close($conn); 
?>