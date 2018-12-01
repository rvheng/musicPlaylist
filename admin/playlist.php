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
            // PHP & SQL HERE
          ?>
          <div class="card-deck">
            <div class="card">
              <img class="card-img-top" src="https://via.placeholder.com/180x90?text=CUSTOM+IMAGE" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Playlist Name</h5>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="#" class="text-primary"><i class="fas fa-edit"></i> Edit</a> | 
                <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i> Delete</a>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="https://via.placeholder.com/180x90?text=CUSTOM+IMAGE" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Playlist Name</h5>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="#" class="text-primary"><i class="fas fa-edit"></i> Edit</a> | 
                <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i> Delete</a>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top" src="https://via.placeholder.com/180x90?text=CUSTOM+IMAGE" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Playlist Name</h5>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="#" class="text-primary"><i class="fas fa-edit"></i> Edit</a> | 
                <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i> Delete</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>