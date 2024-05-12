<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <div class="heading">
        <center><img src="logo3.png" alt="Logo" style="display: inline-block;"></center>
    </div>
    <div class="background">
        <div class="full">
            <center><h1>Sign Up</h1></center>
            <div class="container"> 
                <?php
                // Check if there's an error message in the URL parameters
                if (isset($_GET['error'])) {
                    $error_message = $_GET['error'];
                    // Display the error message
                    echo "<div class='error' style='color: red;'>$error_message</div>";
                }
                ?>

                <form id="signupForm" action="signup_process.php" method="post">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required><br>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone_number" required><br>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required><br>
                    <label for="conceiving_date">Date of Conceiving:</label>
                    <input type="date" id="conceiving_date" name="conceiving_date" required><br>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
            <br>
            <center><a class="signup-link" href="login.html" >Already have account? Login</a></center>
        </div>
        <div class="about-us">
            <center><h1>About us</h1></center>
            <p>Welcome to PregaNutriCare! We're dedicated to providing personalized nutrition guidance for expecting mothers, considering individual health needs and offering support through our chatbot feature.</p><br><br>
            <center><h1>Contact us</h1></center>
            <p></p>
            <div class="contact-box">
                <form action="mailto:hegdemanya04@gmail.com" method="post" enctype="text/plain">
                    <label for="query">Put your query here:</label>
                    <textarea id="query" name="query" rows="4" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
