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

    public function updateProduct($id, $fileurl, $name, $availability, $price, $description, $category) {
        $query = "UPDATE products SET image = ?, name = ?, availability = ?, price = ?, description = ?, category = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssidsii", $fileurl, $name, $availability, $price, $description, $category, $id);
        return $stmt->execute();
    }

    public function getProductById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); 
    }

    public function searchProducts($searchTerm) {
        $searchTerm = "%{$searchTerm}%";
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?");
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        while ($product = $result->fetch_assoc()) {
            $products[] = $product;
        }
        return $products;
    }

}

?>
