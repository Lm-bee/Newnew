<?php
@include 'config.php';

// // Fetch data from the database
// $select_query = "SELECT * FROM `inventory`";
// $result = mysqli_query($conn, $select_query);

if (isset($_POST['inventory_delete'])) {
    // $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $netWeight = $_POST['netWeight'];
    $category = $_POST['category'];
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

        <label for="unitPrice">Unit Price:</label><br>
        <input type="text" name="unitPrice" id="unitPrice"><br>

        <label for="salesPrice">Sales Price:</label><br>
        <input type="text" name="salesPrice" id="salesPrice"><br>

        <label for="stock">Stock:</label><br>
        <input type="text" name="stock" id="stock"><br>

        <input type="submit" name="inventory_delete" id="inventory_delete" value="delete">
    </form>

    <input type="button" name="back" id="back" value="back">

    <script>
        document.getElementById("back").addEventListener("click", function () {
            window.location.href = "Inventory.php";
        });
    </script>
</body>

</html>