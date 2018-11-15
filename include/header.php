<!-- Header is consitant for all webpages 
================================================== -->
<header class="header-breath">
  <!-- Navigation bar is fixed to top page -->
  <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">musicPlaylist</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo BASE_URL; ?>">Home <span class="sr-only">(current)</span></a>
        </li>

        <?php
          /* User Navigation for general users or administrators */
          if (isset($user_name) &&  $user_role === 1) { // Only shows for general users
            include_once (realpath(dirname(__FILE__).'/include/nav_user.php'));
          } elseif (isset($user_name) &&  $user_role === 2) { // Only shows for admin users
            include_once (realpath(dirname(__FILE__).'/include/nav_admin.php'));
          } else {
            echo '<span class="navbar-text">Currently Logged Out!</span>';
          }
        ?>
      </ul>
      <?php 
        if (!isset($user_name)) {
          echo '<span class="navbar-text">Please login or create an account.</span>';
        } else {
          echo '<span class="navbar-text">Hello '.$user_name.'</span>';  
        }
      ?>
    </div>
  </nav>
</header>