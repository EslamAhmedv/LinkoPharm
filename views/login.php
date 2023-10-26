<?php
require "../includes/functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$errors = login($_POST);

	if(count($errors) == 0)
	{
		header("Location: index.php");
		die;
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
                    <div>
			<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>

		</div>
					
					<div class="form-wrapper">
						<input type="email" placeholder="Email Address"  name="email" class="form-control">
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
		
	</body>
</html>