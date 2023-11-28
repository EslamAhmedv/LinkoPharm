<?php
include '../models/adminmodel.php';






function addcustomer(){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $isAdded = adminmodel::addcustomer($firstname, $lastname, $username, $email, $gender, $password);

    if ($isAdded) {
        return true;

    } else {
        return false;
    }
}

?>