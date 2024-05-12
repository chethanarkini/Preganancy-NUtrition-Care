<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $conceiving_date = $_POST['conceiving_date'];

    // Check if email already exists
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_sql);
    if (mysqli_num_rows($check_email_result) > 0) {
        // Email already exists, prepare error message
        $error_message = "Email already exists. Please choose a different email address";
        // Redirect back to signup.php with error message
        header("Location: signup.php?error=" . urlencode($error_message));
        exit();
    }

    // Insert data into users table
    $sql = "INSERT INTO users (`name`, `phone_number`, `email`, `password`, `conceiving_date`) 
            VALUES ('$name', '$phone_number', '$email', '$password', '$conceiving_date')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: home_after.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
