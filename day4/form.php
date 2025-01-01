
<!DOCTYPE html>
<html lang="en">
<head>
  <title>form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>user registration form</h2>
  
  
  
  <?php
  include "dbconfig.php";

  $name = $email = $gender = $emailstatus = "";
  $isEdit = false;

  if (isset($_GET['id'])) {
      $id = intval($_GET['id']);
      $isEdit = true;

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
          $name = $row['name'];
          $email = $row['email'];
          $gender = $row['gender'];
          $emailstatus = $row['emailstatus'] == 1 ? 'checked' : '';
      } else {
          echo "No user found with ID: $id";
      }

      $stmt->close();
      mysqli_close($conn);
  }
  ?>
  
  
  
  
  
  <form action= "<?php $_PHP_SELF ?>" method="POST">
  
	<div class="mb-3 mt-3">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"  value="<?php echo $name; ?>" required>
    </div>
  
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  value="<?php echo $email; ?>" required>
    </div>
	
   
	
	<label for="radio">gender</label>
	<div class="form-check">
		<input type="radio" class="form-check-input" id="radio1" name="optradio" value="male" <?php echo $gender == 'male' ? 'checked' : ''; ?>>male
		<label class="form-check-label" for="radio1"></label>
    </div>
  
    <div class="form-check">
		<input type="radio" class="form-check-input" id="radio2" name="optradio" value="female" <?php echo $gender == 'female' ? 'checked' : ''; ?>>female
		<label class="form-check-label" for="radio2"></label>
    </div>
	<br>
	
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="recievemails" <?php echo $emailstatus; ?>> Recieve emails from us
      </label>
    </div>
	
    <button type="submit" class="btn btn-primary"  ><?php echo $isEdit ? 'Save Updates' : 'Submit'; ?></button>
	<button type="reset" class="btn btn-secondary" ><?php echo $isEdit ? 'cancel' : 'cancel'; ?></button>

  </form>
</div>


</body>
</html>





<?php
include "dbconfig.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
	$name= htmlspecialchars($_POST['name']);
	$email= htmlspecialchars($_POST['email']);
	$gender=htmlspecialchars($_POST['optradio']);
	$emailstatus;
	if(htmlspecialchars($_POST['recievemails'])){$emailstatus='true';}else{$emailstatus='false';}



	$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	if(! $conn ) {
		die('Could not connect: ' . mysqli_connect_error($conn));
	}
   
	echo 'Connected successfully<br>';
	echo $id;


	if ($id > 0) {
		// Update existing user
		$sql = "UPDATE usersinfo SET name='$name', email= '$email', gender='$gender', emailstatus=$emailstatus WHERE id=$id";
		$retval = mysqli_query( $conn,$sql );
	}else{
		//insert data to table
		$sql = "INSERT INTO usersinfo(name,email,gender,emailstatus) VALUES ( '$name', '$email' , '$gender' ,$emailstatus)";
		$retval = mysqli_query( $conn,$sql );
		echo $retval;

	}


	if($retval) {
		echo "<br>Data inserted to table successfully\n";
		//redirect to view page
		header("Location: view.php");
		$retval=0;
	}else{
		die('Could not insert to table: ' . mysqli_connect_error($retval));
	}
    

	mysqli_close($conn);
}

?>





