<?php
//======================================================================
// AUTHENTICATE USER
//======================================================================

include_once "config.php";
session_start();

//-----------------------------------------------------
// Primary Function
//-----------------------------------------------------
if (isset($_POST['submit'])) {
  /* When Username or Password is Empty Stop */
  if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password is empty!";
    return $error;
  }
}else{
  /* Check the Username and Password */
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $salt = '$1$somethin$';

    // Protect against MYSQL injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // SQL query to fetch information and find match user
    $query = mysqli_query($conn, "SELECT * FROM user WHERE pass='$password' AND username='$username'");
    $rows = mysqli_num_rows($query);

    if($rows == 1) {
      $_SESSION['login_user']=$username;
      header("location: ./home.php");
    }else{
      $error = "Username or Password did not match!";
    }
    // close the mysql connection
    mysqli_close($conn); 
  }else{

    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy(); 
  }
}

?>