<?php
require_once('../models/CartModel.php');

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartModel();
    }

    public function addToCart($item = []) {
        $this->cartModel->addToCart($item);
    }

    public function updateCart($item = []) {
        $this->cartModel->updateCart($item);
    }

    public function removeFromCart($id) {
        $this->cartModel->remove($id);
    }

    public function viewCart() {
        $cartItems = $this->cartModel->getAllItems();
        // Implement logic to display the cart items in the view
    }

    public function getCartTotal() {
        return $this->cartModel->getCartTotal();
    }


    public function destroyCart() {
        $this->cartModel->destroy();
    }
}
?>