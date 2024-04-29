<?php

// Include the configuration file (contains database connection details)
@include 'config.php';

// Start a session to store user data
session_start();

// Check if the sign up form is submitted
if (isset($_POST['signup_submit'])) {
    $error = [];

    // Get firstName, lastName, email, password and confirmPassword from the submitted form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if a user with the same username, email, phone, and password already exists in the database
    $select = " SELECT * FROM user WHERE username = '$username' && email = '$email' && phone_number = '$phoneNumber' && password = '$password'";

    // Execute the query
    $result = mysqli_query($conn, $select);

    // If a match is found, set an error message
    if (mysqli_num_rows($result) > 0) {
        echo 'User already exists!';
    } else {
        // Check if the password and confirmPassword match
        if ($password != $confirmPassword) {
            echo 'Password does not match!';
        } else {
            echo '<script>alert("Account successfully created!");</script>';

            // If all checks pass, insert the user data into the database
            $insert = "INSERT INTO user(`user_id`, `username`, `email`, `phone_number`, `password`) VALUES(UUID(), '$username', '$email', '$phoneNumber','$password')";

            mysqli_query($conn, $insert);
            header('location:Main_Page.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <style>
        body {
            background-color: teal;
        }
    </style>
</head>

<body>
    <h1>SARI-SARI STORE APP</h1>

    <div>
        <h2>Register</h2>
        <form action="" method="POST">
            <div>
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" required><br>
            </div>

            <div>
                <label for="email">Email:</label><br>
                <input type="text" name="email" id="email" required><br>
            </div>

            <div>
                <label for="phoneNumber">Contact Number:</label><br>
                <input type="text" name="phoneNumber" id="phoneNumber" required><br>
            </div>

            <div>
                <label for="password">Password:</label><br>
                <input type="text" name="password" id="password" required><br><br>
            </div>

            <div>
                <label for="confirmPassword">Confirm Password:</label><br>
                <input type="text" name="confirmPassword" id="confirmPassword" required><br><br>
            </div>

            <div><input type="submit" name="signup_submit" id="signup_submit"><br></div>

            <div>
                <p class="txt">Already have an account?
                    <a href="Login_Page.php" class="logIn-link">Log In</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>
