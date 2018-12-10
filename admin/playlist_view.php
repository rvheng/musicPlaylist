<?php
//======================================================================
// ADMIN PLAYLIST VIEW
//======================================================================

include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));
/*
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if (isset($_POST['playlistid_edit'])) {
    $_SESSION['edit_playlist_id'] = $_POST['playlistid_edit'];
    header("location: ./../admin/playlist_edit.php");
  } elseif (isset($_POST['playlistid_del'])) {
    $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $usr_delete = $db_connection->prepare("DELETE FROM playlist WHERE playlist_id = ?");
    $usr_delete->bind_param("i", $_POST['playlistid_del']);
    $usr_delete->execute();
    $usr_delete->close();
    $error = 'Playlist Deleted Forever';
  } else {
    $error = "There was a problem";
  }
}
*/
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
          
          <?php

            $playid = $_SESSION['view_playlist_id'];
            
            $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $pllstvw = $db_connection->prepare("SELECT * FROM playlist WHERE playlist_id = ?");
            if ($pllstvw === FALSE) {
              echo "Connection Failed";
              die($db_connection->error);
            }
            $pllstvw->bind_param('s', $playid);
            $pllstvw->execute();
            $result = $pllstvw->get_result();

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo '<h1>'.$row["playlist_title"].'</h1>';
                echo '<table class="table table-striped table-hover">';
                echo '<thead class="thead-dark">';
                echo '<tr>';
                echo '<th>Title </th>';
                echo '<th>Artist</th>';
                echo '<th><i class="far fa-calendar-alt"></i></th>';
                echo '<th><i class="fas fa-headphones"></i></th>';
                echo '</tr>';
                echo '<thead>';
                echo '<tbody>';

                // another while loop for songs here
                echo '<tr>';
                echo '<td>song title</td>';
                echo '<td>artist title</td>';
                echo '<td>song release</td>';
                echo '<td>';
                // audio player <i class="far fa-play-circle"></i>
                echo '<a href="#" onclick="playAudio()"><i class="far fa-play-circle"></i></a>';
                /* to big for table
                echo '<audio controls autoplay>';
                echo '<source src="'.BASE_URL.'/audio/slot-machine-daniel_simon.wav" type="audio/wav">';
                echo '<source src="'.BASE_URL.'/audio/slot-machine-daniel_simon.mp3" type="audio/mpeg">';
                echo 'Your browser does not support the audio element.';
                echo '</audio>';
                */
                echo '</td>';
                echo '</tr>';
                echo '<tbody>';
                echo '</table>';

              }
            } else {
              echo '0 results <a href="'.BASE_URL.'/admin/user.php">return to search</a>';
          }
          $pllstvw->close();
        ?>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>