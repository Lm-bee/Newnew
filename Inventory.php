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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
</head>

<body>
    <input type="button" name="inventory_add" id="inventory_add" value="add">
    <input type="button" name="inventory_update" id="inventory_update" value="update">
    <input type="button" name="inventory_delete" id="inventory_delete" value="delete">
    <input type="button" name="inventory_reset" id="inventory_reset" value="reset">
    <input type="button" name="back" id="back" value="back">

    <script>
        document.getElementById("inventory_add").addEventListener("click", function () {
            window.location.href = "Inventory_add.php";
        });

        document.getElementById("inventory_update").addEventListener("click", function () {
            window.location.href = "Inventory_update.php";
        });

        document.getElementById("inventory_delete").addEventListener("click", function () {
            window.location.href = "Inventory_delete.php";
        });

        document.getElementById("inventory_reset").addEventListener("click", function () {
            window.location.href = "Inventory_reset.php";
        });

        document.getElementById("back").addEventListener("click", function () {
            window.location.href = "Main_Page.php";
        });
    </script>
</body>

</html>