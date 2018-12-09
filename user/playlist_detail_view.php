<?php
//======================================================================
// USER Playlist Detail View
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
      <h1> Playlist Name </h1>
      <p>Song, artist, album, popularity : list</p>
      <p>move song position</p>
      <p>remove song from playlist</p>
      <p>delete playlist</p>
      <p>go to search songs</p>
      <p>share playlist with another user</p>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>