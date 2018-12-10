<?php
//======================================================================
// ADMIN ADD PLAYLIST
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
          <h1> Add Playlist</h1>
          <div class="row">
            <div class="col-9">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-artist" role="tabpanel" aria-labelledby="v-pills-artist-tab">
                <?php
                    //-----------------------------------------------------
                    // Add a Playlist
                    //-----------------------------------------------------
                  ?>
                  <form action="../db/admin_add_playlist.php" method="post">
                    <fieldset>
                      <legend>Playlist:</legend>
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label for="playlist_name">Playlist Name</label>
                          <input type="text" class="form-control" id="playlist_name" placeholder="Playlist Name" name="playlist_name">
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
