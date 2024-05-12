<?php
$conn = new mysqli("localhost", "root", "", "Pregnancy");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>

