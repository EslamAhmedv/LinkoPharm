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
        header("Location: index.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="../public/css/signup.css">
		<script src="https://kit.fontawesome.com/f4bd0b4361.js" crossorigin="anonymous"></script>
	</head>




	<body>
    
    <?php

include('../partials/navbar.php'); ?>
      
	<div class="container">


		<!-- <img src="./images/signlogo.png" alt="phpt">  -->

		<h1>Sign Up Now</h1>
		<h3>Aussie food to be enjoyed</h3>
		<form method='POST'>
			<!-- <label><b>Firstname: </b> </label> -->
			<input type="text" id="inputfname" name="firstname" placeholder="Firstname" size="15" />
			<div id='fname' class='err'></div>
			<!-- <label> <b>Middlename:</b> </label> -->
			<input type="text" id="inputmname" name="lastname" placeholder="Middlename" size="15" />
			<div id='mname' class='err'></div>

			<!-- <label> <b>Lastname</b>: </label> -->
			<input type="text" id="inputlname" name="username" placeholder="Lastname" size="15" />
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

			<button type="submit" class="registerbtn" value="signup" name="reg">Sign Up</button>
		</form>


		<p>Already have an account? <a href="/customers/profile/signinn">sign
				in</a></p>





	</div>


</body>








</html>