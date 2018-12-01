<?php
//======================================================================
// ADMIN USER SEARCH
//======================================================================

include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));

if (isset($_POST['submit'])) {
  if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['uname']) || empty($_POST['email']) ) {
    $error = "All fields are empty!";
    return $error;
  }
} else {
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['search_fname'] = $_POST['fname'];
    $_SESSION['search_lname'] = $_POST['lname'];
    $_SESSION['search_uname'] = $_POST['uname'];
    $_SESSION['search_email'] = $_POST['email'];
    header("location: ./../admin/user_results.php");
  }
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
      <div class="row justify-content-sm-center">
        <div class="col-sm-9">
<!-- Page Content Goes Here -->
          <h1> Search for Current Users </h1>
<!-- Form to be added -->
          <form action="<?php echo BASE_URL; ?>/admin/user.php" method="post">
            <div class="form-row">
              <small id="helpBlock" class="form-text text-muted">
                Search using any or all fields below.
              </small>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
              </div>
              <div class="form-group col-md-6">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="uname">Username</label>
                <input type="text" class="form-control" id="uname" placeholder="Username" name="uname">
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
              </div>
            </div>
            <?php
              /* Error Message */
              if (isset($error)) {
                // uses bootstrap alert style for error messages
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
              }
            ?>
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>