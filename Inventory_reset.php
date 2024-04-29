<?php

@include 'config.php';

// // Fetch data from the database
// $select_query = "SELECT * FROM `inventory`";
// $result = mysqli_query($conn, $select_query);

if (isset($_POST['inventory_reset'])) {
    // Construct the DELETE query
    $delete_query = "DELETE FROM `inventory`";

    // Execute the DELETE query
    if (mysqli_query($conn, $delete_query)) {
        echo "All data deleted successfully.";
    } else {
        echo "Error deleting data: " . mysqli_error($conn);
    }
}
?>