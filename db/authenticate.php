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
} else {
  /* Check the Username and Password */
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $salt = 'hashbrowns';
    $username = $_POST['username'];
    //$pass = $_POST["password"]; // Fix use salt
    $pass = crypt($_POST["password"], $salt );
    $user_roll = 0;
    
    // Protect against MYSQL injection
    $username = stripslashes($username);
    $pass = stripslashes($pass);
    $username = mysqli_real_escape_string($db_connection, $username);
    $pass = mysqli_real_escape_string($db_connection, $pass);

    // SQL query to fetch information and find match user
    // should this use prepare?
    // $query = mysqli_query($db_connection, "SELECT * FROM user WHERE password='" . $pass . "' AND username='" . $username . "'"); 
    // $rows = mysqli_num_rows($query);
    $select_user = $db_connection->prepare(
      "SELECT username,role_id FROM user WHERE username = ? AND password = ? LIMIT 1");
    $select_user->bind_param("ss", $username, $pass);
    $select_user->execute();
    $select_user->bind_result($user_name, $user_role);
    $select_user->store_result();

    if($select_user->num_rows == 1) {
      if($select_user->fetch()) {

        session_start(); 
        # This area needs to send users and admins to there own directory
        $_SESSION['login_user']=$username;
        $_SESSION['user_role'] = $user_role;

        if ($_SESSION['user_role'] == 1) {
          header("location: ./../user");
        } elseif ($_SESSION['user_role'] == 2) {
          header("location: ./../admin/");
        } else {
          //header("location: ../");
          echo "problem...";
        }
      
      }
    }else{
      echo "Username or Password did not match!";
      //header("location: ./../");
    }
    // close the mysql connection
    $select_user->close();
  }else{

    // remove all session variables
    session_unset(); 
    // destroy the session 
    session_destroy(); 
  }
}

?>