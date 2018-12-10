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
<!-- Page Content Goes Here -->
          <h1> All Music Artist  </h1>
          <?php
            
            $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $artistvw = $db_connection->prepare("SELECT artist_id, artist_name, COUNT(album_id) AS album_num, COUNT(song_id) AS song_num 
              FROM playlist natural join (
                SELECT * from songlist natural join (
                  SELECT * from song natural join artist) 
                as songartist) 
              as songs 
              WHERE playlist_id = songs.playlist_id");
            if ($artistvw === FALSE) {
              echo "Connection Failed";
              die($db_connection->error);
            }
            //$pllstvw->bind_param('s', $playid);
            $artistvw->execute();
            $result = $artistvw->get_result();
            $counter = 1;
            if ($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {
                
                if (($counter % 3) == 1 ) {
                  echo '<div class="card-deck">';
                }

                  echo '<div class="card">';
                  echo '<img class="card-img-top" src="https://via.placeholder.com/180x90?text=Playlist+Artwork" alt="Card image cap">';
                  echo '<div class="card-header">';
                  echo '<h5 class="card-title">' . $row["artist_name"]. '</h5>';
                  echo '</div>'; // end card-header
                  echo '<ul class="list-group list-group-flush">';
                  echo '<li class="list-group-item">';
                  // open view of music
                  echo '<form method="post" action="'.BASE_URL.'/admin/playlist.php">';
                  echo '<input type="hidden" name="artistid_view" value="' . $row["artist_id"]. '">';
                  echo '<button type="submit" class="btn btn-link btn-sm"><i class="fas fa-music"></i> see music</button>';
                  echo '</form>';
                  echo '</li>'; // end list-group-item
                  echo '<li class="list-group-item">';
                  // album count
                  echo 'Albums: '.$row["album_num"] ;
                  echo '</li>'; // end list-group-item
                  echo '<li class="list-group-item">';
                  // song count
                  echo 'Songs: '.$row["song_num"] ;
                  echo '</li>'; // end list-group-item
                  echo '<div class="card-footer">';
                  // nothing here
                  echo '</div>'; // end card footer
                  echo '</div>'; // end card

                if (($counter % 3) == 0 ) {
                  echo '</div>';
                }
                $counter++;
              }
              if (($counter % 3) != 1) echo '</div>';
            } else {
              echo '0 results <a href="'.BASE_URL.'/admin/music_search.php">try music search</a>';
            }
          ?>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>