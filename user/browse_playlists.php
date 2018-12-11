<?php
//======================================================================
// USER BROWSE PLAYLIST
//======================================================================

include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if (isset($_POST['uplaylistid_view'])) {
    $_SESSION['uview_playlist_id'] = $_POST['uplaylistid_view'];
    header("location: ./../user/playlist_detail_view.php");
  }else {
    $error = "There was a problem";
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
          <h1> Browse Playlists  </h1>
          <?php
            $public = 1;

            $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $pllst = $db_connection->prepare("SELECT * FROM playlist WHERE private_status = ?");
            if ($pllst === FALSE) {
              echo "Connection Failed";
              die($db_connection->error);
            }


            
            $pllst->bind_param('s', $public);
            $pllst->execute();
            $result = $pllst->get_result();

            $counter = 1;
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {

                if (($counter % 3) == 1 ) {
                  echo '<div class="card-deck">';
                }

                  echo '<div class="card">';
                  echo '<img class="card-img-top" src="https://via.placeholder.com/180x90?text=Playlist+Artwork" alt="Card image cap">';
                  echo '<div class="card-header">';
                  echo '<h5 class="card-title">' . $row["playlist_title"]. '</h5>';
                  echo '</div>'; // end card-header
                  echo '<ul class="list-group list-group-flush">';
                  echo '<li class="list-group-item">';
                  // open view of music
                  echo '<form method="post" action="'.BASE_URL.'/user/browse_playlists.php">';
                  echo '<input type="hidden" name="uplaylistid_view" value="' . $row["playlist_id"]. '">';
                  echo '<button type="submit" class="btn btn-link btn-sm"><i class="fas fa-music"></i> see music</button>';
                  echo '</form>';
                  echo '</li>'; // end list-group-item

                  echo '</div>'; // end card

                if (($counter % 3) == 0 ) {
                  echo '</div>';
                }
                $counter++;
              }
              if (($counter % 3) != 1) echo '</div>';
            } else {
              echo '0 results <a href="'.BASE_URL.'/user/index.php"> return to home</a>';
            }
            $pllst->close();

          ?>
          

        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>