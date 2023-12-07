<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>contact form</title>
    <link rel="stylesheet" href="../public/css/cart.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>


<?php
require_once '../controllers/CartController.php';

$cartController = new CartController();
$cartProducts = $cartController->getCartProducts();
$cartController->updateCartItemQuantity();
?>


<div class="card">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted">3 items</div>
                        </div>
                    </div>    
                    <?php foreach ($cartProducts as $row) :
    ?>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                            <div class="col">
                                <div class="row text-muted"><?php echo htmlspecialchars($row['image']); ?></div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                            <form action="" method="POST" class="single-product">
                            <input type="submit"  name="update_cart"  class="border" value="update"> <input type="text" name="quantity"  class="border" value="<?php echo htmlspecialchars($row['quantity']); ?>">
                            </div>
                            <div class="col"><?php echo htmlspecialchars($row['name']); ?> <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="back-to-shop"><a href="products.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS 3</div>
                        <div class="col text-right">&euro; 132.00</div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                        <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                        <p>GIVE CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">&euro; 137.00</div>
                    </div>
                    <button class="btn">CHECKOUT</button>
                </div>
            </div>
            
        </div>

       
              
                       
                        <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                       
                    </form>