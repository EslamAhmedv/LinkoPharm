<?php
// Assuming you have a basic router implementation
$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', $uri);

$controllerName = ucfirst($parts[1]) . 'forgetpass';
$action = $parts[2] ?? 'index';

// Load the controller
include '../controllers/forgetpass.php';
$controller = new $ForgetPassController();

// Call the action
$controller->$action();
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap">
    <link rel="stylesheet" href="../public/css/forgetpass.css">
    <title>Forgot Password</title>
</head>
<body>
    <br>
    <br>
    <div class="cont">
        <div class="form">
            <h1>Forgot Password?</h1>
            <h4>Enter your email address...</h4>
            <form method="post" action="../controllers/forgetpass.php">
                <label>
                    <i class="uil uil-envelope"></i>
                    <span>Email:</span>
                    <br>
                    <input type="email" name="email" required>
                </label>
                <button type="submit" class="submit">Continue</button>
            </form>
        </div>
    </div>
</body>
</html>
