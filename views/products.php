<?php
require_once '../controllers/CartController.php';
require_once '../models/medicalModel.php';
require_once '../controllers/productscontroller.php';

$cartController = new CartController();
$medicalModel = new MedicalModel();

// Handle filter logic
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['filterButton'])) {
    $filterCategory = urldecode($_GET['filterCategory']) ?? '';

    $products = $medicalModel->filterItems($filterCategory);
} else {

    $products = $medicalModel->getAllProducts();
}

$message = '';

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






if (isset($_GET['filterCategory']) && !empty($_GET['filterCategory'])) {
    $filterCategory = $_GET['filterCategory'];
    $products = $medicalModel->filterItems($filterCategory);
} else {
    $products = $medicalModel->getAllProducts();
}






//wishlist

if (isset($_SESSION['auth_user'])) {
    if (isset($_POST['Submitwish'])) {
        $user_id = $_SESSION['auth_user']['user_id'];
        $product_image = $_POST['image'];
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $cartController->addToWishlist($user_id, $product_image,  $product_name, $product_price);
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products List</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <link rel="stylesheet" href="../public/css/products.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

</head>
<body>
<?php include('../partials/navbar.php'); ?>
<section class="section-products">
    <div class="container">
        <!-- Filter Form -->
        <form method="GET" class="filter-form">
            <label for="filterCategory">Filter by Category:</label>
            <select name="filterCategory" id="filterCategory">
                <option value="">All</option>
                <option value="skin care" <?php if (isset($_GET['filterCategory']) && $_GET['filterCategory'] == 'skin care') echo 'selected'; ?>>Skin Care</option>
                <option value="hair care">Hair Care</option>
                <option value="TOPICAL MUSCLE RELAXANTS ">Topical Muscle Relaxants</option>
            </select>
            <button type="submit" name="filterButton">Apply Filter</button>
        </form>

        <?php
        if (isset($successMessage)) {
            echo $successMessage;
        }
        ?>

        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <form action="" method="POST" class="single-product">
                        <div class="part-1">
                            <a href="prodDetails.php?id=<?php echo $product['id']; ?>" class="product-link">
                                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image">
                                </a>

                                <ul>
                                    <li><button type="submit" name="SubmitButton"><i class="fas fa-shopping-cart"></i></button></li>
                                    <li><button type="submit" name="Submitwish"><i class="fas fa-heart"></i></button></li>
                                </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <h4 class="product-price"><?php echo htmlspecialchars($product['price']); ?></h4>
                        </div>
                        <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                        <input type="hidden" name="quantity" value="1">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include('../partials/footer.php'); ?>

</body>

</html>