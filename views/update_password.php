<!-- update_password.php -->

<?php

require_once("../controllers/UserController.php");
require_once("../models/UserModel.php");

// Create an instance of the UserController
$userController = new UserController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if new password matches the confirmation
    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('new password and confirm doesn't match');</script>";
       
        exit();
    }

    // Check if the current password is correct
    $userId = $_SESSION['auth_user']['user_id'];
    $currentPasswordHash = password_hash($currentPassword, PASSWORD_DEFAULT);

    // Check the current password against the one stored in the database
    if ($userController->verifyCurrentPassword($userId, $currentPasswordHash)) {
        // Update the password in the database
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $userController->updatePassword($userId, $newPasswordHash);

        echo "<script>alert('password updated successfully');</script>";
    } else {
        echo "<script>alert('incorrrect current password');</script>";
    }
} else {
    // Redirect to the user profile page if accessed directly
    header("Location: index.php");
    exit();
}
?>