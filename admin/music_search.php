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
          <h1> Search for Music </h1>
<!-- Form to be added -->
          <form action="../db/admin_show_music.php" method="post">
            <div class="form-row">
              <small id="helpBlock" class="form-text text-muted">
                Search using any or all fields below.
              </small>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="artist_name">Arist</label>
                <input type="text" class="form-control" id="artist_name" placeholder="Artist Name" name="artist_name">
              </div>
              <div class="form-group col-md-6">
                <label for="album_name">Album</label>
                <input type="text" class="form-control" id="album_name" placeholder="Album Name" name="album_name">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="song_name">Song</label>
                <input type="text" class="form-control" id="song_name" placeholder="Song Name" name="song_name">
              </div>
              <div class="form-group col-md-6">
                <label for="album_genre">Album Genre</label>
                <select class="form-control" id="genre_id" name="genre_id">
                  <?php
			$db_conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
				OR die("Connection failed in retireving genres");
			$retrieve_genre = $db_conn->prepare("SELECT genre_id, genre_name from genre;");
			$retrieve_genre->execute();
			$retrieve_genre->bind_result($result_genre_id, $result_genre_name);
			while($retrieve_genre->fetch()){
				echo "<option value='".$result_genre_id."'>".$result_genre_name."</option>";
			}
			$retrieve_genre->close();
			$db_conn->close();
		?>
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>
