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
          
          <div class="row">
            <div class="col-md-6">
              <h1> Playlist Search </h1>
            </div>
            <div class="col-md-6 text-right">
              <form method="post" action="<?php echo BASE_URL; ?>/admin/playlist_add.php">
                <input type="hidden" name="userid_edit" value="<?php echo $row["user_id"]; ?>">
                <button type="submit" class="btn btn-success">Create Playlist <i class="fas fa-plus"></i></button>
              </form>
            </div>
          </div>
          <!-- ENTER SEARCH HERE -->
          <form action="<?php echo BASE_URL; ?>/db/get_playlist.php" method="post">
            <div class="form-row">
              <small id="helpBlock" class="form-text text-muted">
                Helpful hint...
              </small>
            </div>
            <div class="form-row">
              <div class="form-group col-sm-10">
                <input type="text" class="form-control" id="fname" placeholder="Playlist Name" name="playlist_name">
              </div>
              <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
              <?php
              /* Error Message */
              if (isset($error)) {
                // uses bootstrap alert style for error messages
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
              }
            ?>
            </div>
            </div>
          </form>

        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>
