<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../controllers/orderscontroller.php');

// Set user ID in session and assign it to a variable
$userid = $_SESSION['auth_user']['user_id'] ?? 0; 

// create new order model
$OrdersModel = new OrdersModel();

if ($row=$OrdersModel->getOrder($userid)) {
    $orderid=$row["id"];
    $user_name=$row["user_name"];
    $city=$row["city"];
    $address=$row["address"];
    $order_date=$row["order_date"];
    $status=$row["status"];
    $total_price=$row["total_price"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/confirmationpage.css">
    <title>Document</title>
</head>
<body>
<div class="hero">
    <?php include('../partials/navbar.php'); ?>
    <center>
    <div class="container">
        <div class="Left">
            <img class="check" src="../public/images/checked (1).png" alt="">
            <p class="message">Thank you, <?php echo $user_name?> for your order!</p>
            <p class="message1">Your order will be delivered within 1 day of your purchase</p>
            <p class="message3">Your order number is</p>
            <p class="order_number">#<?php echo $orderid?></p>
            <a href="index.php">
            <button>
                <span>Continue Shopping</span>
            </button>
            </a>
            <a href="receipt.php">
            <button class="B1">
                <span>Receipt</span>
            </button>
            </a>
        </div>
        <div class="right">
            <table style="width:100%">
            <tr>
                <td class="th">Name:</td>
                <td><?php echo $user_name?></td>
            </tr>
            <tr>
                <td class="th">Order date:</td>
                <td><?php echo $order_date?></td>
            </tr>
            <tr>
                <td class="th">City:</td>
                <td><?php echo $city?></td>
            </tr>
            <tr>
                <td class="th">Address:</td>
                <td><?php echo $address?></td>
            </tr>
            <tr>
                <td class="th">Status:</td>
                <td><?php echo $status?></td>
            </tr>
            <tr>
                <td class="th">Total price:</td>
                <td><?php echo $total_price?></td>
            </tr>
            <tr>
                <td class="th">Payment:</td>
                <td>Visa</td>
            </tr>
        </table>
        </div>
    </div>
    </center>
    <br>
</div>   
</body>
</html>







