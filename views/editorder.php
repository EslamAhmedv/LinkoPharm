<?php
require_once '../controllers/orderscontroller.php';
$ordersController = new OrdersController();

// Hold order details
$orderID = $customerName = $city = $orderDate = $status = $amount = '';

if (isset($_GET['id'])) {
    $orderID = $_GET['id'];
    $order = $ordersController->getOrderById($orderID);

    if ($order) {
        $customerName = $order['customer_name'];
        $city = $order['city'];
        $orderDate = $order['order_date'];
        $status = $order['status'];
        $amount = $order['amount'];
    } else {
        echo "No order found with this ID";
    }
}

if (isset($_POST['editorder'])) {
    $updateSuccess = $ordersController->updateOrder(
        $_POST['id'],
        $_POST['customer_name'],
        $_POST['city'],
        $_POST['order_date'],
        $_POST['status'],
        $_POST['amount']
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
                <form class="form" method="POST">
                    <h2 class="title">Update an Order</h2>
                    <div class="product-container" style="display: block;">
                        <input type="hidden" name="id" value="<?php echo $orderID; ?>">

                        <div class="input">
                            <label for="customer_name">Customer Name</label>
                            <div><input type="text" id="customer_name" name="customer_name" required value="<?php echo $customerName; ?>"></div>
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
                            <label for="amount">Total Amount</label>
                            <div><input type="text" id="amount" name="amount" required value="<?php echo $amount; ?>"></div>
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
