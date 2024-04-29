<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'sari-sari_store_dbms');

    if ($conn->connect_error) {
        die('Connection Failed: ' .$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO `user` (`User ID`, `Username`, `Email`, `Phone`, `Password`) VALUES (UUID(), ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $contactNumber, $password);

        if ($stmt->execute()) {
            echo '<script>alert("Registration successful!");</script>';
        } else {
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
        }

        $stmt->close();
        $conn->close();
    }
?>
