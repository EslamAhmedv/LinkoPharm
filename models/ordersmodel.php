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
        $query = "INSERT INTO orders (customer_name, city, order_date, status, amount) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss", $customerName, $city, $orderDate, $status, $totalAmount);
        return $stmt->execute();
    }
    
public function updateOrder($orderId, $customerName, $city, $orderDate, $status, $amount) {
    $query = "UPDATE orders SET customer_name = ?, city = ?, order_date = ?, status = ?, amount = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("sssssi", $customerName, $city, $orderDate, $status, $amount, $orderId);
    return $stmt->execute();
}


    public function deleteOrder($orderId) {
        $query = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $orderId);
        return $stmt->execute();
    }
    public function getOrderById($orderId) {
        $query = "SELECT * FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); 
}
}
?>
