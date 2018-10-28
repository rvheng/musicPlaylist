<?php
//======================================================================
// USER DASHBOARD
//======================================================================
  $path = realpath(dirname(__FILE__, 2)); // Note: this will bo back to root directory
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once ($path . '/include/head.php'); ?>
  </head>
  <body>
    <?php include_once $path . '/include/header.php'; ?>
    <main role="main" class="container">
      <!-- Page Content Goes Here -->
      <h1> Welcome User </h1>
    </main>
    <?php include_once $path . '/include/footer.php'; ?>
  </body>
</html>