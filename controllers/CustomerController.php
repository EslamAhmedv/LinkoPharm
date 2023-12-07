<?php 
require_once '../models/CustomerModel.php';

class CustomerController {

    private $customerModel;

    public function __construct() {
        $this->customerModel = new CustomerModel();
    }

    public function deleteCustomer() {
        $customerId = $_POST['userId'];
        if ($this->customerModel->deleteCustomer($customerId)) {
            header("Location: custdash.php?message=User deleted successfully");
            exit;
        } else {
            echo "Error: Unable to delete customer";
        }
    }

    public function getAllCustomers() {
        return $this->customerModel->getAllCustomers();
    }
}
?>
