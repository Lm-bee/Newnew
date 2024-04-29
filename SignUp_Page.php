<?php

// Include the configuration file (contains database connection details)
@include 'config.php';

// Start a session to store user data
session_start();

// Check if the sign up form is submitted
if(isset($_POST['signup_submit'])){

   // Get firstName, lastName, email, password and confirmPassword from the submitted form data
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $contactNumber = $_POST['contactNumber'];
   $password = $_POST['password'];
   $confirmPassword = $_POST['confirmPassword'];
   
   // Check if a user with the same firstName, lastName, email, and password already exists in the database
   $select = " SELECT * FROM user WHERE Username = '$username' && Email = '$email' && Phone = '$contactNumber' && Password = '$password'";
   
   // Execute the query
   $result = mysqli_query($conn, $select);

   // If a match is found, set an error message
   if(mysqli_num_rows($result) > 0){
      echo 'User already exists!';
   }else{
      // Check if the password and confirmPassword match
      if($pass != $confirmPassword){
         echo 'Password does not match!';
      }else{
         echo '<script>alert("Account successfully created!");</script>';

         // If all checks pass, insert the user data into the database
         $insert = "INSERT INTO signup_info(User ID, Username, Email, Phone, Password) VALUES(UUID(), '$username', '$email', '$contactNumber','$password')";
         
         mysqli_query($conn, $insert);
         header('location:Main_Page.html');
      }
   }
}
?>
