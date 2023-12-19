<?php
require_once '../controllers/orderscontroller.php';
$ordersController = new OrdersController();

// Hold order details
$orderID = $customerName = $city = $orderDate = $status = $amount = '';
$updateSuccess = false;

if (isset($_GET['id'])) {
    $orderID = $_GET['id'];
    $order = $ordersController->getOrderById($orderID);

    if ($order) {
        $orderID = $order['id'];
        $customerName = $order['user_name'];
        $city = $order['city'];
        $orderDate = $order['order_date'];
        $status = $order['status'];
        $amount = $order['total_price'];
    } else {
        echo "No order found with this ID";
    }
}

if (isset($_POST['editorder'])) {
    $updateSuccess = $ordersController->updateOrder(
        $_POST['id'],
        $_POST['user_name'], 
        $_POST['city'],      
        $_POST['order_date'],
        $_POST['status'],
        $_POST['total_price']
    );

    if ($updateSuccess) {
        header("Location: orderdash.php?message=Order updated successfully");
        exit;
    } else {
        echo "Failed to update the order";
    }
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
    <title>Edit Order</title>
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
            <h1>Edit Order</h1>
            <div class="addprod">
                <form class="form" method="POST" action="editorder.php?id=<?php echo $orderID; ?>">
                    <h2 class="title">Update an Order</h2>
                    <div class="product-container" style="display: block;">
                        <input type="hidden" name="id" value="<?php echo $orderID; ?>">

                        <input type="hidden" name="userid" value="<?php echo $order['userid']; ?>">

                        <div class="input">
                            <label for="user_name">Customer Name</label>
                            <div><input type="text" id="user_name" name="user_name" required value="<?php echo $customerName; ?>"></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="address">Address</label>
                            <div><input type="text" id="address" name="address" required value="<?php echo $order['address']; ?>"></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="city">City</label>
                            <div><input type="text" id="city" name="city" required value="<?php echo $city; ?>"></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="order_date">Order Date</label>
                            <div><input type="date" id="order_date" name="order_date" required value="<?php echo $orderDate; ?>"></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="status">Status</label>
                            <div><input type="text" id="status" name="status" required value="<?php echo $status; ?>"></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="total_price">Total Amount</label>
                            <div><input type="text" id="total_price" name="total_price" required value="<?php echo $amount; ?>"></div>
                            <span class="errormsg"></span>
                        </div>

                        <input type="submit" name="editorder" id="add" value="Update"></input>
                        <span>
                            <a href="orderdash.php">Cancel</a>
                        </span>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>