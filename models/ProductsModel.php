<?php
require_once "../models/Model.php";

class ProductsModel extends Model {

    public function addProduct($fileurl, $name, $availability,  $price, $description, $category) {
        $query = "INSERT INTO products (image, name, availability, price, description, category) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssidsi", $fileurl, $name, $availability, $price, $description, $category);
        return $stmt->execute();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);

        $products = array();
        while ($product = $result->fetch_assoc()) {
            $products[] = $product;
        }
        return $products;
    }

    public function deleteProduct($productId) {
        $deleteQuery = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($deleteQuery);
        $stmt->bind_param("i", $productId);
        return $stmt->execute();
    }

}

?>
