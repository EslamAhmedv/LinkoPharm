<?php
require_once '../models/orderitemsModel.php';

class OrdersItemsController {
    private $ordersItemsModel;

    public function __construct() {
        $this->ordersItemsModel = new OrdersItemsModel();
    }

    public function addOrder($orderid, $name, $price, $quantity) {
        return $this->ordersItemsModel->addOrder($orderid, $name, $price, $quantity);
    }

    public function getOrder($orderid) {
        return $this->ordersItemsModel->getOrder($orderid);
    }
}
?>










