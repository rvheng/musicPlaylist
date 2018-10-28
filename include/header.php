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
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>

        <?php
          /* User Information */
          if (isset($login_user)) { // Only dislpay when user is logged in
            echo '<li class="nav-item"><a class="nav-link" href="./account.php">Welcome ' . $login_user . '</a></li>'; // Display who is logged in
            echo '<li class="nav-item"><a class="nav-link disabled" href="./logout.php">logout</a></li>'; // User can logout
          }
        ?>
      </ul>
    </div>
  </nav>
</header>