<?php 

include '../models/ProductsModel.php';

function addProduct(){
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

        $productsModel = new ProductsModel();
        return $productsModel->addProduct($fileurl, $name, $availability, $price, $description, $category);

    } else {
        return false;
    }
}

function deleteProduct(){
    $productId = $_POST['productId'];

    $productsModel = new ProductsModel();
    if ($productsModel->deleteProduct($productId)) {
        header("Location: displayproducts.php?message=Product deleted successfully");
        exit;
    } else {
        echo "Error: Unable to delete product";
    }
}

function getAllProducts() {
    $productsModel = new ProductsModel();
    return $productsModel->getAllProducts();
}

?>
