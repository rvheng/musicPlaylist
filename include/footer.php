<?php 
//======================================================================
// FOOTER INCLUDED ON ALL FILES
//======================================================================
//define( "BASE_URL", "/musicPlaylist");
//define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/musicPlaylist");
?>

<!-- Footer is consitant for all webpages 
================================================== -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <small>&copy; <?php echo date("Y"); // Shows current year ?> Copyright Music Playlist Connor, Heng. </small>
      </div>
    </div>
  </div>
</footer>

<!-- Core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Required for font awesome -->
<script src="<?php echo BASE_URL; ?>/fontawesome/js/all.min.js"></script>

<!-- Required for bootstrap -->
<script src="<?php echo BASE_URL; ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/popper.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/bootstrap.min.js"></script>