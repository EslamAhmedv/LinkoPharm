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
    public function getCustomerById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateCustomer($id, $firstName, $lastName, $userName, $email, $gender, $hashedPassword) {
        $query = "UPDATE users SET firstname = ?, lastname = ?, username = ?, email = ?, gender = ?, password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssii", $firstName, $lastName, $userName, $email, $gender, $hashedPassword, $id);
        return $stmt->execute();
    }
    
    public function addCustomer($firstName, $lastName, $userName, $email, $gender, $hashedPassword) {
        $query = "INSERT INTO users (firstname, lastname, username, email, gender, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssss", $firstName, $lastName, $userName, $email, $gender, $hashedPassword);
        return $stmt->execute();
    }
}
?>
