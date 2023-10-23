<?php
require '../includes/db.php';

if (isset($_POST['editproduct'])) {
    updateProduct();
}

function updateProduct() {
    global $conn;

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $availability = $_POST['availability'];

    // Sanitize user input and handle potential SQL injection
    $id = mysqli_real_escape_string($conn, $id);
    $name = mysqli_real_escape_string($conn, $name);
    $price = mysqli_real_escape_string($conn, $price);
    $description = mysqli_real_escape_string($conn, $description);
    $category = mysqli_real_escape_string($conn, $category);
    $availability = mysqli_real_escape_string($conn, $availability);

    // Check if the product with the provided ID exists

    $product_query = "SELECT * FROM products WHERE id = $id";
    $product_result = mysqli_query($conn, $product_query);

    if ($product_result && mysqli_num_rows($product_result) > 0) {
        // Product exists, update it
        $image = $_FILES['image']['name'];
        $path = "../public/uploads";
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_ext;

        $product_query = "UPDATE products SET image = '$image', name = '$name', availability = '$availability', price = '$price', description = '$description', category = '$category' WHERE id = $id";
        $product_query_run = mysqli_query($conn, $product_query);

        if ($product_query_run) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "$path/$filename");
            header("Location: editproduct.php?id=$id&message=Product updated successfully");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Product not found";
    }
}

// Retrieve the product ID from the URL
if (isset($_GET['id'])) {
    $productID = $_GET['id'];
} else {
    echo "no product with this id";
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
                            <div><input type="text" id="name" placeholder="Product name" name="name" required></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="" class="add-photo-btn">Upload Image</label>
                            <input type="file" name="image" multiple required>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="price">Product Price</label>
                            <div><input type="text" id="price" placeholder="Product Price" name="price" required></div>
                            <span class="errormsg"></span>
                        </div>
                        <div class="input">
                            <label for="availability">Availability</label>
                            <div><input type="text" id="availability" placeholder="Product Availability" name="availability" required></div>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="description">Product Description</label>
                            <textarea id="desc" name="description" rows="4" cols="50" required></textarea>
                            <span class="errormsg"></span>
                        </div>

                        <div class="input">
                            <label for="category">Category</label>
                            <div><input type="text" id="category" placeholder="Product Category" name="category" required></div>
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
