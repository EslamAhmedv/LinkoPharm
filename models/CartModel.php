<?php
require_once("../models/Model.php");

class CartModel extends Model {

    protected $cart_items = array();

    public function __construct() {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }

        $this->cart_items = $_SESSION["cart"];
    }

    public function getIds() {
        return array_keys($this->cart_items);
    }

    public function addToCart($item = []) {
        // Implement the logic to add or update an item in the cart
    }

    public function updateCart($item = []) {
        // Implement the logic to update the quantity of an item in the cart
    }

    public function remove($id) {
        // Implement the logic to remove an item from the cart
    }

    public function getCartTotal() {
        $sum = 0;
        foreach ($this->cart_items as $item) {
            $sum += $item["total"];
        }
        return $sum;
    }


    public function getCartCount() {
        return count($this->cart_items);
    }

    public function commit() {
        $_SESSION["cart"] = $this->cart_items;
    }

    public function destroy() {
        $this->cart_items = array(); // or initialize it as needed
        $_SESSION["cart"] = $this->cart_items;
    }


    public function getItem($id) {
        return $this->cart_items[$id] ?? null;
    }

    public function getAllItems() {
        return $this->cart_items;
    }
}













?>