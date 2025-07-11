<?php
require_once("../controllers/UserController.php");

$userController = new UserController();
$message = '';

if (isset($_POST['reg'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $message = $userController->registerUser($firstname, $lastname, $username, $email, $gender, $password, $password2);
    
    if ($message === "Success") {
        header("Location: login.php");
        exit;
    }
	else {
		$errorMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		' . $message . '
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';
    }
}
?>





<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>signup</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../public/css/signup.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
	</head>





	<body>
    
    <?php

include('../partials/navbar.php'); ?>
      
	<div class="macontainer">

	<?php
    if (isset($errorMessage)) {
        echo $errorMessage;
    }
    ?>	

		<h1>Sign Up Now</h1>
		<h3>Linkopharm Always with You</h3>
		<form method='POST'>
			<!-- <label><b>Firstname: </b> </label> -->
			<input type="text" id="inputfname" name="firstname" placeholder="Firstname" size="15" />
			<div id='fname' class='err'></div>
			<!-- <label> <b>Middlename:</b> </label> -->
			<input type="text" id="inputmname" name="lastname" placeholder="Lastname" size="15" />
			<div id='mname' class='err'></div>

			<!-- <label> <b>Lastname</b>: </label> -->
			<input type="text" id="inputlname" name="username" placeholder="Username" size="15" />
			<div id='lname' class='err'></div>


			<!-- <label>
 <b>Phone:</b>
</label> -->


			<!-- <label for="email"><b>Email</b></label> -->
			<input type="email" id="inputmail" placeholder="Enter Email" name="email" required>
			<div id='mail' class='err'></div>


			<select name="gender" id="" class="form-control" required>
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
			<div id='phone' class='err'></div>
			<!-- <label for="psw"><b>Password</b></label> -->
			<input type="password" name="password" id="inputpass" placeholder="Enter Password">
			<div id='password' class='err'></div>
			<!-- <label for="psw-confirm"><b>Re-type Password</b></label> -->
			<input type="password" name="password2" id="inputcpass" placeholder="confirm Password">
			<div id='cpassword' class='err'></div>

			<button type="submit" class="lll" value="signup" name="reg">Sign Up</button>
		</form>


		<p>Already have an account? <a href="login.php">sign
				in</a></p>





	</div>


</body>








</html>