<?php
//======================================================================
// CREATE ACCOUNT
//======================================================================

?>
<!doctype html>
<html lang="en">
  <head>
  <?php include_once (realpath(dirname(__FILE__).'/include/head.php')); ?>
  </head>
  <body>
  <?php include_once (realpath(dirname(__FILE__).'/include/header.php')); ?>
    <main role="main" class="container">
      <div class="row justify-content-sm-center">
        <div class="col-sm-4">
          <h1>Create Account</h1>
          <form action="<?php echo BASE_URL; ?>/db/create_account.php" method="post">
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
                <a href="<?php echo BASE_URL; ?>">Login</a> | <a href="<?php echo BASE_URL; ?>/forgot_pass.php">Forgot Password</a>
              </small>
          </p>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__).'/include/footer.php')); ?>
  </body>
</html>
