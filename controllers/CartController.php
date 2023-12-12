<?php
require_once('../models/CartModel.php');

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartModel();
    }

    public function addToCart($userId, $productImage, $productName, $productPrice, $productQuantity) {
        $resultMessage = $this->cartModel->addToCart($userId, $productName, $productPrice, $productImage, $productQuantity);
        return $resultMessage;
    }
    public function updateCartItemQuantity($cartItemId, $newQuantity) {
        return $this->cartModel->updateCartItemQuantity($newQuantity, $cartItemId);
    }
    

    public function upvdateCartItemQuantity() {
        if (isset($_POST['update_cart'])) {
            $updateQuantity = $_POST['quantity'];
            $cartItemId = $_POST['id']; // Assuming you have a hidden input with name="cart_item_id"

            $result = $this->cartModel->updateCartItemQuantity($updateQuantity, $cartItemId);

            if ($result) {
                echo 'Cart quantity updated successfully!';
                header("Location: cart.php");
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






        public function removeItem($itemId) {
            $result = $this->cartModel->removeItem($itemId);
    
            if ($result) {
                echo "Item removed from the cart!";
                header("Location: cart.php");
            } else {
                echo "Failed to remove item from the cart.";
            }
        }


  


        public function removeAllItems($userId) {
            $result = $this->cartModel->removeAllItems($userId);
    
            if ($result) {
                echo "All items removed from the cart!";
                header("Location: cart.php");
            } else {
                echo "Failed to remove all items from the cart.";
            }
        }
//wishlist functions
public function addToWishlist($userId, $productImage, $productName, $productPrice) {
    $resultMessage = $this->cartModel->addToWishlist($userId, $productName, $productPrice, $productImage);
    return $resultMessage;

}












public function getWishProducts($userId) {
    return $this->cartModel->getWishProducts($userId);
}















public function removewish($itemId) {
    $result = $this->cartModel->removewish($itemId);

    if ($result) {
        echo "Item removed from the cart!";
        header("Location: wishlist.php");
    } else {
        echo "Failed to remove item from the cart.";
    }
}





public function removeAllwish($userId) {
    $result = $this->cartModel->removeAllwish($userId);

    if ($result) {
        echo "All items removed from the cart!";
        header("Location: wishlist.php");
    } else {
        echo "Failed to remove all items from the cart.";
    }
}










}











?>