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

    public function addOrder($userid, $username, $phone, $address, $city, $order_date, $status, $total_price) {
        return $this->ordersModel->addOrder($userid, $username, $phone, $address, $city, $order_date, $status, $total_price);
    }

    public function updateOrder($orderId, $customerName, $city, $orderDate, $status, $amount) {
        return $this->ordersModel->updateOrder($orderId, $customerName, $city, $orderDate, $status, $amount);
    }
    

    public function deleteOrder($orderId) {
        return $this->ordersModel->deleteOrder($orderId);
    }
    public function getOrderById($orderId) {
        return $this->ordersModel->getOrderById($orderId);
    }
}

$ordersController = new OrdersController();

if (isset($_POST['deleteOrder'])) {
    $orderId = $_POST['orderId'];
    $ordersController->deleteOrder($orderId);
}
?>











