<?php
//======================================================================
// ADMIN PLAYLIST VIEW
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
          
          <?php



          if(isset($_SESSION['playlist_results'])){
            if(!isset($_SESSION['playlist_id'])) {
              //echo 'See a';
              if(!isset($_SESSION['view_playlist_id'])) {
                //echo 'See a 1';
                $playid = $_SESSION['edit_playlist_id'];
              }else{
                //echo 'See a 2';
                $playid = $_SESSION['view_playlist_id'];
              }
              $playid = $_SESSION['view_playlist_id'];
            }else {
              //echo 'See b';
              $playid = $_SESSION['playlist_results']['playlist_id'];
            }

            //$playid = $_SESSION['playlist_results']['playlist_id'];
          }
          
          else {
            if(!isset($_SESSION['view_playlist_id'])) {
              echo 'See c';
              $playid = $_SESSION['edit_playlist_id'];
            } else {
              echo 'See d';
              $playid = $_SESSION['view_playlist_id'];
            }
          }

            
            $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $pllstvw = $db_connection->prepare("SELECT * 
              FROM playlist natural join (
                SELECT * from songlist natural join (
                  SELECT * from song natural join artist) 
                as songartist) 
              as songs 
              WHERE playlist_id = songs.playlist_id and playlist_id = ?");
            if ($pllstvw === FALSE) {
              echo "Connection Failed";
              die($db_connection->error);
            }
            $pllstvw->bind_param('s', $playid);
            $pllstvw->execute();

            $result = $pllstvw->get_result();

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
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

              while($row = $result->fetch_assoc()) {
                $timestamp = strtotime($row["song_release"]);
                echo '<tr>';
                echo '<td>'.$row["song_title"].'</td>';
                echo '<td>'.$row["artist_name"].'</td>';
                echo '<td>'.date("m-d-Y",$timestamp).'</td>';
                echo '<td>';
                // audio player using javascript
                echo '<a href="#" onclick="playAudio()"><i class="far fa-play-circle"></i></a>';
                echo '</td>';
                echo '</tr>';
              }
              echo '<tbody>';
              echo '</table>';
            } else {
              echo '0 results <a href="'.BASE_URL.'/admin/playlist.php">return to playlist</a>';
          }
          $pllstvw->close();
        ?>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>