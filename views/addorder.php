<?php
require_once '../controllers/orderscontroller.php';

$orderAdded = false;
$ordersController = new OrdersController();

if (isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $username = $_POST['user_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];
    $total_price = $_POST['total_price'];

    $orderAdded = $ordersController->addOrder($userid, $username, $phone, $address, $city, $order_date, $status, $total_price);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" />
    <link rel="stylesheet" href="../public/css/displayproducts.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="../public/css/editdash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Order</title>
</head>

<body>
    <div class="container">
        <aside>
            <?php
            $currentPage = 'ordersdash';
            include('../partials/dashboardsidebar.php');
            ?>
        </aside>

        <main>
            <h1>Orders</h1>

            <div class="addprod">
                <form action="addorder.php" class="form" method="POST">
                    <h2 class="title">Add an Order</h2>
                    <div class="product-container">
                        <div class="input">
                            <label for="userid">User ID</label>
                            <div><input type="text" id="userid" placeholder="User ID" name="userid" required></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="user_name">Customer Name</label>
                            <div><input type="text" id="user_name" placeholder="Customer name" name="user_name" required></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="phone">Phone</label>
                            <div><input type="text" id="phone" placeholder="Phone" name="phone" required></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="address">Address</label>
                            <div><input type="text" id="address" placeholder="Address" name="address" required></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="city">City</label>
                            <div><input type="text" id="city" placeholder="City" name="city" required></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="order_date">Order Date</label>
                            <div><input type="date" id="order_date" name="order_date" required></div>
                            <span class="errormsg"></span>
                        </div>


                        <div class="input">
                            <label for="status">Status</label>
                            <div><input type="text" id="status" placeholder="Status" name="status" required></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="total_price">Total Amount</label>
                            <div><input type="text" id="total_price" placeholder="Total Amount" name="total_price" required></div>
                            <span class="errormsg"></span>
                        </div>

                        <button type="submit" name="submit" id="add">Add</button>
                        <span>
                            <a href="addorder.php"><button id="cancel">Cancel</button></a>
                        </span>
                    </div>
                </form>

            </div>
        </main>

        <div id="successPopup" class="success-popup" style="display: none;">
            Order added successfully!
        </div>

        <script src="../public/js/popup.js"></script>

        <?php if ($orderAdded) : ?>
            <script>
                showSuccessPopup();
            </script>
        <?php endif; ?>
    </div>
</body>

</html>