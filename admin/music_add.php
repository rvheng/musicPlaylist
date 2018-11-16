<?php
//======================================================================
// ADMIN USER SEARCH
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
        <div class="col-sm-12">
          <h1> Add Music</h1>
          <div class="row">
            <div class="col-3">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-artist-tab" data-toggle="pill" href="#v-pills-artist" role="tab" aria-controls="v-pills-artist" aria-selected="true">Artist</a>
                <a class="nav-link" id="v-pills-album-tab" data-toggle="pill" href="#v-pills-album" role="tab" aria-controls="v-pills-album" aria-selected="false">Album</a>
                <a class="nav-link" id="v-pills-song-tab" data-toggle="pill" href="#v-pills-song" role="tab" aria-controls="v-pills-song" aria-selected="false">Song</a>
                <a class="nav-link" id="v-pills-award-tab" data-toggle="pill" href="#v-pills-award" role="tab" aria-controls="v-pills-award" aria-selected="false">Award</a>
                <a class="nav-link" id="v-pills-era-tab" data-toggle="pill" href="#v-pills-era" role="tab" aria-controls="v-pills-era" aria-selected="false">Era</a>
                <a class="nav-link" id="v-pills-genre-tab" data-toggle="pill" href="#v-pills-genre" role="tab" aria-controls="v-pills-genre" aria-selected="false">Genre</a>
                <a class="nav-link" id="v-pills-record-tab" data-toggle="pill" href="#v-pills-record" role="tab" aria-controls="v-pills-record" aria-selected="false">Record Label</a>
              </div>
            </div>
            <div class="col-9">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-artist" role="tabpanel" aria-labelledby="v-pills-artist-tab">
                  <?php
                    //-----------------------------------------------------
                    // Add an Artist
                    //-----------------------------------------------------
                  ?>
                  <form action="" method="post">
                    <fieldset>
                      <legend>Artist:</legend>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="artist_name">Artist Name</label>
                          <input type="text" class="form-control" id="artist_name" placeholder="Artist Name" name="artist_name">
                        </div>
                        <div class="form-group col-sm-6">
                          <label for="artist_type">Artist Type</label>
                          <select class="form-control" id="artist_type" name="artist_type">
                            <option>Solo</option>
                            <option>Band</option>
                          </select>
                        </div>
                      </div>
                    </fieldset>
                    <?php
                      /* Error Message */
                      if (isset($error)) {
                        // uses bootstrap alert style for error messages
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                      }
                    ?>
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="reset" class="btn btn-warning">reset</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="v-pills-album" role="tabpanel" aria-labelledby="v-pills-album-tab">
                <?php
                    //-----------------------------------------------------
                    // Add an Album
                    //-----------------------------------------------------
                  ?>
                  <form action="" method="post">
                    <fieldset>
                      <legend>Album:</legend>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="album_name">Album Name</label>
                          <input type="text" class="form-control" id="album_name" placeholder="Album Name" name="album_name">
                        </div>
                        <div class="form-group col-sm-6">
                          <label for="album_release">Album Release</label>
                          <input type="date" class="form-control" id="album_release" name="album_release">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="album_record">Album Record Label</label>
                          <select class="form-control" id="album_record" name="record_id">
                            <option value="1">Universal Music Group</option>
                            <option value="2">Sony Music Entertainment</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-6">
                          <label for="artist_type">Album Era</label>
                          <select class="form-control" id="artist_type" name="era_id">
                            <option value="6">2000</option>
                            <option value="7">2010</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-sm-6">
                          <label for="album_genre">Album Genre</label>
                          <select class="form-control" id="genre_id" name="genre_id">
                            <option value="1">pop</option>
                            <option value="2">rock</option>
                          </select>
                        </div>
                        
                        <div class="form-group col-sm-6">
                          <label for="album_award">Album Award</label>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="album_award1" name="award_id">
                            <label class="form-check-label" for="album_award1">
                              People's Choice award
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="album_award2" name="award_id">
                            <label class="form-check-label" for="album_award2">
                              Teen's Choice award
                            </label>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <?php
                      /* Error Message */
                      if (isset($error)) {
                        // uses bootstrap alert style for error messages
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                      }
                    ?>
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="reset" class="btn btn-warning">reset</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="v-pills-song" role="tabpanel" aria-labelledby="v-pills-song-tab">
                <?php
                    //-----------------------------------------------------
                    // Add a Song
                    //-----------------------------------------------------
                  ?>
                  <form action="" method="post">
                    <fieldset>
                      <legend>Song:</legend>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="song_name">Song Name</label>
                          <input type="text" class="form-control" id="song_title" placeholder="Song Name" name="song_name">
                        </div>
                        <div class="form-group col-sm-6">
                          <label for="song_artist">Artist</label>
                          <select class="form-control" id="song_artist" name="artist_id">
                            <option>Artist Name</option>
                            <option>Artist Name</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="song_album">Album</label>
                          <select class="form-control" id="song_album" name="album_id">
                            <option>Album Name</option>
                            <option>Album Name</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                      <div class="form-group col-sm-6">
                          <label for="song_release">Song Release Date</label>
                          <input type="date" class="form-control" id="song_release" name="song_release">
                        </div>
                        <div class="form-group col-sm-6">
                          <label for="song_length">Song Length</label>
                          <input type="time" step='1' min="00:00:00" max="00:10:00" id="song_length" name="song_length" class="form-control">
                        </div>
                      </div>
                    </fieldset>
                    <?php
                      /* Error Message */
                      if (isset($error)) {
                        // uses bootstrap alert style for error messages
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                      }
                    ?>
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="reset" class="btn btn-warning">reset</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="v-pills-award" role="tabpanel" aria-labelledby="v-pills-award-tab">
                <?php
                    //-----------------------------------------------------
                    // Add an Award
                    //-----------------------------------------------------
                  ?>
                  <form action="" method="post">
                    <fieldset>
                      <legend>Award:</legend>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="award_name">Award Name</label>
                          <input type="text" class="form-control" id="award_name" placeholder="Award Name" name="award_name">
                        </div>
                      </div>
                    </fieldset>
                    <?php
                      /* Error Message */
                      if (isset($error)) {
                        // uses bootstrap alert style for error messages
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                      }
                    ?>
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="reset" class="btn btn-warning">reset</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="v-pills-era" role="tabpanel" aria-labelledby="v-pills-era-tab">
                <?php
                    //-----------------------------------------------------
                    // Add an Era
                    //-----------------------------------------------------
                  ?>
                  <form action="" method="post">
                    <fieldset>
                      <legend>Era:</legend>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="era_name">Era Name</label>
                          <input type="text" class="form-control" id="era_name" placeholder="Era Name" name="era_name">
                        </div>
                      </div>
                    </fieldset>
                    <?php
                      /* Error Message */
                      if (isset($error)) {
                        // uses bootstrap alert style for error messages
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                      }
                    ?>
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="reset" class="btn btn-warning">reset</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="v-pills-genre" role="tabpanel" aria-labelledby="v-pills-genre-tab">
                <?php
                    //-----------------------------------------------------
                    // Add an Genre
                    //-----------------------------------------------------
                  ?>
                  <form action="" method="post">
                    <fieldset>
                      <legend>Genre:</legend>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="genre_name">Genre Name</label>
                          <input type="text" class="form-control" id="genre_name" placeholder="Genre Name" name="genre_name">
                        </div>
                      </div>
                    </fieldset>
                    <?php
                      /* Error Message */
                      if (isset($error)) {
                        // uses bootstrap alert style for error messages
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                      }
                    ?>
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="reset" class="btn btn-warning">reset</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="v-pills-record" role="tabpanel" aria-labelledby="v-pills-record-tab">
                <?php
                    //-----------------------------------------------------
                    // Add an Record Label
                    //-----------------------------------------------------
                  ?>
                  <form action="" method="post">
                    <fieldset>
                      <legend>Genre:</legend>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="record_name">Record Label Name</label>
                          <input type="text" class="form-control" id="record_name" placeholder="Record Label Name" name="record_name">
                        </div>
                      </div>
                    </fieldset>
                    <?php
                      /* Error Message */
                      if (isset($error)) {
                        // uses bootstrap alert style for error messages
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                      }
                    ?>
                    <button type="submit" class="btn btn-primary">ADD</button>
                    <button type="reset" class="btn btn-warning">reset</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>