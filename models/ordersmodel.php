<?php
require_once "../models/Model.php";

class OrdersModel extends Model
{

    public function getAllOrders()
    {
        $sql = "SELECT * FROM orders";
        $result = $this->conn->query($sql);
        $orders = array();
        while ($order = $result->fetch_assoc()) {
            $orders[] = $order;
        }
        return $orders;
    }

    public function addOrder($userid, $username, $phone, $address, $city, $order_date, $status, $total_price)
    {
        $query = "INSERT INTO `orders`(`userid`, `user_name`, `phone`, `address`, `city`, `order_date`, `status`, `total_price`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("issssssi", $userid, $username, $phone, $address, $city, $order_date, $status, $total_price);

        return $stmt->execute();
    }


    public function updateOrder($orderId, $customerName, $city, $orderDate, $status, $amount)
    {
        $query = "UPDATE orders SET user_name = ?, city = ?, order_date = ?, status = ?, total_price = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssi", $customerName, $city, $orderDate, $status, $amount, $orderId);
        return $stmt->execute();
    }

    public function deleteOrder($orderId)
    {
        $query = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $orderId);
        return $stmt->execute();
    }

    public function getOrderById($orderId)
    {
        $query = "SELECT * FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getOrder($userid)
    {
        $query = "SELECT * FROM `orders` WHERE userid = $userid";
        $result = mysqli_query($this->conn, $query);
        if ($row = mysqli_fetch_array($result)) {
            return $row;
        } else {
            return false;
        }
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
