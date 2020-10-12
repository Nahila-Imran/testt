<?php
$siteurl = "http://localhost/training/MySQL/shopping";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "shop";

$order = "";
$cart = array();
$total = 0;

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>