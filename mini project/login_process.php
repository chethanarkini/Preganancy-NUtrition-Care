<?php
include('db_connect.php');
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to check if email and password match
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

// Check if there is a matching record
if ($result->num_rows > 0) {
    // User is authenticated, redirect to dashboard or any other page
    header("Location: home_after.html");
    exit();
} else {
    // Invalid credentials, redirect back to login page with an error message
    header("Location: login.html?error=invalid_credentials");
    exit();
}

?>
