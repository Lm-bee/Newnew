<?php

@include 'config.php';

// // Fetch data from the database
// $select_query = "SELECT * FROM `inventory`";
// $result = mysqli_query($conn, $select_query);

$productName = "";
$netWeight = "";
$unit = "";
$category = "";
$unitPrice = "";
$retailPrice = "";
$stock = "";

if (isset($_POST['inventory_search'])) {
    $productName = $_POST['productName'];

    // Fetch data from the database
    $select_query = "SELECT * FROM `inventory` WHERE `product_name` = '$productName'";
    $result = mysqli_query($conn, $select_query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the product details
        $row = mysqli_fetch_assoc($result);
        $productName = $row['product_name'];
        $netWeight = $row['net_weight'];
        $unit = $row['unit'];
        $category = $row['category'];
        $unitPrice = $row['unit_price'];
        $retailPrice = $row['retail_price'];
        $stock = $row['stock'];


    } else {
        // No matching product found
        echo "Product not found!";
    }
}

if (isset($_POST['inventory_update'])) {
    $productName = $_POST['productName'];
    $netWeight = $_POST['netWeight'];
    $category = $_POST['category'];
    $unit = $_POST['unit'];
    // if (empty($_POST['pieces'])) {
    //     $pieces = NULL;
    // } else {
    //     $pieces = $_POST['pieces'];
    // }
    $unitPrice = $_POST['unitPrice'];
    $retailPrice = $_POST['retailPrice'];
    $stock = $_POST['stock'];
    // echo "Pieces:" .$pieces;

    if ($netWeight == NULL) {
        $url = $productName . ".png";

        // Construct the UPDATE query
        $update_query = "UPDATE `inventory` SET
        `net_weight` = NULL,
        `unit` = '$unit', 
        `category` = '$category', 
        `unit_price` = '$unitPrice', 
        `retail_price` = '$retailPrice', 
        `stock` = '$stock',
        `picture_url` =  '$url'
        WHERE `product_name` = '$productName'";

        // Execute the UPDATE query
        if (mysqli_query($conn, $update_query)) {
            echo "Data updated successfully.";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    } else {
        $url = $productName . " " . $netWeight . ".png";

        // Construct the UPDATE query
        $update_query = "UPDATE `inventory` SET 
        `net_weight` = '$netWeight',
        `unit` = '$unit', 
        `category` = '$category', 
        `unit_price` = '$unitPrice', 
        `retail_price` = '$retailPrice', 
        `stock` = '$stock',
        `picture_url` =  '$url'
        WHERE `product_name` = '$productName'";

        // Execute the UPDATE query
        if (mysqli_query($conn, $update_query)) {
            echo "Data updated successfully.";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }
    // }


    // // Construct the UPDATE query
    // // if ( $pieces == NULL){
    // $update_query = "UPDATE `inventory` SET 
    //     `net_weight` = '$netWeight',
    //     `unit` = '$unit', 
    //     `category` = '$category', 
    //     `unit_price` = '$unitPrice', 
    //     `retail_price` = '$retailPrice', 
    //     `stock` = '$stock',
    //     `picture_url` =  '$url'
    //     WHERE `product_name` = '$productName'";

    // // Execute the UPDATE query
    // if (mysqli_query($conn, $update_query)) {
    //     echo "Data updated successfully.";
    // } else {
    //     echo "Error updating data: " . mysqli_error($conn);
    // }
    // // // }
    // // else {
    // //     $update_query = "UPDATE `inventory` SET 
    // //     `net_weight` = '$netWeight',
    // //     `category` = '$category', 
    // //     `unit_price` = '$unitPrice', 
    // //     `retail_price` = '$retailPrice', 
    // //     `stock` = '$stock' 
    // //     WHERE `product_name` = '$productName'";
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
    <form action="" method="POST" id="search_productName">
        <!-- <label for="productID">Product ID:</label><br>
        <input type="text" name="productID" id="productID"><br> -->

        <label for="productName">Product Name:</label><br>
        <input type="text" name="productName" id="productName" value="<?php echo $productName; ?>"><br>
        <input type="submit" name="inventory_search" id="inventory_search" value="search">
    </form>

    <form action="" method="POST" id="productInfo" style="display:none;">
        <label for="productName">Product Name:</label><br>
        <input type="text" name="productName" id="productName" value="<?php echo $productName; ?>"><br>

        <label for="netWeight">Net Weight:</label><br>
        <input type="text" name="netWeight" id="netWeight" value="<?php echo $netWeight; ?>"><br>

        <label for="unit">Unit:</label><br>
        <input type="text" name="unit" id="unit" value="<?php echo $unit; ?>"><br>

        <label for="category">Category:</label><br>
        <input type="text" name="category" id="category" value="<?php echo $category; ?>"><br>

        <label for="unitPrice">Unit Price:</label><br>
        <input type="number" step="0.01" name="unitPrice" id="unitPrice" value="<?php echo $unitPrice; ?>"><br>

        <label for="retailPrice">Retail Price:</label><br>
        <input type="number" step="0.01" name="retailPrice" id="retailPrice" value="<?php echo $retailPrice; ?>"><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" id="stock" value="<?php echo $stock; ?>"><br>

        <input type="submit" name="inventory_update" id="inventory_update" value="update">
    </form>

    <input type="button" name="back" id="back" value="back">

    <script>
        document.getElementById("back").addEventListener("click", function () {
            window.location.href = "Inventory.php";
        });

        <?php if (isset($result) && mysqli_num_rows($result) > 0): ?>
            document.getElementById("productInfo").style.display = "block";
            document.getElementById("search_productName").style.display = "none";
        <?php endif; ?>
    </script>
</body>

</html>