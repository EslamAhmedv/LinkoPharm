<?php
require_once "../models/Model.php";

class CustomerModel extends Model {

    public function getAllCustomers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        $customers = array();
        while ($customer = $result->fetch_assoc()) {
            $customers[] = $customer;
        }
        return $customers;
    }

    public function deleteCustomer($customerId) {
        $deleteQuery = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($deleteQuery);
        $stmt->bind_param("i", $customerId);
        return $stmt->execute();
    }
}
?>
