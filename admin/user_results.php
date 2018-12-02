<?php
//======================================================================
// ADMIN USER SEARCH
//======================================================================

include_once (realpath(dirname(__FILE__, 2).'/db/session.php'));

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if (isset($_POST['userid_edit'])) {
    $_SESSION['edit_user_id'] = $_POST['userid_edit'];
    header("location: ./../admin/user_edit.php");
  } elseif (isset($_POST['userid_del'])) {
    $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $usr_delete = $db_connection->prepare("DELETE FROM user WHERE user_id = ?");
    $usr_delete->bind_param("i", $_POST['userid_del']);
    $usr_delete->execute();
    $usr_delete->close();
    $error = 'User Deleted Forever';
  } else {
    $error = "There was a problem";
  }
}
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
          <h1> Current Users </h1>
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th>ID </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            <thead>
            <tbody>
            <?php
              $fname = "%{$_SESSION['search_fname']}%";
              $lname = "%{$_SESSION['search_lname']}%";

              $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
              $usr = $db_connection->prepare("SELECT user_id, first_name, last_name, username, email  FROM user WHERE first_name LIKE ? AND last_name LIKE ? OR username = ? OR email = ?");
              if ($usr === FALSE) {
                echo "Connection Failed";
                die($db_connection->error);
              }
              $usr->bind_param('ssss', $fname, $lname, $_SESSION['$search_uname'], $_SESSION['$search_email']);
              $usr->execute();
              $result = $usr->get_result();

              //NOT FINISHED NEED TO PASS USER ID TO EDIT
              // NEED TO ADD DELETE FUNCTION

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  // Show results of the search here  
                  echo '<tr>';
                  echo '<th>' . $row["user_id"]. '</th>';
                  echo '<td>' . $row["first_name"]. '</td>';
                  echo '<td>' . $row["last_name"]. '</td>';
                  echo '<td>' . $row["username"]. '</td>';
                  echo '<td>' . $row["email"]. '</td>';
                  // edit user
                  echo '<td>';
                  echo '<form method="post" action="'.BASE_URL.'/admin/user_results.php">';
                  echo '<input type="hidden" name="userid_edit" value="' . $row["user_id"]. '">';
                  echo '<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i></button>';
                  echo '</form>';
                  echo '</td>';
                  // delete user
                  echo '<td>';
                  echo '<form method="post" action="'.BASE_URL.'/admin/user_results.php">';
                  echo '<input type="hidden" name="userid_del" value="' . $row["user_id"]. '">';
                  echo '<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-user-minus"></i></button>';
                  echo '</form>';
                  echo '</td>';
                  echo '</tr>';
                }
              } else {
                  echo '<tr><td colspan="6">0 results <a href="'.BASE_URL.'/admin/user.php">return to search</a></td></tr>';
              }
              $usr->close();
            ?>
            <tbody>
          </table>
          <?php
              /* Error Message */
              if (isset($error)) {
                // uses bootstrap alert style for error messages
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
              }
          ?>
      </div>
    </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>