<?php
include "../includes/db.php";

class OrdersModel {

    public static function getAllOrders($conn) {
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);
        $orders = array();
        while ($order = mysqli_fetch_assoc($result)) {
            $orders[] = $order;
        }
        return $orders;
    }

    public static function addOrder($conn, $customerName, $city, $orderDate, $status, $totalAmount) {
        $query = "INSERT INTO orders (customer_name, city, order_date, status, total_amount) VALUES ('$customerName', '$city', '$orderDate', '$status', '$totalAmount')";
        return $conn->query($query);
    }

    public static function updateOrder($conn, $orderId, $status) {
        $query = "UPDATE orders SET status = '$status' WHERE id = $orderId";
        return $conn->query($query);
    }

    public static function deleteOrder($conn, $orderId) {
        $query = "DELETE FROM orders WHERE id = $orderId";
        return $conn->query($query);
    }
}
?>
