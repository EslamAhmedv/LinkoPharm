<?php
require_once("../models/Model.php");

class CartModel extends Model {

    public function addToCart($userId, $productName, $productPrice, $productImage, $productQuantity) {
        $selectCart = $this->conn->prepare("SELECT * FROM cart WHERE `name` = ? AND user_id = ?");
        $selectCart->bind_param("si", $productName, $userId);
        $selectCart->execute();
        $result = $selectCart->get_result();
    
        if ($result->num_rows > 0) {
            return 'Product already added to cart!';
        } else {
            $insertCart = $this->conn->prepare("INSERT INTO cart (user_id, image, name, price, quantity) VALUES (?, ?, ?, ?, ?)");
            $insertCart->bind_param("issii", $userId,$productImage, $productName, $productPrice, $productQuantity);
            $insertCart->execute();
            return "Product added to cart!";
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

    public function getCartProducts($userId) {
        $query = "SELECT * FROM cart WHERE user_id = ?"; 
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
    
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




    public function updateCartItemQuantity($updateQuantity, $cartItemId) {
        $query = "UPDATE cart SET quantity = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("ii", $updateQuantity, $cartItemId);
            $stmt->execute();
            // You may want to check for success, handle errors, and return appropriate values
            return true;
        } else {
            // Handle the case where the prepared statement couldn't be created
            return false;
        }
    }




    public function removeItem($itemId) {
        $deleteCart = $this->conn->prepare("DELETE FROM cart WHERE id = ?");
        $deleteCart->bind_param("i", $itemId);
        
        if ($deleteCart->execute()) {
            return true;
        } else {
            return false;
        }
    }




    public function removeAllItems($userId) {
        $deleteAll = $this->conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $deleteAll->bind_param("i", $userId);
        
        if ($deleteAll->execute()) {
            return true;
        } else {
            return false;
        }
    }










    
//wishlist

    public function addToWishlist($userId, $productName, $productPrice, $productImage) {
        $selectCart = $this->conn->prepare("SELECT * FROM wishlist WHERE `name` = ? AND user_id = ?");
        $selectCart->bind_param("si", $productName, $userId);
        $selectCart->execute();
        $result = $selectCart->get_result();
    
        if ($result->num_rows > 0) {
            return 'Product already added to wishlist!';
        } else {
            $insertCart = $this->conn->prepare("INSERT INTO wishlist (user_id, image, name, price) VALUES (?, ?, ?, ?)");
            $insertCart->bind_param("issi", $userId,$productImage, $productName, $productPrice);
            $insertCart->execute();
            return 'Product added to wishlist!';
        }
    

}









public function getWishProducts($userId) {
    $query = "SELECT * FROM wishlist WHERE user_id = ?"; 
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $cartItems = array();
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }

    return $cartItems;
}






public function removewish($itemId) {
    $deleteCart = $this->conn->prepare("DELETE FROM wishlist WHERE id = ?");
    $deleteCart->bind_param("i", $itemId);
    
    if ($deleteCart->execute()) {
        return true;
    } else {
        return false;
    }
}




public function removeAllwish($userId) {
    $deleteAll = $this->conn->prepare("DELETE FROM wishlist WHERE user_id = ?");
    $deleteAll->bind_param("i", $userId);
    
    if ($deleteAll->execute()) {
        return true;
    } else {
        return false;
    }
}









}











?>