<?php
//======================================================================
// AUTHENTICATE USER
//======================================================================
$path = realpath(dirname(__FILE__, 2));
require_once(realpath(dirname(__FILE__).'/config.php'));

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
    $salt = 'hashbrowns';
    $username = $_POST['username'];
    //$pass = $_POST["password"]; // Fix use salt
    $pass = crypt($_POST["password"], $salt );
    
    // Protect against MYSQL injection
    $username = stripslashes($username);
    $pass = stripslashes($pass);
    $username = mysqli_real_escape_string($db_connection, $username);
    $pass = mysqli_real_escape_string($db_connection, $pass);

    // SQL query to fetch information and find match user
    // should this use prepare?
    $query = mysqli_query($db_connection, "SELECT * FROM user WHERE password='" . $pass . "' AND username='" . $username . "'"); 
    $rows = mysqli_num_rows($query);

    if($rows == 1) {
      session_start(); 
      $_SESSION['login_user']=$username;
      //$_SESSION['roll']=1;
      header("location: ./../user");
    }else{
      echo "Username or Password did not match!";
      //$error = "Username or Password did not match!";
      //$_SESSION['error']=$error;
      //header("location: ./../index.php");
    }
    // close the mysql connection
    mysqli_close($db_connection); 
  }else{

    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy(); 
  }
}

?>