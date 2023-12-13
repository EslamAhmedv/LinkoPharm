<?php
require_once("../models/UserModel.php");

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function registerUser($firstname, $lastname, $username, $email, $gender, $password, $password2) {
       

        // Validate firstname
        if (!preg_match('/^[a-zA-Z]+$/', $firstname)) {
            return "Please enter a valid firstname";
        }
    
        // Validate lastname
        if (!preg_match('/^[a-zA-Z]+$/', $lastname)) {
            return "Please enter a valid lastname";
        }
    
        // Validate username
        if (!preg_match('/^[a-zA-Z ]+$/', $username)) {
            return "Please enter a valid username";
        }
    
        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Please enter a valid email";
        }
    
        // Validate password length
        if (strlen(trim($password)) < 4) {
            return "Password must be at least 4 chars long";
        }
    
    
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


public function changePassword($userId, $currentPassword, $newPassword, $confirmPassword) {
    // Verify the correctness of the current password
    if (!$this->verifyCurrentPassword($userId, $currentPassword)) {
        return "Incorrect current password";
    }

    // Validate the new password
    if (strlen(trim($newPassword)) < 4) {
        return "New password must be at least 4 characters long";
    }

    // Check if new password matches the confirmation
    if ($newPassword !== $confirmPassword) {
        return "New password and confirmation do not match";
    }

    // Update the password in the database
    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $result = $this->userModel->updatePassword($userId, $hashedNewPassword);

    if ($result) {
        $redirectUrl = "userprofile.php?alert=success&message=" . urlencode("Password changed successfully");
        header("Location: $redirectUrl");
        exit();
    } else {
        $redirectUrl = "userprofile.php?alert=error&message=" . urlencode("Failed to update password");
        header("Location: $redirectUrl");
        exit();
    }
}



public function getUserRole($userId) {
   return $this->userModel->getUserRole($userId);
}
















// public function changePassword($userId, $currentPassword, $newPassword, $confirmPassword) {
//     // Verify the current password
//     $currentPasswordIsValid = $this->verifyCurrentPassword($userId, $currentPassword);

//     if (!$currentPasswordIsValid) {
//         return "Incorrect current password";
//     }

//     // Check if the new password and confirm password match
//     if ($newPassword !== $confirmPassword) {
//         return "New password and confirm password do not match";
//     }

//     // Update the password in the database
//     $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
//     $this->userModel->updatePassword($userId, $hashedNewPassword);

//     return "Password updated successfully";
    
// }

public function updateUserInfo($userId, $newFirstName, $newLastName, $newUsername, $newEmail, $newGender) {
    // Add validation if necessary

    // Update user information
    $result = $this->userModel->updateUserInfo($userId, $newFirstName, $newLastName, $newUsername, $newEmail, $newGender);

    if ($result) {
        return "User information updated successfully";
    } else {
        return "Failed to update user information";
    }
}





}?>