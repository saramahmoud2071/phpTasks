<!DOCTYPE html>
<html>
<body>

<h2>fill this form</h2>

<form action= "<?php $_PHP_SELF ?>" method="POST">
  <label for="name">name:</label>
  <input type="text" id="name" name="name" value="" pattern="[a-zA-Z\s]+" title="Please enter letters only" required><br><br>
  
  <label for="email">email:</label>
  <input type="email" id="email" name="email" value="" required><br><br>
  
  <label for="group">group #:</label>
  <input type="number" id="group" name="group" value=""><br><br>
  
  <label for="class">class details:</label>
  <textarea id="class" name="class" rows="4" cols="50"> </textarea><br><br>
  
  <label for="gender">gender:</label>
  <input type="radio" id="male" name="gender" value="male" required>
  <label for="male">male</label>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">female</label><br><br>
  
  <label for="courses">select courses:</label>
  <select name="courses[]" id="courses" multiple>
  <option value="php">php</option>
  <option value="mysql">mysql</option>
  <option value="javascript">javascript</option>
  <option value="html">html</option>
  </select>
  <p>Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p><br>
  
  <label for="agree">agree</label>
  <input type="checkbox" id="agree" name="agree" value="yes" required><br><br>

  
  
  <input type="submit" value="Submit">
</form> 

</body>
</html>




<?php

echo "<h2>your given values are:</h2>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $group = htmlspecialchars($_POST['group']);
    $class_details = htmlspecialchars($_POST['class']);
    $gender = htmlspecialchars($_POST['gender']);
    $courses = $_POST['courses'];
    $agree = isset($_POST['agree']) ? "Yes" : "No";
    
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Group #: " . $group . "<br>";
    echo "Class details: " . $class_details . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "Courses: " . implode(", ", $courses) . "<br>";
    echo "Agree: " . $agree . "<br>";
}
?>

</body>
</html>


