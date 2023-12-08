<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../public/css/cart.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<?php
require_once '../controllers/CartController.php';
require_once '../controllers/productscontroller.php';
require_once("../controllers/UserController.php");
if (isset($_SESSION['auth_user'])) {
    $user_id = $_SESSION['auth_user']['user_id'];}
    else {
        // Set a default value for $user_id or handle the case where "auth_user" is not set
        $user_id = 0; // Set to a default value or use a value that makes sense in your context
    }
$cartController = new CartController();
$cartProducts = $cartController->getCartProducts($user_id);

if (isset($_POST['update_cart'])) {
    $cartController->updateCartItemQuantity();
    
    // Optionally you can redirect the user or perform additional actions after updating the cart
}

?>

<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>Shopping Cart</b></h4></div>
                    <div class="col align-self-center text-right text-muted"><?php echo count($cartProducts); ?> items</div>
                </div>
            </div>
            <?php foreach ($cartProducts as $row) : ?>
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="<?php echo htmlspecialchars($row['image']); ?>"></div>
                        <div class="col">
                            <div class="row text-muted">Product</div>
                            <div class="row"><?php echo htmlspecialchars($row['name']); ?></div>
                        </div>
                        <div class="col">
                            <form action="" method="POST" class="single-product">
                              
                                <input type="text" name="quantity" class="border" value="<?php echo htmlspecialchars($row['quantity']); ?>">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

                                <input type="submit" name="update_cart" class="border" value="Update">
                            </form>
                        </div>
                        <div class="col"><?php echo htmlspecialchars($row['price']); ?> <span class="close">&#10005;</span></div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="back-to-shop"><a href="products.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div><h5><b>Summary</b></h5></div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS <?php echo count($cartProducts); ?></div>
                <div class="col text-right">&euro; <?php echo calculateTotalPrice($cartProducts); ?></div>
            </div>
            <form>
                <p>SHIPPING</p>
                <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; <?php echo calculateTotalPrice($cartProducts); ?></div>
            </div>
            <button class="btn">CHECKOUT</button>
        </div>
    </div>
</div>
</html>

<?php

function calculateTotalPrice($cartProducts) {
    $totalPrice = 5;
    foreach ($cartProducts as $row) {
        $totalPrice += ($row['price'] * $row['quantity']);
    }
    return $totalPrice;
}

?>
