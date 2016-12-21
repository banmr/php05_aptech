<?php
$servername ="localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

// create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// check connect

if ($conn->connect_error) {
	die("connection failed: " . $conn->connect_error);
}

echo "connected successfully";

?>