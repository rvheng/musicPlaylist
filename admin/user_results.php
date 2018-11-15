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
          <?php
            // User Query Statment
            // Sample Table Below
          ?>
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            <thead>
            <tbody>
            <tr>
              <td>John</td>
              <td>Snow</td>
              <td>snow</td>
              <td>snow@winter.com</td>
              <td><a href="#" class="text-primary"><i class="fas fa-user-edit"></i></a></td>
              <td><a href="#" class="text-danger"><i class="fas fa-user-minus"></i></a></td>
            </tr>
            <tr>
              <td>John</td>
              <td>Snow</td>
              <td>snow</td>
              <td>snow@winter.com</td>
              <td><a href="#" class="text-primary"><i class="fas fa-user-edit"></i></a></td>
              <td><a href="#" class="text-danger"><i class="fas fa-user-minus"></i></a></td>
            </tr>

            <tbody>
          </table>

      </div>
    </div>
    </main>
    <?php include_once (realpath(dirname(__FILE__, 2).'/include/footer.php')); ?>
  </body>
</html>