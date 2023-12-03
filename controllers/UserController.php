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













    public function userLogin($email, $password) {
        $result = $this->userModel->userLogin($email, $password);

        if ($result) {
            // Successful login
            header("Location: index.php"); // Redirect to the dashboard or another page
            exit();
        } else {
            // Failed login
            return "Invalid email or password";
        }


}








public function getUserProfile($userId) {
    // Fetch user data based on the user's ID
    return $this->userModel->getUserById($userId);
}



public function logout() {
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to the home page or any other page after logout
        header("Location: index.php");
        exit();
    } else {
        // If the user is not logged in, redirect to the home page
        header("Location: index.php");
        exit();
    }
}

















public function verifyCurrentPassword($userId, $currentPassword) {
    // Retrieve hashed password from the database
    $storedPasswordHash = $this->userModel->getPasswordHash($userId);

    // Check if the entered current password is correct
    return password_verify($currentPassword, $storedPasswordHash);
}

public function updatePassword($userId, $newPassword) {
    // Update the password in the database
    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $this->userModel->updatePassword($userId, $hashedNewPassword);
}




}?>