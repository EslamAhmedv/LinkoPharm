<?php
include "../includes/db.php";

class ProductsModel {

    
    public static function addproduct($fileurl, $name, $availability, $price, $description, $category)
    {
        include "../includes/db.php";
        $query =  "INSERT INTO products (image, name, availability, price, description, category) VALUES ('$fileurl', '$name', '$availability', '$price', '$description', '$category')";
        return mysqli_query($conn, $query);
    }


    public static function getAllProducts($conn) {
        
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        $products = array();

        while ($product = mysqli_fetch_assoc($result)) {
            $products[] = $product;
        }

        return $products;
    }

    public static function deleteProduct($conn, $productId) {
        $deleteQuery = "DELETE FROM products WHERE id = $productId";
        $conn->query($deleteQuery);
    }
}

?>
