<?php
require_once('../models/CartModel.php');

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new CartModel();
    }







    public function cartt($image, $name, $price, $quantity) {
    
        $result = $this->cartModel->addtocart($image, $name, $price, $quantity);
        if ($result) {
            return "Success";
        } else {
            return "faileeeeeed";
        }
    }



















  
}
?>