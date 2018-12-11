<?php
//======================================================================
// USER DASHBOARD
//======================================================================

include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));
header("Location: ./../user/browse_playlists.php");

/*
<!doctype html>
<html lang="en">
  <head>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/head.php')); ?>
  </head>
  <body>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/header.php')); ?>
    <main role="main" class="container">
      <!-- Page Content Goes Here -->
      <h1> Welcome <?php echo $user_check; ?> </h1>
      <p>show this users playlists on this page</p>
      <p>click on playlist shows detail view<p>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>
*/
?>