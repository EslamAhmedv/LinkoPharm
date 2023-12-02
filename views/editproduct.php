<?php
require_once '../controllers/productscontroller.php';
$productController = new ProductController();

//to hold product details
$productID = $productName = $productPrice = $productDescription = $productCategory = $productAvailability = '';

if (isset($_GET['id'])) {
    $productID = $_GET['id'];
    $product = $productController->getProductById($productID);

    if ($product) {
        $productName = $product['name'];
        $productPrice = $product['price'];
        $productDescription = $product['description'];
        $productCategory = $product['category'];
        $productAvailability = $product['availability'];
    } else {
        echo "No product found with this ID";
    }
}


if (isset($_POST['editproduct'])) {
    $updateSuccess = $productController->updateProduct();

    if ($updateSuccess) {
        header("Location: displayproducts.php?message=Product updated successfully");
        exit;
    } else {
        echo "No product found with this ID";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" />
    <link rel="stylesheet" href="../public/css/displayproducts.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="../public/css/editdash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit Product</title>
</head>

<body>
    <div class="container">
        <aside>
            <?php
            $currentPage = 'displayproducts';
            include('../partials/dashboardsidebar.php');
            ?>
        </aside>

        <main>
            <h1>Edit Product</h1>
            <div class="addprod">
                <form class="form" method="POST" enctype="multipart/form-data">
                    <h2 class="title">Update a Product</h2>
                    <div class="product-container" style="display: block;">
                        <input type="hidden" name="id" value="<?php echo $productID; ?>">
                        <div class="input">
                            <label for="name">Product Name</label>
                            <div><input type="text" id="name" placeholder="Product name" name="name" required value="<?php echo $productName; ?>"></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="" class="add-photo-btn">Upload Image</label>
                            <input type="file" name="image" multiple required>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="price">Product Price</label>
                            <div><input type="text" id="price" placeholder="Product Price" name="price" required value="<?php echo $productPrice; ?>"></div>
                            <span class="errormsg"></span>
                        </div>
                        <div class="input">
                            <label for="availability">Availability</label>
                            <div><input type="text" id="availability" placeholder="Product Availability" name="availability" required value="<?php echo $productAvailability; ?>"></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="description">Product Description</label>
                            <textarea id="desc" name="description" rows="4" cols="50" required><?php echo $productDescription; ?></textarea>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="category">Category</label>
                            <div><input type="text" id="category" placeholder="Product Category" name="category" required value="<?php echo $productCategory; ?>"></div>
                            <span class="errormsg"></span>
                        </div>

                        <input type="submit" name="editproduct" id="add" value="Update"></input>
                        <span>
                            <a href="displayproducts.php">Cancel</a>
                        </span>
                    </div>
                </form>
            </div>
        </main>

    </div>
</body>

</html>