<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "linkopharm";

// Create connection
// session_start();
$conn = mysqli_connect($servername, $username, $password, $DB);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
