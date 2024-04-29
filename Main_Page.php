<?php

session_start();

@include 'config.php';

// Initialize total amount if it's not already set
if (!isset($_SESSION['totalAmount'])) {
    $_SESSION['totalAmount'] = 0;
}

if (isset($_POST['addItem'])) {

    //Get barcode and quantity from the form
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    $totalAmount = 0;

    $check_query = "SELECT * FROM `inventory` WHERE `product_id` = '$productID'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // store data from the database to variables
        while ($row = mysqli_fetch_assoc($result)) {
            $productID = $row['product_id'];
            $productName = $row['product_name'];
            $retailPrice = $row['retail_price'];
            $amount = $row['retail_price'] * $quantity;

            // Update total amount
            $_SESSION['totalAmount'] += $amount;

            // Insert the salesitems details into the sales table
            $insert_query = "INSERT INTO `sale_items`(`product_id`, `product_name`, `retail_price`, `quantity`, `amount`) VALUES ('$productID', '$productName', '$retailPrice', '$quantity', '$amount')";
            if (mysqli_query($conn, $insert_query)) {
                echo "Data inserted successfully to sale_items.";
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        }
    }
    // Fetch data from the database
    $select_query = "SELECT * FROM `sale_items`";
    $result = mysqli_query($conn, $select_query);

    // Check if the query was successful
    if ($result) {
        // Output the table headers
        echo '<table style="border: 1px solid black;">';
        echo ' <thead>';
        echo '<tr>';
        echo '<th>Sale ID</th>';
        echo '<th>Product ID</th>';
        echo '<th>Product Name</th>';
        echo '<th>Retail Price</th>';
        echo '<th>Quantity</th>';
        echo '<th>Amount</th>';
        echo '</tr>';
        echo '</thead>';

        echo '<tbody id="inventoryTable">';

        // Output the table rows with data from the database
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['sale_id']}</td>";
            echo "<td>{$row['product_id']}</td>";
            echo "<td>{$row['product_name']}</td>";
            echo "<td>{$row['retail_price']}</td>";
            echo "<td>{$row['quantity']}</td>";
            echo "<td>{$row['amount']}</td>";
            echo "</tr>";
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        // Display an error message if the query fails
        echo "Error fetching data from the database: " . mysqli_error($conn);
    }
}

if (isset($_POST['compute'])) {
    // Insert the sale details into the sales table
    $totalAmount = $_SESSION['totalAmount'];

    $insert_query = "INSERT INTO `all_sales` (`sale_id`, `sale_date`, `sale_time`, `sale_amount`) VALUES (UUID(), CURDATE(), CURTIME(), $totalAmount)";
    if (mysqli_query($conn, $insert_query)) {
        echo "Data inserted successfully to all_sales.";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }

    // Reset total amount for next transaction
    $_SESSION['totalAmount'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>
    <h1>JFKL SARI-SARI STORE</h1>

    <form action="" method="POST">
        <label for="productID">Product ID:</label><br>
        <input type="text" name="productID" id="productID"><br><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" id="quantity"><br><br>

        <input type="submit" name="addItem" id="addItem" value="Add Item"><br>

        <br><br>
        <input type="submit" name="compute" id="compute" value="Compute">
    </form>

    <br><br> <br><br>
    <input type="button" name="inventory" id="inventory" value="inventory">
    <input type="button" name="sales" id="sales" value="sales">

    <br><br>
    <input type="button" name="compute_sales" id="compute_sales" value="compute sales">
    <script>
        document.getElementById("inventory").addEventListener("click", function () {
            window.location.href = "Inventory.php";
        });

        document.getElementById("sales").addEventListener("click", function () {
            window.location.href = "Sales.php";
        });
    </script>

</body>

</html>