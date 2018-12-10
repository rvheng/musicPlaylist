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
	  <h1> Playlist Results </h1>
	  <table class="table table-striped table-hover">
		<thead class="thead-dark">
		<tr>
			<th>Playlist Name</th>
			<?php
 				if(isset($_SESSION['music_playlist_add_id'])){
					echo '<th>Add to Playlist</th>';
 				}
			?>
		</tr>
		</thead>
		<tbody>
		<?php
			$result = $_SESSION['playlist_results'];
			foreach($result as $row){
				echo '<tr><td>'.$row["playlist_title"].'</th></td>';
				if(isset($_SESSION['music_playlist_add_id'])){
					echo '<td>
						<form method="post" action="'.BASE_URL.'/db/add_song_to_playlist.php">
							<input type="hidden" name="songlist_playlist_id" value="'.$row["playlist_id"].'">
							<input type="hidden" name="songlist_song_id" value="'.$_SESSION["music_playlist_add_id"].'">
							<button type="submit" class="btn btn-success"><i class="fas fa-plus"></i></button>
						</form>
					      </td>';
				}	
			}
		?>
</tbody>
</table>
        </div>
      </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>
