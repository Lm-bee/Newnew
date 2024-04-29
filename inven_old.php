<?php
@include 'config.php';

// Fetch data from the database
$select_query = "SELECT * FROM `inventory`";
$result = mysqli_query($conn, $select_query);

// Check if the query was successful
if ($result) {
    // Output the table headers
    echo '<table style="border: 1px solid black;">';
    echo ' <thead>';
    echo '<tr>';
    echo '<th>Product ID</th>';
    echo '<th>Product Name</th>';
    echo '<th>Net Weight</th>';
    echo '<th>Category</th>';
    echo '<th>Unit</th>';
    echo '<th>Pieces</th>';
    echo '<th>Unit Price</th>';
    echo '<th>Retail Price</th>';
    echo '<th>Stock</th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody id="inventoryTable">';

    // Output the table rows with data from the database
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['product_id']}</td>";
        echo "<td>{$row['product_name']}</td>";
        echo "<td>{$row['net_weight']}</td>";
        echo "<td>{$row['category']}</td>";
        echo "<td>{$row['unit']}</td>";
        echo "<td>{$row['pieces']}</td>";
        echo "<td>{$row['unit_price']}</td>";
        echo "<td>{$row['retail_price']}</td>";
        echo "<td>{$row['stock']}</td>";
        echo "</tr>";
    }

    echo '</tbody>';
    echo '</table>';
} else {
    // Display an error message if the query fails
    echo "Error fetching data from the database: " . mysqli_error($conn);
}

if (isset($_POST['inventory_add'])) {
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $netWeight = $_POST['netWeight'];
    $category = $_POST['category'];
    $category = $_POST['unit'];
    $category = $_POST['pieces'];
    $unitPrice = $_POST['unitPrice'];
    $retailPrice = $_POST['retailPrice'];
    $stock = $_POST['stock'];

    echo "Product ID: $productID";
    $check_query = "SELECT * FROM `inventory` WHERE `product_id` = '$productID'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        echo "Product ID already exists. Please choose a different one.";
    } else {
        // Inserting data into the database
        $insert_query = "INSERT INTO `inventory`(`product_id`, `product_name`, `net_weight`, `category`, `unit`, `pieces`, `unit_price`, `retail_price`, `stock`) VALUES ('$productID', '$productName', '$category', '$unit', '$pieces', '$unitPrice', '$retailPrice', '$stock')";
        if (mysqli_query($conn, $insert_query)) {
            echo "Data inserted successfully.";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['inventory_update'])) {
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $netWeight = $_POST['netWeight'];
    $category = $_POST['category'];
    $category = $_POST['unit'];
    $category = $_POST['pieces'];
    $unitPrice = $_POST['unitPrice'];
    $retailPrice = $_POST['retailPrice'];
    $stock = $_POST['stock'];

    echo "Product ID: $productID";
    $check_query = "SELECT * FROM `inventory` WHERE `product_id` = '$productID'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        // Construct the UPDATE query
        $update_query = "UPDATE `inventory` SET 
                        `product_name` = '$productName', 
                        `category` = '$category', 
                        `unit_price` = '$unitPrice', 
                        `retail_price` = '$retailPrice', 
                        `stock` = '$stock' 
                        WHERE `product_ID` = '$productID'";

        // Execute the UPDATE query
        if (mysqli_query($conn, $update_query)) {
            echo "Data updated successfully.";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    } else {
        //item data does not exist in database
        echo 'Item is not in the list.';
    }
}

if (isset($_POST['inventory_delete'])) {
    // $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $netWeight = $_POST['netWeight'];
    $category = $_POST['category'];
    $category = $_POST['unit'];
    $category = $_POST['pieces'];
    $unitPrice = $_POST['unitPrice'];
    $retailPrice = $_POST['retailPrice'];
    $stock = $_POST['stock'];

    echo "Product ID: $productID";
    $check_query = "SELECT * FROM `inventory` WHERE `product_id` = '$productID'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        // Construct the DELETE query
        $delete_query = "DELETE FROM `inventory` WHERE `product_id` = '$productID'";

        // Execute the DELETE query
        if (mysqli_query($conn, $delete_query)) {
            echo "Data deleted successfully.";
        } else {
            echo "Error deleting data: " . mysqli_error($conn);
        }
    } else {
        //item data does not exist in database
        echo 'Item is not in the list.';
    }
}

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
</head>

<body>
    <form action="" method="POST">
        <!-- <label for="productID">Product ID:</label><br>
        <input type="text" name="productID" id="productID"><br> -->

        <label for="itemName">Product Name:</label><br>
        <input type="text" name="itemName" id="itemName"><br>

        <label for="netWeight">Net Weight:</label><br>
        <input type="text" name="netWeight" id="netWeight"><br>

        <label for="category">Category:</label><br>
        <input type="text" name="category" id="category"><br>

        <label for="unit">Unit:</label><br>
        <input type="text" name="unit" id="unit"><br>

        <label for="pieces">Pieces:</label><br>
        <input type="text" name="pieces" id="pieces"><br>

        <label for="unitPrice">Unit Price:</label><br>
        <input type="text" name="unitPrice" id="unitPrice"><br>

        <label for="salesPrice">Sales Price:</label><br>
        <input type="text" name="salesPrice" id="salesPrice"><br>

        <label for="stock">Stock:</label><br>
        <input type="text" name="stock" id="stock"><br>

        <input type="submit" name="inventory_add" id="inventory_add" value="add">
        <input type="submit" name="inventory_update" id="inventory_update" value="update">
        <input type="submit" name="inventory_delete" id="inventory_delete" value="delete">
        <input type="submit" name="inventory_reset" id="inventory_reset" value="reset">
    </form>

    <input type="button" name="back" id="back" value="back">

    <script>
        document.getElementById("back").addEventListener("click", function () {
            window.location.href = "Main_Page.php";
        });
    </script>
</body>

</html>