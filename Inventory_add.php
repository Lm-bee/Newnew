<?php 

@include 'config.php';

if (isset($_POST['inventory_add'])) {
    // $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $netWeight = $_POST['netWeight'];
    $unit = $_POST['unit'];
    $category = $_POST['category'];
    $unitPrice = $_POST['unitPrice'];
    $retailPrice = $_POST['retailPrice'];
    $stock = $_POST['stock'];

    if($netWeight == NULL) {
        $url = $productName .".png";

        $insert_query = "INSERT INTO `inventory`(`product_name`, `unit`, `category`, `unit_price`, `retail_price`, `stock`, `picture_url`) VALUES ('$productName', '$unit', '$category', '$unitPrice', '$retailPrice', '$stock', '$url')";
        if (mysqli_query($conn, $insert_query)) {
            echo "Data inserted successfully.";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
    else {
        $url = $productName ." " .$netWeight .".png";

        $insert_query = "INSERT INTO `inventory`(`product_name`, `net_weight`, `unit`, `category`, `unit_price`, `retail_price`, `stock`, `picture_url`) VALUES ('$productName', '$netWeight', '$unit', '$category', '$unitPrice', '$retailPrice', '$stock', '$url')";
        if (mysqli_query($conn, $insert_query)) {
            echo "Data inserted successfully.";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
    

    // if ($pieces == NULL){
        
    // }
    // echo "Product ID: $productID";
    // $check_query = "SELECT * FROM `inventory` WHERE `product_id` = '$productID'";
    // $result = mysqli_query($conn, $check_query);
    // if (mysqli_num_rows($result) > 0) {
    //     echo "Product ID already exists. Please choose a different one.";
    // } else {
        // Inserting data into the database
    // else {
    //     $insert_query = "INSERT INTO `inventory`(`product_name`, `net_weight`, `category`, `unit`, `unit_price`, `retail_price`, `stock`) VALUES ('$productName', '$netWeight', '$category', '$unit', '$unitPrice', '$retailPrice', '$stock')";
    //     if (mysqli_query($conn, $insert_query)) {
    //         echo "Data inserted successfully.";
    //     } else {
    //         echo "Error inserting data: " . mysqli_error($conn);
    //     }
    // }
    // }
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

        <label for="productName">Product Name:</label><br>
        <input type="text" name="productName" id="productName"><br>

        <label for="netWeight">Net Weight:</label><br>
        <input type="text" name="netWeight" id="netWeight"><br>

        <label for="unit">Unit:</label><br>
        <input type="text" name="unit" id="unit"><br>

        <label for="category">Category:</label><br>
        <input type="text" name="category" id="category"><br>

        <label for="unitPrice">Unit Price:</label><br>
        <input type="number" step="0.01" name="unitPrice" id="unitPrice"><br>

        <label for="retailPrice">Retail Price:</label><br>
        <input type="number" step="0.01" name="retailPrice" id="retailPrice"><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="stock" id="stock"><br>

        <input type="submit" name="inventory_add" id="inventory_add" value="add">
    </form>

    <input type="button" name="back" id="back" value="back">

    <script>
        document.getElementById("back").addEventListener("click", function () {
            window.location.href = "Inventory.php";
        });
    </script>
</body>

</html>