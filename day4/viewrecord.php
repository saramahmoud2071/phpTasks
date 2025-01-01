<!DOCTYPE html>
<html lang="en">
<head>
  <title>view record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center mb-3">
  
  </div>




<?php
include "dbconfig.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure the id is an integer

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "SELECT * FROM usersinfo WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>User Details</h2>";
        echo "<p>ID: " . $row['id'] . "</p>";
        echo "<p>Name: " . $row['name'] . "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p>Gender: " . $row['gender'] . "</p>";
        echo ($row['emailstatus'] == 1 ? 'you will receive emails from us' : 'you will not recieve emails from us') . "</p>";
    } else {
        echo "No user found with ID: $id";
    }

    $stmt->close();
    mysqli_close($conn);
} else {
    echo "No ID parameter provided.";
}
?>

<a href="./view.php" class="btn btn-primary">back</a>
</div>

</body>
</html>