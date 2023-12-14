<?php
require_once("../controllers/UserController.php");
require_once("../models/UserModel.php");

$userController = new UserController(new UserModel());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginResult = $userController->userLogin($email, $password);

    if ($loginResult === true) {
        header("Location: index.php");
        exit();
    } else {
		$errorMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		' . $loginResult . '
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';
    }
}






if (isset($_SESSION['auth_user'])) {
    require_once("../controllers/UserController.php");

    $userController = new UserController();

    // Get the user ID from the session
    $userId = $_SESSION['auth_user']['user_id'];

    // Get the user role using the getUserRole function
    $userRole = $userController->getUserRole($userId);

    // Debugging output
    var_dump($userRole);

    // Check if the user role is set and is equal to 1 (adjust this condition based on your actual role values)
    if ($userRole !== null && $userRole == 1) {
        // Redirect to the dashboard for users with role 1
        header("Location: dashboard.php");
        exit(); // Make sure to exit after sending the header
    }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="../public/css/login.css">
		  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
		
	</head>

	<?php

include('../partials/navbar.php'); ?>
	<body>
  

	<div class="macontainer">
	<?php
    if (isset($errorMessage)) {
        echo $errorMessage;
    }
    ?>	
<h1>Sign in</h1>
<h3>Linkopharm Always with You</h3>
<form method='POST'>

	<div id='lname' class='err'></div>

	<input type="email" id="inputmail" placeholder="Enter Email" name="email" required>
	<div id='mail' class='err'></div>


	<input type="password" name="password" id="inputpass" placeholder="Enter Password">
	<div id='password' class='err'></div>
	
	<button type="submit" class="registerbtn" value="signup" name="log">Login</button>
</form>



<p>don"t have an account? <a href="signup.php">Signup</a></p>





</div>


	</body>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</html>