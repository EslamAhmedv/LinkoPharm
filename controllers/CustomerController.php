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
    public function getCustomerById($id) {
        return $this->customerModel->getCustomerById($id);
    }

    public function updateCustomer() {
        $id = $_POST['id'];
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $userName = $_POST['username'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        return $this->customerModel->updateCustomer($id, $firstName, $lastName, $userName, $email, $gender, $hashedPassword);
    }
    public function addCustomer() {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $userName = $_POST['username'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        return $this->customerModel->addCustomer($firstName, $lastName, $userName, $email, $gender, $hashedPassword);
    }
    
}
?>
