<?php
include ("PhpFunctions/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/storeLogo.svg">
    <link rel="stylesheet" href="../css/pos.css">

    <title>JFKL Store</title>
</head>

<body>
    <div class="navbar">
        <div class="left">
            <div class="shape">

            </div>
            <div class="logo">
                <img src="../assets/storeLogo.svg" alt="">
                <p>JFKL Store</p>
            </div>
        </div>

        <div class="searchBar">
            <input type="text" id="search" placeholder="Search">
        </div>

        <div class="right">
            <div class="todayGrossSaleLabel">
                <p>Today's Gross Sale: </p>
            </div>
            <div class="todayGrossSale">
                <p><strong>P969.00</strong></p>
            </div>
            <div class="date">
                <p>May 13, 2024</p>
            </div>
        </div>
    </div>

    <div class="mainContainer">
        <div class="sideBar">
            <div class="sbPOS">
                <button id="POSBtn">
                    <img src="../assets/POS.svg" alt=""><br>
                    <strong>POS</strong>
                </button>
            </div>
            <div class="sbInventory">
                <button id="inventoryBtn">
                    <img src="../assets/inventory.svg" alt=""><br>
                    <strong>Inventory</strong>
                </button>
            </div>
            <div class="sbSales">
                <button id="salesBtn">
                    <img src="../assets/sales.svg" alt=""><br>
                    <strong>Sales</strong>
                </button>
            </div>
        </div>

        <div class="productDisplay">
            <div class="category" id="categoryContainer">
                <button class="categoryBtn">All</button>
                <button class="categoryBtn">Canned Goods</button>
                <button class="categoryBtn">Coffee</button>
                <button class="categoryBtn">Biscuits</button>
                <button class="categoryBtn">Ice Cream</button>
                <button class="categoryBtn">Bread</button>
                <button class="categoryBtn">Health and Beaty</button>
                <button class="categoryBtn">Houshold & Cleaning Supply</button>
                <button class="categoryBtn">Personal Care Products</button>
                <button class="categoryBtn">Drinks</button>
                <button class="categoryBtn">Powered Drinks</button>
                <button class="categoryBtn">Junkfoods</button>
                <button class="categoryBtn">Cigarettes</button>
                <button class="categoryBtn">Frozen Foods</button>
                <button class="categoryBtn">Instant Noodles</button>
                <button class="categoryBtn">Alcholic Beverages</button>
                <button class="categoryBtn">Candies & Chocolates</button>
                <button class="categoryBtn">Dairy Products</button>
                <button class="categoryBtn">Condiments</button>
                <button class="categoryBtn">Cooking Ingredients & Seasoning</button>
                <button class="categoryBtn">Spreads and Fillings</button>
                <button class="categoryBtn">School Supplies</button>
            </div>

            <div class="ItemView">
                <div class="products">
                    <?php
                    $query = "SELECT * FROM inventory";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="ItemCardView">
                            <div class="image">
                                <img src="../assets/InventoryItems/<?php echo $row['picture_url']; ?>">
                            </div>
                            <div class="productName">
                                <p><?php echo $row['product_name']; ?></p>
                            </div>
                            <div class="netWeight">
                                <p><?php echo $row['net_weight']; ?></p>
                            </div>
                            <div class="priceAddCart">
                                <div class="price">
                                    <p>₱<?php echo $row['retail_price']; ?></p>
                                </div>
                                <button><img src="../assets/buttonAdd.svg"></button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="cartSection">
            <div class="cart">
                <div class="cartLabel">
                    <p>Cart</p>
                </div>
                <div class="buttons">
                    <button>New Order</button>
                    <button>Hold Order</button>
                    <button>Clear</button>
                </div>
                <div class="orderList">
                    <div class="container">
                        <img src="../assets/samplePic.svg" alt="">

                        <div class="items">
                            <h3>Item</h3>
                            <h1>Argentina Meat Loaf</h1>
                            <h2>150g</h2>
                        </div>

                        <div class="Price">
                            <h3>Price</h3>
                            <h1>P 27.00</h1>
                        </div>

                        <div class="quantity">
                            <h3>Quantity</h3>
                            <div class="qty">

                                <img src="../assets/decreaseBtn.svg" alt=" ">
                                <input type="number" value="1">
                                <img src="../assets/buttonAdd.svg " alt="">
                            </div>
                        </div>

                        <div class="total">
                            <h3>Total</h3>
                            <h1>P 27.00</h1>
                        </div>

                        <div class="select">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </div>
                    </div>


                </div>

                <div class="CheckoutSection">
                    <div class="Subtotal">
                        <div class="lineDiv"></div>
                        <div class="CustomerAmount">
                            <h1>Amount Received</h1>
                            <input type="number">
                        </div>
                        <div class="SubTotal">
                            <h1>Subtotal</h1>
                            <h1>P 1,100</h1>
                        </div>
                        <div class="lineDiv"></div>
                        <div class="Total">
                            <h1>Total</h1>
                            <h1>P 1,100</h1>
                        </div>
                    </div>
                    <div class="Checkoutbuttons">
                        <button class="HoldOrder">Hold Order</button>
                        <button id="Checkout" class="ProceedBtn">Proceed</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="addItem">
            <div class="ItemContainer">
                <div class="itemInfo">
                    <img src="../assets/samplePic.svg" alt="">
                    <div class="Infos">
                        <h1>Argentina Meat Loaf</h1>
                        <h3>150g</h3>
                        <h1>P 27.00</h1>
                    </div>
                </div>
                <div class="ItemQuantity">
                    <div class="addQuantity">
                        <h3>Quantity</h3>
                        <div class="addMinusQuantity">
                            <img src="assets/decreaseBtn.svg" alt="">
                            <input type="number">
                            <img src="assets/buttonAdd.svg" alt="">
                        </div>
                    </div>
                    <div class="addToCart">
                        <button class="cancel">Cancel</button>
                        <button class="toCart">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="OrderSummary">
            <div class="OrderSummaryConatiner">
                <h1>Order Summary</h1>
                <div class="SummaryContainer">
                    <table>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>

                        <tr>
                            <td>
                                Argentina Meat Loaf
                            </td>

                            <td>
                                P 27.00
                            </td>

                            <td>
                                1
                            </td>
                            <td>
                                P 27.00
                            </td>
                        </tr>


                    </table>

                </div>

                <div class="AmountSummary">
                    <div class="TotalPayment">
                        <h2>Total</h2>
                        <h1>P 1,024.00</h1>
                    </div>

                    <div class="dividerDIV"></div>

                    <div class="AmountReceived">
                        <h2>Amount Receive</h2>
                        <h1>P 1,024.00</h1>
                    </div>
                    <div class="dividerDIV"></div>

                    <div class="change">
                        <h2>Change</h2>
                        <h1>P 1,024.00</h1>
                    </div>
                </div>

                <div class="ConfirmSection">
                    <button class="BackBtn">Back</button>
                    <button class="ConfirmBtn">Confirm Order</button>
                </div>
            </div>
        </div>
        <script src="../js/script.js"></script>

        <script>
            document.getElementById("inventoryBtn").onclick = function () {
                window.location.href = "inventory.php";
            };
        </script>
</body>

</html>