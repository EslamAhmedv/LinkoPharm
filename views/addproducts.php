<?php
require '../includes/db.php';
include "../controller/adminfunctions.php";

$productAdded = false; // Flag to track if the product was added

if (isset($_POST['submit'])) {
    $productAdded = addproduct();
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
    <title>Add Product</title>
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

            <h1>Products</h1>

            <div class="addprod">
                <form action="addproducts.php" class="form" method="POST" enctype="multipart/form-data">
                    <h2 class="title">Add a Product</h2>
                    <div class="product-container" style="display: block;">
                        <!-- <div class="input">
                            <label for="id">Product ID</label>
                            <div> <input type="text" id="id" placeholder="Product id" name="id" required>
                            </div>
                            <span class="errormsg"></span>

                        </div> -->

                        <div class="input">
                            <label for="name">Product Name</label>
                            <div><input type="text" id="name" placeholder="Product name" name="name" required></div>
                            <span class="errormsg"></span>

                        </div>

                        <div class="input">
                            <label for="" class="add-photo-btn">Upload Image
                            </label>
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

                        <button type="submit" name="submit" id="add">Add</button><span>
                            <button id="cancel" href="addproducts">Cancel</button></span>



                    </div>



                </form>
            </div>

        </main>
        <div id="successPopup" style="display: none; position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); background-color: green; color: white; padding: 20px; border-radius: 5px; font-size: 1.2em; z-index: 1000;">
            Product added successfully!
        </div>
        
        <script src="../public/js/popup.js"></script>


        <?php if ($productAdded) : ?>
    <script>
        showSuccessPopup(); 
    </script>
<?php endif; ?>


</body>

</html>