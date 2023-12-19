<?php
require_once "../models/Model.php";

class OrdersItemsModel extends Model {
    public function addOrder($orderid, $name, $price, $quantity) {
        $query = "INSERT INTO `orderitems`(`orderid`, `name`, `price`, `quantity`) 
        VALUES ('$orderid','$name','$price','$quantity')";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }

    public function getOrder($orderid) {
        $query = "SELECT * FROM `orderitems` WHERE orderid = $orderid";
        $result=mysqli_query($this->conn,$query);
        $products = array();
        while ($row = mysqli_fetch_array($result)) {
            $products[] = $row;
        }
        return $products;
    }
}
?>












