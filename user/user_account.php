<?php
//======================================================================
// USER ACCOUNT
//======================================================================

include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));

// if the form submitted update the user
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $salt = 'hashbrowns';

  $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $update_usr = $db_connection->prepare("UPDATE user SET first_name = ?, last_name = ?, username = ?, email = ?, password = ? WHERE user_id = ?");
  $update_usr->bind_param("sssssi", 
    $_POST['first_name'], 
    $_POST['last_name'], 
    $_POST['username'], 
    $_POST['email'], 
    $pass, 
    $_SESSION['edit_user_id']);

    // set parameters and execute
    $pass = crypt($_POST["password"], $salt );

  $update_usr->execute();
  if($update_usr->affected_rows === 0) exit('No rows updated');
  $update_usr->close();
  $message = "Update Successful!";
  //header("location: ./../user/user_account.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/head.php')); ?>
  </head>
  <body>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/header.php')); ?>
    <main role="main" class="container">
    <h1> Edit User <?php echo $user_name; ?> </h1>
          <?php

            $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $editusr = $db_connection->prepare("SELECT first_name, last_name, username, email, password  FROM user WHERE username = ?");
            if ($editusr === FALSE) {
              echo "Connection Failed";
              die($db_connection->error);
            }
            $editusr->bind_param('s', $user_name);
            $editusr->execute();
            $result = $editusr->get_result();
            if($result->num_rows === 0) exit('No rows');
            while($row = $result->fetch_assoc()) {
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];
              $email = $row['email'];
              $username = $row['username'];
              $password = $row['password'];
            }
            $editusr->close();
          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
            </div>
            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
              <label for="password1">Password</label>
              <input type="password" class="form-control" id="password1" name="password" value="<?php echo $password; ?>">
            </div>
            <?php
              /* Error Message */
              if (isset($error)) {
                // uses bootstrap alert style for error messages
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
              }
              if (isset($message)) {
                // uses bootstrap alert style for error messages
                echo '<div class="alert alert-info" role="alert">' . $message . '</div>';
              }
            ?>
            <button type="submit" class="btn btn-primary">Update User</button>
            
          </form>
          <hr />
          <a onclick="goBack()" class="text-info"><i class="fas fa-undo-alt"></i> Previous Page</a>

      </div>
    </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>