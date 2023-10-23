<?php
   session_start();
   include_once "../includes/db.php";
   //grab data from user and see if it exists in database
   if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email=$_POST["email"];
	$password=$_POST["password"];
	$sql="Select * from users where email ='$email' and password='$password'";
	$result = mysqli_query($conn,$sql);
    if($row=mysqli_fetch_array($result))	{
		$_SESSION["id"]=$row[0];
		$_SESSION["firstname"]=$row["firstname"];
		$_SESSION["lastname"]=$row["lastname"];
        $_SESSION["username"]=$row["username"];
		$_SESSION["email"]=$row["email"];
        $_SESSION["gender"]=$row["gender"];
		$_SESSION["password"]=$row["password"];
		header("Location:index.php?login=success");
	}
	else	{
		echo "Inalid Email or Password";
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
					<h3>login Form</h3>
					
					
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address"  name="email" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					
					<div class="form-wrapper">
						<input type="password" placeholder="Password"  name="password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					
					<button type="submit">login</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>