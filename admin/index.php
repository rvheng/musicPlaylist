<?php
//======================================================================
// ADMIN DASHBOARD
//======================================================================
include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));
header("Location: ./../admin/playlist.php");

/*
include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));


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
          <h1> Welcome <?php echo $user_name; ?> </h1>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>
*/
?>