<?php
   #1
   //open & close connection
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'users';
   $link = mysqli_connect( $dbhost, $dbuser, $dbpass);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The <span style='color:red'> $dbname </span>database is great.<br>" . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

//create database
$sql = "create database IF NOT EXISTS $dbname";
$retval = mysqli_query( $link,$sql );
   
if(! $retval ) {
	die('Could not create database: ' . mysqli_connect_error($retval));
}

//select
mysqli_select_db( $link,$dbname );
//echo "Database <span style='color:red'>$dbname </span>created & selected successfully<br>";


//creat table
$sql = "CREATE TABLE if not exists usersinfo (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
email VARCHAR(50),
gender VARCHAR(50),
emailstatus BOOLEAN
)";

$retval = mysqli_query( $link,$sql );

if(! $retval ) {
	die('Could not create usersinfo table: ' . mysqli_connect_error($retval));
}
//echo "Table <span style='color:red'>usersinfo </span>created successfully";



mysqli_close($link);
?>
