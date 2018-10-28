<?php
//======================================================================
// PAGE TEMPLATE
//======================================================================
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
      <!-- Page Content Goes Here -->
    </main>
    <?php include_once $path . '/include/footer.php'; ?>
  </body>
</html>
