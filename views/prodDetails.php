<?php
require_once '../controllers/productscontroller.php';
$productController = new ProductController();

// Check if the product ID is set in the URL
if (!isset($_GET['id'])) {
    // Redirect to the products page if no product ID is provided
    header('Location: products.php');
    exit();
}

// Fetch the product details
$productId = intval($_GET['id']);
$product = $productController->getProductById($productId);

if (!$product) {
    // Handle the case where the product doesn't exist
    echo "<script>alert('Product not found.'); window.location.href = 'products.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/prodDetails.css">
    <title>Product Details - <?php echo htmlspecialchars($product['name']); ?></title>
</head>
<body>
    <div class="hero">
        <?php include('../partials/navbar.php'); ?>

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
                            <span class="button__text">ADD TO CART</span>
                            <span class="button__icon">
                                <i class="ri-shopping-cart-2-line"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="right">
                    <img id="myImg" class="product-image" src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                </div>
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
