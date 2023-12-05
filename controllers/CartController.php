<?php
require_once('../models/CartModel.php');

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartModel();
    }

    public function addToCart($item) {
        $result = $this->cartModel->addToCart($item);

        if ($result) {
            echo "Item added to the cart!";
        } else {
            echo "Failed to add item to the cart.";
        }
    }

    public function updateCart($item) {
        $result = $this->cartModel->updateCart($item);

        if ($result) {
            echo "Cart updated!";
        } else {
            echo "Failed to update cart.";
        }
    }

    public function removeItem($itemId) {
        $this->cartModel->removeItem($itemId);
        echo "Item removed from the cart!";
    }

    public function viewCart() {
        $cartItems = $this->cartModel->getCartItems();
        $cartTotal = $this->cartModel->getCartTotal();

        // You can pass $cartItems and $cartTotal to your view
        include 'cart_view.php';
    }

    public function getCartTotal() {
        $result = $this->cartModel->getCartTotal();}

        public function getCartItems() {

            $result = $this->cartModel->getCartItems();}









  
}
?>