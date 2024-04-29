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
    $password = $_POST['password'];

    // Check if a user with the same username, email, phone, and password already exists in the database
    $select = " SELECT * FROM user WHERE username = '$username' && password = '$password'";

    // Execute the query
    $result = mysqli_query($conn, $select);

    // If a match is found, login successful
    if (mysqli_num_rows($result) > 0) {
        echo 'Login successful';

        header('location:Main_Page.php');
    } else {
        echo 'User ' . $username . ' does not exists!';
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
        <h2>Login</h2>
        <form action="" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Password:</label><br>
            <input type="text" name="password" id="password" required><br><br>

            <input type="submit" name="signup_submit" id="signup_submit"><br>
        </form>

        <input type="button" name="back" id="back" value="back">

        <script>
            document.getElementById("back").addEventListener("click", function () {
                window.location.href = "index.php";
            });
        </script>
    </div>
</body>

</html>