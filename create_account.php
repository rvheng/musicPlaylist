<?php
//======================================================================
// CREATE ACCOUNT
//======================================================================

  /* Start The Session */
  session_start(); 

  /* Path From Root */
  $path = realpath(dirname(__FILE__));

?>
<!doctype html>
<html lang="en">
  <head>
  <?php include_once $path . '/include/head.php'; ?>
  </head>
  <body>
  <?php include_once $path . '/include/header.php'; ?>
    <main role="main" class="container">
      <div class="row justify-content-sm-center">
        <div class="col-sm-4">
          <h1>Create Account</h1>
          <form action="./db/create_account.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="username" aria-describedby="username" placeholder="Enter username" name="username" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
            </div>
            <?php
              /* Error Message */
              if (isset($error)) {
                // uses bootstrap alert style for error messages
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
              }
            ?>
            <button type="submit" class="btn btn-primary">Create</button>
          </form>
          <hr />
          <p class="text-center">
              <small>
                <a href="../index.php">Login</a> | Forgot Password
              </small>
          </p>
        </div>
      </div>
    </main>
    <?php include_once $path . '/include/footer.php'; ?>
  </body>
</html>
