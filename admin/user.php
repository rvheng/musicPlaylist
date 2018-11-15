<?php
//======================================================================
// ADMIN USER SEARCH
//======================================================================

include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));

?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/head.php')); ?>
  </head>
  <body>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/header.php')); ?>
    <main role="main" class="container">
      <!-- Page Content Goes Here -->
      <h1> User Administration </h1>
      <form>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname" placeholder="First Name">
          </div>
          <div class="form-group col-md-6">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" placeholder="Last Name">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="uname">Username</label>
            <input type="text" class="form-control" id="uname" placeholder="Username">
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
      </form>

    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>