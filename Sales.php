<?php
session_start(); // Start session

@include 'config.php';

// // Function to compute and insert sales based on date range
// function computeSales($conn, $startDate, $endDate) {
//     // Query sales within the specified date range
//     $sales_query = "SELECT SUM(`Total Amount`) AS `TotalSales` FROM `sales` WHERE `Date` BETWEEN '$startDate' AND '$endDate'";
//     $sales_result = mysqli_query($conn, $sales_query);

//     if ($sales_result) {
//         $row = mysqli_fetch_assoc($sales_result);
//         $totalSales = $row['TotalSales'];
//         // Insert the sale details into the sales table for the specified date range
//         $insert_query = "INSERT INTO `sales_summary` (`Date Range`, `Total Sales`) VALUES ('$startDate - $endDate', $totalSales)";
//         if (mysqli_query($conn, $insert_query)) {
//             echo "Sales computed successfully for $startDate - $endDate.";
//         } else {
//             echo "Error inserting data: " . mysqli_error($conn);
//         }
//     } else {
//         // Display an error message if the query fails
//         echo "Error fetching sales data: " . mysqli_error($conn);
//     }
// }

// // Handle button clicks
// if (isset($_POST['daily'])) {
//     // Get today's date
//     $today = date("Y-m-d");
//     computeSales($conn, $today, $today);
// }

// if (isset($_POST['weekly'])) {
//     // Calculate start and end dates of the current week
//     $startOfWeek = date('Y-m-d', strtotime('monday this week'));
//     $endOfWeek = date('Y-m-d', strtotime('sunday this week'));
//     computeSales($conn, $startOfWeek, $endOfWeek);
// }

// if (isset($_POST['monthly'])) {
//     // Calculate start and end dates of the current month
//     $startOfMonth = date('Y-m-01');
//     $endOfMonth = date('Y-m-t');
//     computeSales($conn, $startOfMonth, $endOfMonth);
// }

// if (isset($_POST['annual'])) {
//     // Calculate start and end dates of the current year
//     $startOfYear = date('Y-01-01');
//     $endOfYear = date('Y-12-31');
//     computeSales($conn, $startOfYear, $endOfYear);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
</head>

<body>
    <h1>Sales</h1>

    <form action="" method="POST">
        <button type="button" name="daily" id="daily">Daily</button>
        <button type="button" name="weekly" id="weekly">Weekly</button>
        <button type="button" name="monthly" id="monthly">Monthly</button>
        <button type="button" name="annual" id="annual">Annual</button>
    </form>

    <br><br>
    <input type="button" name="back" id="back" value="back">

    <script>
        document.getElementById("daily").addEventListener("click", function () {
            window.location.href = "Daily_Sales.php";
        });

        document.getElementById("weekly").addEventListener("click", function () {
            window.location.href = "Weekly_Sales.php";
        });

        document.getElementById("monthly").addEventListener("click", function () {
            window.location.href = "Monthly_Sales.php";
        });

        document.getElementById("annual").addEventListener("click", function () {
            window.location.href = "Annual_Sales.php";
        });

        document.getElementById("back").addEventListener("click", function () {
            window.location.href = "Main_Page.php";
        });
    </script>
</body>

</html>