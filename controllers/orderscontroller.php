<?php 
include '../models/OrdersModel.php';

function getAllOrders() {
    global $conn; 
    return OrdersModel::getAllOrders($conn);
}

function addOrder($customerName, $city, $orderDate, $status, $totalAmount) {
    global $conn;
    return OrdersModel::addOrder($conn, $customerName, $city, $orderDate, $status, $totalAmount);
}

function updateOrder($orderId, $status) {
    global $conn;
    return OrdersModel::updateOrder($conn, $orderId, $status);
}

function deleteOrder($orderId) {
    global $conn;
    return OrdersModel::deleteOrder($conn, $orderId);
}
?>
 