<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controllers/ordersController.php'; 
require_once '../models/ordersmodel.php'; 

// Set user ID in session and assign it to a variable
$userid = $_SESSION['auth_user']['user_id'] ?? null; 

$found=false;
if ($userid != null) {
// create new order object
$OrdersModel = new OrdersController();

// Get last order id
$maxId = null;      
$row=$OrdersModel->getOrder($userid);
foreach ($row as $key) {
    $orderId1 = $key['id'];

    if ($maxId === null || $orderId1 > $maxId) {
        $maxId = $orderId1;
    }
}

// Set last order id
$orderid=$maxId;

// Get last order data
if ($row=$OrdersModel->getOrderID($orderid)) {
    $user_name=$row["user_name"];
    $city=$row["city"];
    $address=$row["address"];
    $order_date=$row["order_date"];
    $status=$row["status"];
    $total_price=$row["total_price"];
}
$found=true;
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
    <center>
    <div class="container">
    <?php if ($found != false) {
    echo '
        <div class="Left">
            <img class="check" src="../public/images/checked (1).png" alt="">
            <p class="message">Thank you, '.$user_name.' for your order!</p>
            <p class="message1">Your order will be delivered within 1 day of your purchase</p>
            <p class="message3">Your order number is</p>
            <p class="order_number">#'.$orderid.'</p>
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
                <td>'.$user_name.'</td>
            </tr>
            <tr>
                <td class="th">Order date:</td>
                <td>'.$order_date.'</td>
            </tr>
            <tr>
                <td class="th">City:</td>
                <td>'.$city.'</td>
            </tr>
            <tr>
                <td class="th">Address:</td>
                <td>'.$address.'</td>
            </tr>
            <tr>
                <td class="th">Status:</td>
                <td>'.$status.'</td>
            </tr>
            <tr>
                <td class="th">Total price:</td>
                <td>'.$total_price.'</td>
            </tr>
            <tr>
                <td class="th">Payment:</td>
                <td>Visa</td>
            </tr>
        </table>
        </div>';
    }
    else {
        echo '<h1> No placed order for you... </h1><br>
        <a href="index.php">
        <button>
            <span>Continue Shopping</span>
        </button>
        </a>
        ';
    }
        ?>
    </div>
    </center>
    <br>
</div>   
</body>
</html>














