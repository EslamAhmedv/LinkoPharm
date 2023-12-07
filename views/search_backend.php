<?php
require_once "../models/ProductsModel.php"; 

$productsModel = new ProductsModel();

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    $products = $productsModel->searchProducts($searchTerm);

    if (!empty($products)) {
        foreach ($products as $product) {
            echo "Product Name: " . $product['name'] . "<br>";
            echo "Description: " . $product['description'] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "No products found matching your search.";
    }
} else {
    echo "Please enter a search term.";
}
?>
