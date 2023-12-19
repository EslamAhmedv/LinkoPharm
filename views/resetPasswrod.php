<?php
// Include necessary files and initialize session if not already done

// Implement logic to verify the token and get user information based on the token
// For example, you might have a function like getUserByToken($token) in your UserController

// Sample logic (modify based on your application)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
    $token = $_GET['token'];
    $userController = new UserController();
    $userInfo = $userController->getUserByToken($token);

    if ($userInfo === null) {
        // Token is invalid or expired, redirect to an error page or display an error message
        header("Location: error.php");
        exit();
    }
} else {
    // Invalid request, redirect to an error page or display an error message
    header("Location: error.php");
    exit();
}

// Handle the password update when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    // Validate password (you might want to add more validation)

    // Update the user's password in the database
    $updateResult = $userController->updatePassword($userInfo['user_id'], $password);

    if ($updateResult === true) {
        // Password updated successfully, you might want to redirect to the login page
        header("Location: login.php");
        exit();
    } else {
        $errorMessage = "Failed to update password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap">
    <link rel="stylesheet" href="../public/css/resetpass.css"> <!-- Create/resetpass.css for styling -->
    <title>Reset Password</title>
</head>
<body>
    <br>
    <br>
    <div class="cont">
        <div class="form">
            <h1>Reset Password</h1>
            <form method="post">
                <label>
                    <i class="uil uil-lock-alt"></i>
                    <span>New Password:</span>
                    <br>
                    <input type="password" name="password" required>
                </label>
                <!-- You might want to add password strength validation here -->
                <button type="submit" class="submit">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>
