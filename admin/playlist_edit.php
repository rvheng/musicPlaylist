<?php
//======================================================================
// ADMIN PLAYLIST EDIT
//======================================================================

include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));

// if the form submitted update the playlist


if($_SERVER['REQUEST_METHOD'] === 'POST'){
 

    $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $update_ply = $db_connection->prepare("UPDATE playlist SET playlist_title = ?, private_status = ? WHERE playlist_id = ?");
    $update_ply->bind_param("sii", 
      $_POST['playlist_title'], 
      $_POST['private_status'], 
      $_POST['this_playlistid_view']);

    $update_ply->execute();
    if($update_uply->affected_rows === 0) exit('No rows updated');
    $update_ply->close();
    header("location: ./../admin/playlist_view.php");
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
          <h1> Edit Playlists </h1>

          <?php

          // from the previous page we post an id and now can edit that playlist here
          $playid = $_SESSION['edit_playlist_id'];

          $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
          $editplay = $db_connection->prepare("SELECT playlist_title, private_status FROM playlist WHERE playlist_id = ?");
          if ($editplay === FALSE) {
            echo "Connection Failed";
            die($db_connection->error);
          }
          $editplay->bind_param('s', $playid);
          $editplay->execute();
          $result = $editplay->get_result();
          if($result->num_rows === 0) exit('No rows');
          while($row = $result->fetch_assoc()) {
            $playlist_title = $row['playlist_title'];
            $private_status = $row['private_status'];
          }
          $editplay->close();
          ?>

          <form action="" method="post">
            <input type="hidden" name="this_playlistid_view" value="<?php echo $playid; ?>">
            <div class="form-group">
              <label for="playlist_title">Playlist Title</label>
              <input type="text" class="form-control" id="fplaylist_title" name="playlist_title" value="<?php echo $playlist_title; ?>">
            </div>
            <div class="form-group">
              <label for="private_status">Private Status</label><br>
              <?php
                /* Shows either public or private status */
                $check_public = '';
                $check_private = '';

                if(isset($private_status)){
                  if($private_status === 1) {
                    $check_public = 'checked';
                  }elseif($private_status === 2) {
                    $check_private = 'checked';
                  }
                } else {
                  $error = 'error detected: nothing is selected';
                }
              ?>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="private_status" id="inlineRadio1" value="1" <?php echo $check_public; ?>>
                <label class="form-check-label" for="inlineRadio1">public</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="private_status" id="inlineRadio2" value="2" <?php echo $playlist_title; ?>>
                <label class="form-check-label" for="inlineRadio2">private</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Playlist</button>
            </form>
            <?php

            // get the songs in that playlist
            $playid = $_SESSION['edit_playlist_id'];
            $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $view_songs = $db_connection->prepare("SELECT * FROM playlist natural join 
                (SELECT * from songlist natural join 
                (SELECT * from song natural join artist) 
                  as songartist) 
                  as songs 
                WHERE playlist_id = songs.playlist_id and playlist_id = ?");
            $view_songs->bind_param('s', $playid);
            $view_songs->execute();
            $result = $view_songs->get_result();
            if($result->num_rows === 0) exit('No songs');
              echo '<table class="table table-striped table-hover"><thead class="thead-dark"><tr><th>Song Name</th><th>Artist</th><th>Remove</th></tr></thead><tbody>';
              while($row = $result->fetch_assoc()) {
                echo '<tr><td>'.$row['song_title'].'</td><td>'.$row['artist_name'].'</td><td>
                <form action="'.BASE_URL.'/db/remove_song_from_playlist.php" method="post">
                  <input type="hidden" name="music_playlist_rem_song" value="'.$row["song_id"].'">
                  <input type="hidden" name="music_playlist_rem_playlist" value="'.$row["playlist_id"].'">
                  <button type="submit" class="btn btn-danger"><i class="fas fa-minus"></i></button>
                </form></td></tr>';
              }
              echo '</tbody></table>';
            $view_songs->close();
            ?>
            
            
            <?php
              /* Error Message */
              if (isset($error)) {
                // uses bootstrap alert style for error messages
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
              }
            ?>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>
