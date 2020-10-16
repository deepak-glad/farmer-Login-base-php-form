<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname= 'farmer';

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " );
}
// echo "Connected successfully";

?>

