<?php 

include '../models/ProductsModel.php';

function addproduct(){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $availability = $_POST['availability'];
    $file = $_FILES["image"];
    $uploaddirectory = "../public/uploads/";

    if (move_uploaded_file($file["tmp_name"], $uploaddirectory . $file["name"])) {

        $uploadedfileName = $file["name"];
        $fileurl = $uploaddirectory . $uploadedfileName;
        return ProductsModel::addproduct($fileurl, $name, $availability, $price, $description, $category);

    } else {
        return false;

    }
    

}

function deleteProduct(){
    global $conn; // Ensure that the database connection is accessible

    $productId = $_POST['productId'];

    if (ProductsModel::deleteProduct($conn, $productId)) {
        header("Location: displayproducts.php?message=Product deleted successfully");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

function getAllProducts() {
    global $conn; 

    $products = ProductsModel::getAllProducts($conn);

    return $products;
}

?>