<?php
require_once("../models/UserModel.php");

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function registerUser($firstname, $lastname, $username, $email, $gender, $password, $password2) {
        if ($password !== $password2) {
            return "Passwords do not match";
        }

        if ($this->userModel->checkUserExists($email)) {
            return "Email already exists";
        }

        $result = $this->userModel->addUser($firstname, $lastname, $username, $email, $gender, $password);
        if ($result) {
            return "Success";
        } else {
            return "Registration failed";
        }
    }
}
