<?php
//======================================================================
// ADMIN PLAYLIST
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
          <!-- Page Content Goes Here -->
          <h1> All Admin Playlists  </h1>
          
          <?php
            
            $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $pllst = $db_connection->prepare("SELECT * FROM playlist");
            if ($pllst === FALSE) {
              echo "Connection Failed";
              die($db_connection->error);
            }
            //$pllst->bind_param('ssss', $fname, $lname, $_SESSION['$search_uname'], $_SESSION['$search_email']);
            $pllst->execute();
            $result = $pllst->get_result();

            $counter = 0;
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {

                if (($counter % 3) == 1 ) {
                  echo '<div class="card-deck">';
                }

                  echo '<div class="card">';
                  echo '<img class="card-img-top" src="https://via.placeholder.com/180x90?text=Playlist+Artwork" alt="Card image cap">';
                  echo '<div class="card-body">';
                  echo '<h5 class="card-title">' . $row["playlist_title"]. '</h5>';
                  echo '<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>';
                  // edit
                  echo '<form method="post" action="'.BASE_URL.'/admin/playlist.php">';
                  echo '<input type="hidden" name="userid_edit" value="' . $row["playlist_id"]. '">';
                  echo '<button type="submit" class="btn btn-primary btn-sm">Edit <i class="fas fa-pencil-alt"></i></button>';
                  echo '</form>';
      
                  // delete
                  echo '<form method="post" action="'.BASE_URL.'/admin/playlist.php">';
                  echo '<input type="hidden" name="userid_del" value="' . $row["playlist_id"]. '">';
                  echo '<button type="submit" class="btn btn-danger btn-sm">Delete <i class="fas fa-minus"></i></button>';
                  echo '</form>';
                  echo '</div>';
                  echo '</div>';

                if (($counter % 3) == 0 ) {
                  echo '</div>';
                }
                $counter++;
              }
              if (($counter % 3) != 1) echo '</div>';
            } else {
              echo '<tr><td colspan="6">0 results <a href="'.BASE_URL.'/admin/user.php"> return to search</a></td></tr>';
            }
            $pllst->close();

          ?>
          

        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>