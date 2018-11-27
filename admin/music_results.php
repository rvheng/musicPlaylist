<?php
//======================================================================
// ADMIN MUSIC SEARCH
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
          <h1> Current Users </h1>
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Song Name</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Genre</th>
              </tr>
            <thead>
            <tbody>
<?php
		$result = $_SESSION['music_results'];
                foreach($result as $row) {
                    echo '<tr><th>'.$row["song_title"].'</th><td>'.$row["artist_name"].'</td><td>'.$row["album_name"].'</td><td>'.$row["genre_name"].'</td><td>';
                }
            ?>
            <tbody>
          </table>

      </div>
    </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>
