<?php
require_once("../controllers/UserController.php");
require_once("../models/UserModel.php");

$userController = new UserController(new UserModel());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have form fields named 'email' and 'password'
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginResult = $userController->userLogin($email, $password);

    if ($loginResult === true) {
        // Redirect to the dashboard or another page upon successful login
        header("Location: index.php");
        exit();
    } else {
        // Display the login error message using JavaScript
		$errorMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		' . $loginResult . '
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';
    }
}
?>
























<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../public/css/login.css">
		  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
		
	</head>

	<?php

include('../partials/navbar.php'); ?>
	<body>
  

	<div class="macontainer">


<!-- <img src="./images/signlogo.png" alt="phpt">  -->

<h1>Sign in</h1>
<h3>Linkopharm Always with You</h3>
<form method='POST'>
	<!-- <label><b>Firstname: </b> </label> -->

	<div id='lname' class='err'></div>


	<!-- <label>
<b>Phone:</b>
</label> -->


	<!-- <label for="email"><b>Email</b></label> -->
	<input type="email" id="inputmail" placeholder="Enter Email" name="email" required>
	<div id='mail' class='err'></div>


	<input type="password" name="password" id="inputpass" placeholder="Enter Password">
	<div id='password' class='err'></div>
	<p><a href="forgetpass.php">Forget Password?</a></p>
	<button type="submit" class="registerbtn" value="signup" name="log">Login</button>
</form>



<p>don"t have an account? <a href="signup.php">Signup</a></p>





</div>

<?php
    // Display the Bootstrap alert if there's an error message
    if (isset($errorMessage)) {
        echo $errorMessage;
    }
    ?>	
	</body>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</html>