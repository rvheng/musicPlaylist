<?php
//======================================================================
// LOGIN PAGE
//======================================================================

  /* Start The Session */
  session_start(); 

?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once "./include/head.php"; ?>
  </head>
  <body>
    <?php include_once "./include/header.php"; ?>
    <main role="main" class="container">
      <div class="row justify-content-sm-center">
        <div class="col-sm-4">
          <h1>Login</h1>
          <form action="./db/authenticate.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="username" placeholder="Enter username" name="username" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="password" required>
            </div>
            <?php
              /* Error Message */
              if (isset($error)) {
                // uses bootstrap alert style for error messages
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
              }
            ?>
            <button type="submit" class="btn btn-primary">Log In</button>
          </form>
          <hr />
          <p class="text-center">
              <small>
                <a href="./create_account.php">Create An Account</a> | Forgot Password
              </small>
          </p>
        </div>
      </div>
    </main>
    <?php include_once "./include/footer.php"; ?>
  </body>
</html>
