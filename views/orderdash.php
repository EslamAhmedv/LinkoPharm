<?php
require '../controllers/orderscontroller.php';
$ordercontriller = new OrdersController();

// Check if the 'deleteOrder' form was submitted
if (isset($_POST['deleteOrder'])) {
    $ordercontriller -> deleteOrder($_POST['orderId']);
}

$orders = $ordercontriller -> getAllOrders();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" />
    <link rel="stylesheet" href="../public/css/displayproducts.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Orders</title>
</head>
<body>
    <div class="container">
        <aside>
            <?php
            $currentPage = 'ordersdash';
            include('../partials/dashboardsidebar.php');
            ?>
        </aside>
        <main class="table">
            <section class="theader">
                <h1>Track Orders</h1>
                <div class="search">
                    <input type="search" placeholder="Search Orders...">
                </div>
                <div class="add_product">
                    <a href="addorder.php">
                        <button class="btn add-product"><i class="fa fa-plus"></i> Add Order</button>
                    </a>
                </div>
            </section>
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>City</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Update/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) { ?>
                            <tr>
                                <td><?php echo $order['id']; ?></td>
                                <td><?php echo $order['customer_name']; ?></td>
                                <td><?php echo $order['city']; ?></td>
                                <td><?php echo $order['order_date']; ?></td>
                                <td><?php echo $order['status']; ?></td>
                                <td><?php echo 'EGP ' . $order['total_amount']; ?></td>
                                <td>
                                    <a href="editorder.php?id=<?php echo $order['id']; ?>">
                                        <button class="btn edit-order"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <form method="POST">
                                        <input type="hidden" name="orderId" value="<?php echo $order['id']; ?>">
                                        <button class="btn delete-order" type="submit" name="deleteOrder"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
