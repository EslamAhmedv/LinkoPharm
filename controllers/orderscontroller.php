<?php
require_once '../models/ordersmodel.php';

class OrdersController {
    private $ordersModel;

    public function __construct() {
        $this->ordersModel = new OrdersModel();
    }

    public function getAllOrders() {
        return $this->ordersModel->getAllOrders();
    }

    public function addOrder($customerName, $city, $orderDate, $status, $totalAmount) {
        return $this->ordersModel->addOrder($customerName, $city, $orderDate, $status, $totalAmount);
    }

    public function updateOrder($orderId, $status) {
        return $this->ordersModel->updateOrder($orderId, $status);
    }

    public function deleteOrder($orderId) {
        return $this->ordersModel->deleteOrder($orderId);
    }
}

$ordersController = new OrdersController();

if (isset($_POST['deleteOrder'])) {
    $orderId = $_POST['orderId'];
    $ordersController->deleteOrder($orderId);
}
?>
