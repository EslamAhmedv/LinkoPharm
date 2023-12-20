<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controllers/orderitemscntroller.php'; 
require_once '../controllers/OrdersController.php'; 

// Set user ID in session and assign it to a variable
$userid = $_SESSION['auth_user']['user_id'] ?? null; 


$OrdersModel = new OrdersController();

$maxId = null;      
$row=$OrdersModel->getOrder($userid);
foreach ($row as $key) {
    $orderId1 = $key['id'];

    if ($maxId === null || $orderId1 > $maxId) {
        $maxId = $orderId1;
    }
}
$orderid=$maxId;


if ($row=$OrdersModel->getOrderID($orderid)) {
  $date=$row["order_date"];
  $username=$row["user_name"];
  $address=$row["address"];
}
$orderitems=new OrdersItemsController();
$Products = $orderitems->getOrder($orderid);

function TotalCalculator($Products)
{
  $totalPrice = 0;
  foreach ($Products as $row) {
    $totalPrice += $row['price'] * $row['quantity'];
  }
  return $totalPrice;
}

function TaxCalculator($totalPrice)
{
  $sales_tax = $totalPrice * 0.14;
  return $sales_tax;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receipt</title>
  <link rel="stylesheet" href="../public/css/receipt.css">
</head>
<body>

  <div class="invoice">
  <div align='left'><img src='../public/images/logo.png' width="20%"/></div>
  <br/>
  <?php
        if (!empty($Products)) {
            echo '
    <div class="header">
      <h1>Receipt</h1>
    </div>

    <div class="invoice-details">
      <div>
        <p>Order ID: <span id="invoice-number">' .$orderid. '</span></p>
        <p>Date: <span id="invoice-date">'.$date.'</span></p>
      </div>
    </div>
    
    <div class="client-details">
      <h2>Client Details</h2>
      <p>Name: <span id="client-name">'.$username.'</span></p>
      <p>Address: <span id="client-address">'.$address.'</span></p>
    </div>

    <table>
      <thead>
        <tr>
            <th>Name:</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Taxes</th>
            <th>Total price</th>
        </tr> 
      </thead>
      <tbody>
      ';
      foreach ($Products as $row) {
        echo '
        <tr>
        <td>' . $row['name'] . '</td>
        <td>'. $row['price'] .'</td>
        <td>'. $row['quantity'] .'</td>
        <td>'. TaxCalculator($row['price']*$row['quantity']) .'</td>
        <td>'.($row['price']*$row['quantity']) + TaxCalculator($row['price']*$row['quantity']) .'</td>
        </tr>
      ';
    }
    echo'
    </tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th>Total: <span id="invoice-number">'.TotalCalculator($Products)+TaxCalculator(TotalCalculator($Products)).'</th>
    </tr>
    </tbody>
    </table>    
    ';
}
?>
    <center>
    <a href="index.php">
    <button>
      <span>Continue Shopping</span>
    </button>
    </a>
    </center>
  </div>

</body>
</html>



















