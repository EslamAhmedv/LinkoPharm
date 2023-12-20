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

    public function addOrder($userid, $username, $phone, $address, $city, $order_date, $status, $total_price) {
        $query = "INSERT INTO `orders`(`userid`, `phone`, `address`, `city`, `order_date`, `status`, `total_price`, `user_name`) 
        VALUES ('$userid','$phone','$address','$city','$order_date','$status','$total_price','$username')";
        $stmt = $this->conn->prepare($query);
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

    public function getOrder($userid) {
        $sql = "SELECT * FROM orders Where userid = $userid" ;
        $result = $this->conn->query($sql);
        $orders = array();
        while ($order = $result->fetch_assoc()) {
            $orders[] = $order;
        }
        return $orders;
    }

    public function getOrderID($Orderid) {
        
        $sql = "SELECT `id`, `userid`, `user_name`, `phone`, `address`, `city`, `order_date`, `status`, `total_price` FROM `orders` Where id = $Orderid" ;
        $result = $this->conn->query($sql);
        $order = $result->fetch_assoc();
        return $order;
    }

    public function getRecentOrders($limit = 3) {
        $query = "SELECT * FROM orders ORDER BY order_date DESC LIMIT ?";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("i", $limit);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            error_log("Error preparing statement: " . $this->conn->error);
        }
        return [];
    }

    
}
?>










