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
          <form>
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
                  <option value="1">pop</option>
                  <option value="2">rock</option>
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