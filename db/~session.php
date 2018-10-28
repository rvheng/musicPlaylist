<?php
  include 'config.php';
  session_start();
   
  $user_check = $_SESSION['login_user'];
  // Check user session against database
  $ses_sql = mysqli_query($conn,"SELECT username FROM user WHERE username ='$user_check'");

  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $login_user = $row['username'];

  // if there is no User logged in
  if(!isset($_SESSION['login_user'])){
    header("location: ./");
  }

  // Close the mysql connection
  // mysqli_close($conn); 
?>