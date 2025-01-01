<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>User Details</h2>
    <a href="./form.php" class="btn btn-primary">Add User</a>
  </div>

  <?php
  include "dbconfig.php";
  
  $isdelete = false;
  if (isset($_GET['id'])) {
	  $id = intval($_GET['id']);
      $isdelete = true;
	  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      if (!$conn) {
          die('Could not connect: ' . mysqli_connect_error());
      }

      $sql = "delete FROM usersinfo WHERE id = $id";
	  $retval = mysqli_query( $conn,$sql );
	  mysqli_close($conn);
 
  }
  
  
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  if (!$conn) {
      die('Could not connect: ' . mysqli_connect_error($conn));
  }

  echo 'Connected successfully<br>';

  $sql = 'SELECT * FROM usersinfo';
  $result = mysqli_query($conn, $sql);

  if (!$result) {
      die('Could not get data: ' . mysqli_error($conn));
  }

  if (mysqli_num_rows($result) > 0) {
      echo "<table class='table table-bordered'>";
      echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Gender</th><th>Email Status</th><th>Action</th></tr>";

      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['gender'] . "</td>";
          echo "<td>" . ($row['emailstatus'] == 1 ? 'Yes' : 'No') . "</td>";
          // Add action buttons for view, edit, delete
          echo "<td>
                  <a href='viewrecord.php?id=". $row['id'] ."' class='btn btn-info btn-sm'>View</a>
                  <a href='form.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                  <a href='view.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                </td>";
          echo "</tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }

  //echo "Fetched data successfully\n";

  mysqli_close($conn);
  ?>
</div>

</body>
</html>