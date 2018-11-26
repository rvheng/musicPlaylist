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

              $db_connection->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
              $usr = $db_connection->prepare("SELECT user_id, first_name, last_name, username, email  FROM user WHERE first_name = ? OR last_name = ? OR username = ? OR email = ?");
              if ($usr === FALSE) {
                echo "Connection Failed";
                die($db_connection->error);
              }
              $usr->bind_param('ssss', $_SESSION['search_fname'], $_SESSION['search_lname'], $_SESSION['$search_uname'], $_SESSION['$search_email']);
              $usr->execute();
              $result = $usr->get_result();

              //NOT FINISHED NEED TO PASS USER ID TO EDIT
              // NEED TO ADD DELETE FUNCTION

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<tr><th>' . $row["user_id"]. '</th><td>' . $row["first_name"]. '</td><td>' . $row["last_name"]. '</td><td>' . $row["username"]. '</td><td>' . $row["email"]. '</td><td><a href="'.BASE_URL.'/admin/user_edit.php" class="text-primary"><i class="fas fa-user-edit"></i></a></td><td><a href="#" class="text-danger"><i class="fas fa-user-minus"></i></a></td></tr>';
                }
              } else {
                  echo '<tr><td colspan="6">0 results <a href="'.BASE_URL.'/admin/user.php">return to search</a></td></tr>';
              }
              $usr->close();
            ?>
            <tbody>
          </table>

      </div>
    </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>