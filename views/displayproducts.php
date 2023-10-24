<?php
require '../includes/db.php';

if (isset($_POST['deleteProduct'])) {
    if (isset($_POST['productId'])) {
        $productId = $_POST['productId'];

        // y3ml delete l product from the database
        $deleteQuery = "DELETE FROM products WHERE id = $productId";
        if ($conn->query($deleteQuery) === TRUE) {
            header("Location: displayproducts.php?message=Product deleted successfully");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Fetch products data from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" />
    <link rel="stylesheet" href="../public/css/displayproducts.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Products</title>
</head>

<body>

    <div class="container">
        <aside>
            <?php
            $currentPage = 'displayproducts';
            include('../partials/dashboardsidebar.php');
            ?>
        </aside>

        <main class="table">
            <section class="theader">
                <h1>Products List</h1>
                <div class="search">
                    <input type="search" placeholder="Search existing products...">
                </div>
                <div class="add_product">
                    <a href="addproducts.php">
                        <button class="btn add-product"><i class="fa fa-plus"></i> Add Product</button>
                    </a>
                </div>
            </section>
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Edit/Delete</th>
                            <th>Availability</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($product = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?php echo $product['id']; ?>
                                </td>
                                <td><img src="<?php echo $product['image']; ?>" alt="" id="prod_img"></td>
                                <td>
                                    <?php echo $product['name']; ?>
                                </td>

                                <td>
                                    <a href="editproduct.php?id=<?php echo $product['id']; ?>">
                                        <button class="btn edit-product"><i class="fa fa-edit"></i></button>
                                    </a>

                                    <form method="POST" >
                                        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                                        <button class="btn delete-product" type="submit" name="deleteProduct"><i class="fa fa-trash"></i></button>
                                        <div id="errmsgdel"></div>
                                    </form>

                                    <!-- <div id="confirmationDialog" class="confirmation-dialog">
                                        <div class="dialog-content">
                                            <p>Are you sure you want to delete this product?</p>
                                            <div class="dialog-buttons">
                                                <button class="btn confirm-button" onclick="deleteProduct(this);">Yes</button>
                                                <button class="btn cancel-button" onclick="hideConfirmationDialog(this);">No</button>
                                            </div>
                                        </div>
                                    </div> -->
    </div>
    </td>
    <td>
        <?php if ($product['availability']) { ?>
            <p class="status_instock">In Stock</p>
            <p class="avail_amount">*Available: <?php echo $product['availability']; ?> Pieces</p>
        <?php } else { ?>
            <p class="status_outofstock">Out Of Stock</p>
            <p class="avail_amount">*Available: 0 Pieces</p>
        <?php } ?>
    </td>
    <td><strong>
            <?php echo $product['price']; ?> EGP
        </strong></td>
    </tr>
<?php } ?>
</tbody>

</table>
</section>
</main>
</div>


</body>


</html>