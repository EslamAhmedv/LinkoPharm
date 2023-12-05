<?php
require_once("../models/Model.php");

class CartModel extends Model {

    public function addToCart($item) {
        $query = "INSERT INTO cart (id, name, price, quantity, total) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("issii", $item['id'], $item['name'], $item['price'], $item['quantity'], $item['total']);
        return $stmt->execute();
    }

    public function updateCart($item) {
        $query = "UPDATE cart SET quantity = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $item['qty'], $item['id']);
        return $stmt->execute();
    }

    public function removeItem($itemId) {
        $query = "DELETE FROM cart WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $itemId);
        return $stmt->execute();
    }

    public function getCartItems() {
        $query = "SELECT * FROM cart";
        $result = $this->conn->query($query);
        $cartItems = [];

        while ($row = $result->fetch_assoc()) {
            $cartItems[] = $row;
        }

        return $cartItems;
    }

    public function getCartTotal() {
        $query = "SELECT SUM(total) as total FROM cart";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();

        return isset($row['total']) ? $row['total'] : 0;
    }
}
?>