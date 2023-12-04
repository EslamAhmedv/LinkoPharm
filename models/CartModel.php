<?php
require_once("../models/Model.php");

class CartModel extends Model {

    public function addtocart($image, $name, $price, $quantity) {
        $query = "INSERT INTO cart (image, name, price, quantity) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssii", $image, $name, $price, $quantity);
        return $stmt->execute();
    }

}
?>