<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php day1</title>
</head>
<body>


<?php


// show php info
phpinfo();
echo '<br>';



//display wesite name as a constant
define("websiteName", "php day1");
echo "Welcome to " . websiteName . "<br>";



//server name
echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
//server address
echo "Server Address: " . $_SERVER['SERVER_ADDR'] . "<br>"; 
//server port
echo "Server Port: " . $_SERVER['SERVER_PORT'] . "<br>"; 
//file name
echo "File Name: " . basename($_SERVER['PHP_SELF']) . "<br>"; 
//path to file
echo "Path: " . $_SERVER['PHP_SELF'] . "<br>";



//10 years old brother
$age = 10; 
switch ($age) {
    case ($age < 5):
        echo "Stay at home";
        break;
    case 5:
        echo "Go to Kindergarden";
        break;
    case ($age >= 6 && $age <= 12):
        echo "Go to grade: " . ($age - 5);
        break;
    default:
        echo "Age out of range";
        break;
}



?>

</body>
</html>