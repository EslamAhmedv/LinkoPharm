<?php
require_once('../models/CartModel.php');

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartModel();
    }

    public function addToCart($userId, $productName, $productPrice, $productImage, $productQuantity) {
        $resultMessage = $this->cartModel->addToCart($userId, $productName, $productPrice, $productImage, $productQuantity);
        echo $resultMessage;
    }

    public function updateCartItemQuantity() {
        if (isset($_POST['update_cart'])) {
            $updateQuantity = $_POST['quantity'];
            $cartItemId = $_POST['id']; // Assuming you have a hidden input with name="cart_item_id"

            $result = $this->cartModel->updateCartItemQuantity($updateQuantity, $cartItemId);

            if ($result) {
                echo 'Cart quantity updated successfully!';
                header("Location: index.php");
            } else {
                echo 'Failed to update cart quantity.';
            }
        }
    }


    // public function removeItem($itemId) {
    //     $this->cartModel->removeItem($itemId);
    //     echo "Item removed from the cart!";
    // }

    // public function viewCart() {
    //     $cartItems = $this->cartModel->getCartItems();
    //     $cartTotal = $this->cartModel->getCartTotal();

    //     // You can pass $cartItems and $cartTotal to your view
    //     include 'cart_view.php';
    // }

   
    public function getCartProducts($userId) {
        return $this->cartModel->getCartProducts($userId);
    }
    

        // public function getCartItems() {

        //     $result = $this->cartModel->getCartItems();}









  
}
?>