
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE allphptricks";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();


"CREATE TABLE IF NOT EXISTS `products` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(250) NOT NULL,
    `code` varchar(100) NOT NULL,
    `price` double(9,2) NOT NULL,
    `image` varchar(250) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `code` (`code`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;"


    $con = new mysqli("localhost","root","","allphptricks");
    if (mysqli_connect_error()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
	}  
?>