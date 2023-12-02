<?php 
 include("../config/app.php");
 include("../models/auth.php");



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
	</head>
	<?php

include('../partials/navbar.php'); ?>
	<body>
  

	<div class="container">


<!-- <img src="./images/signlogo.png" alt="phpt">  -->

<h1>Sign Up Now</h1>
<h3>Aussie food to be enjoyed</h3>
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
	
	<button type="submit" class="registerbtn" value="signup" name="log">Sign Up</button>
</form>


<p>Already have an account? <a href="/customers/profile/signinn">login</a></p>





</div>

		
	</body>
</html>