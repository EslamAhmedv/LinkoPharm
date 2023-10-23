<?php 
session_start();

	include("../includes/db.php");
	// include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !empty($firstname)   && !empty($lastname)  && !empty($email) && !is_numeric($username)&& !is_numeric($lastname)&& !is_numeric($firstname)&& !is_numeric($email))
		{

			//save to database
			
			$query = "insert into users (firstname,lastname,username,email,gender,password) values ('$firstname','$lastname','$username','$email','$gender','$password')";

			$result=mysqli_query($conn, $query);
			if($result)	{

			header("Location: index.php");
			}
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
	</head>

	<body>
    <?php

include('../partials/navbar.php'); ?>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="../public/images/doct.png.png" alt="">
				</div>
				<form method="post">
					<h3>Sign up Form</h3>
					<div class="form-group">
						<input type="text" placeholder="First Name" name="firstname" class="form-control">
						<input type="text" placeholder="Last Name"  name="lastname" class="form-control">
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Username"  name="username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address"  name="email" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="gender" id="" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password"  name="password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button type="submit">Register</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>