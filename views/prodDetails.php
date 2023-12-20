<?php
require_once '../controllers/productscontroller.php';
require_once '../controllers/CartController.php';
$productController = new ProductController();
$cartController = new CartController();

if (!isset($_GET['id'])) {
    header('Location: products.php');
    exit();
}

// Fetch the product details
$productId = intval($_GET['id']);
$product = $productController->getProductById($productId);

if (!$product) {
    echo "<script>alert('Product not found.'); window.location.href = 'products.php';</script>";
    exit();
}




if (isset($_SESSION['auth_user'])) {
    if (isset($_POST['SubmitButton'])) {
        $user_id = $_SESSION['auth_user']['user_id'];
        $product_image = $_POST['image'];
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $product_quantity = $_POST['quantity'];
        $loginResult = $cartController->addToCart($user_id, $product_image,  $product_name, $product_price, $product_quantity);

        if ($loginResult ===  "Product added to cart!") {
            $successMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Product added to cart successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            $successMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Product already added to cart.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/prodDetails.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <title>Product Details - <?php echo htmlspecialchars($product['name']); ?></title>
</head>
<body>
    <div class="hero">
        <?php include('../partials/navbar.php'); ?>
        <?php
        if (isset($successMessage)) {
            echo $successMessage;
        }
        ?>
        <div class="mainContainer">
            <div class="container">
                <div class="left">
                    <a class="back" href="products.php">Back</a>
                    <div class="productInfo">
                        <h1 class="product-name"><?php echo htmlspecialchars($product['name']); ?> &reg;</h1>
                        <p class="product-price">Price: <?php echo htmlspecialchars($product['price']); ?> EGP</p>
                        <div class="availability">
                            <div class="product-availability"></div>
                            <p class="stock">In Stock</p>
                        </div>
                        <!-- <p class="product-code">Product code: <?php echo htmlspecialchars($product['code']); ?></p> -->
                        <p class="product-description">Category: <?php echo htmlspecialchars($product['description']); ?></p>
                        <button type="button" class="button">
                        <form action="" method="POST">
                     
                        <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                        <input type="hidden" name="quantity" value="1">
                  
                        <button type="submit" name="SubmitButton" >   <span class="button__icon">
                                <i class="ri-shopping-cart-2-line"></i>
                             <span class="button__text"> ADD TO CART</span> </span></button>
                            </form>
                         
                        </button>
                    </div>
                </div>
                <div class="right">
                    <img id="myImg" class="product-image" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                </div>
            </div>
      

        <div class="product-info">
            <h1 class="prodinfo">Product information:</h1>
            <br>
            <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() { 
            modal.style.display = "none";
        }
    </script>
    
    <?php include('../partials/footer.php'); ?>
</body>
</html> 