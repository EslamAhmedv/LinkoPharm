<?php
require_once "../models/Model.php";

class OrdersModel extends Model {

    public function getAllOrders() {
        $sql = "SELECT * FROM orders";
        $result = $this->conn->query($sql);
        $orders = array();
        while ($order = $result->fetch_assoc()) {
            $orders[] = $order;
        }
        return $orders;
    }

    public function addOrder($customerName, $city, $orderDate, $status, $totalAmount) {
        $query = "INSERT INTO orders (customer_name, city, order_date, status, total_amount) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $customerName, $city, $orderDate, $status, $totalAmount);
        return $stmt->execute();
    }

    public function updateOrder($orderId, $status) {
        $query = "UPDATE orders SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $status, $orderId);
        return $stmt->execute();
    }

    public function deleteOrder($orderId) {
        $query = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $orderId);
        return $stmt->execute();
    }
}
?>
