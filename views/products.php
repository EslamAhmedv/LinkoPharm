
<?php
require_once '../controllers/CartController.php';

$cartController = new CartController();
$message = '';

if (isset($_POST['SubmitButton'])) {
    $image = $_POST['image'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
   

    $message = $cartController->cartt($image, $name, $price, $quantity);
    
    if ($message === "Success") {
        header("Location: cart.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>mo</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>  <link rel="stylesheet" href="../public/css/products.css">

</head>

<body>
<?php

include('../partials/navbar.php'); ?>

<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header2">
										<h3>Featured Product</h3>
										<h2>Popular Products</h2>
								</div>
						</div>
				</div>
				<form action="" method="POST">
				<div class="row">
			
						<!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-1" class="single-product">
										<div class="part-1" > <input type="text" name="image" value="logo.png">
												<ul>
													<button  type="submit" name="SubmitButton"><li><a href="products.php"><i class="fas fa-shopping-cart"></i></a></li></button>
														<li><a href="#"><i class="fas fa-heart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
										<input type="text" id="name" placeholder="Here Product Title" value="hairrrrrrrrr" name="name" class="product-title">
										<input type="text" class="product-price" id="price"value="1" name="quantity">
												<input type="text" class="product-price" id="price" value="49.99$" name="price">
										</div>
								</div>
						</div>
                      
                        </form>
						<!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-4" class="single-product">
										<div class="part-1">
												<span class="new">new</span>
												<ul>
														<li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
														<li><a href="#"><i class="fas fa-heart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Here Product Title</h3>
												<h4 class="product-price">$49.99</h4>
										</div>
								</div>
						</div>
				</div>
		</div>
</section>
<!-- partial -->
<?php
  include('../partials/footer.php');
  // include('../partials/chat.php'); 
  ?>
  
</body>
</html>
