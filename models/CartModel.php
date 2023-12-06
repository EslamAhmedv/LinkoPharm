<?php
require_once("../models/Model.php");

class CartModel extends Model {

    public function addToCart($userId, $productName, $productPrice, $productImage, $productQuantity) {
        $selectCart = $this->conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
        $selectCart->bind_param("si", $productName, $userId);
        $selectCart->execute();
        $result = $selectCart->get_result();

        if ($result->num_rows > 0) {
            return 'product already added to cart!';
        } else {
            $insertCart = $this->conn->prepare("INSERT INTO `cart` (user_id, image, name, price,  quantity) VALUES (?, ?, ?, ?, ?)");
            $insertCart->bind_param("issii", $userId, $productName, $productPrice, $productImage, $productQuantity);
            $insertCart->execute();
            return 'product added to cart!';
        }
    }

    // public function updateCart($item) {
    //     $query = "UPDATE cart SET quantity = ? WHERE id = ?";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bind_param("ii", $item['qty'], $item['id']);
    //     return $stmt->execute();
    // }

    // public function removeItem($itemId) {
    //     $query = "DELETE FROM cart WHERE id = ?";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bind_param("i", $itemId);
    //     return $stmt->execute();
    // }

    public function getCartProducts() {
        $query = "SELECT * FROM cart " ;
        $result = $this->conn->query($query);
        $cartItems = array();

        while ($row = $result->fetch_assoc()) {
            $cartItems[] = $row;
        }

        return $cartItems;
    }

    // public function getCartTotal() {
    //     $query = "SELECT SUM(total) as total FROM cart";
    //     $result = $this->conn->query($query);
    //     $row = $result->fetch_assoc();

    //     return isset($row['total']) ? $row['total'] : 0;
    // }






    public function updateCartItemQuantity($updateQuantity) {
        $query = "UPDATE `cart` SET quantity = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("ii", $updateQuantity, $updateId);
            $stmt->execute();
            // You may want to check for success, handle errors, and return appropriate values
            return true;
        } else {
            // Handle the case where the prepared statement couldn't be created
            return false;
        }
    }










}
?>