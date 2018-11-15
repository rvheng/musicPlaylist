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
    <div class="row justify-content-sm-center">
        <div class="col-sm-9">
          <h1> Edit User </h1>
          <?php
            // Add Music Statment
            //
          ?>
          <form action="" method="post">
            <fieldset>
              <legend>Artist:</legend>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="artist_name">Artist Name</label>
                  <input type="text" class="form-control" id="artist_name" placeholder="Artist Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="artist_type">Artist Type</label>
                  <input type="text" class="form-control" id="artist_type" placeholder="Artist Name">
                </div>
              </div>
            </fieldset>
            
            
            <?php
              /* Error Message */
              if (isset($error)) {
                // uses bootstrap alert style for error messages
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
              }
            ?>
            <button type="submit" class="btn btn-primary">Edit User</button>
            <button type="reset" class="btn btn-warning">Reset</button>
          </form>
          <hr />
          <a onclick="goBack()" class="text-info"><i class="fas fa-undo-alt"></i> Previous Page</a>

      </div>
    </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>