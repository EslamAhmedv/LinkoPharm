<?php
// @include '../includes/db.php';
// if(isset($_POST['submit'])){
//     $username= mysqli_real_escape_string($conn,$_POST['username']);
//     $email= mysqli_real_escape_string($conn,$_POST['email']);
//     $password= md5($_POST['password']);
//     $cpassword= md5($_POST['password2']);

//     $select = " SELECT * FROM users WHERE email = '$email' && password = '$password' ";
//     $result = mysqli_query($conn,$select);
//     if(mysqli_num_rows($result)>0){
//         $error[]='user already exist';
//     }else{
//         if($password != $cpassword){
//             $error[]='password doesn\'t match  exist';

//         }else{
//             $insert="INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
//             mysqli_query($conn,$insert);
//             header('location:index.php');
//         }
//     }

// };



require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$errors = signup($_POST);

	if(count($errors) == 0)
	{
		header("Location: index.php");
		die;
	}
}


$errors2 = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$errors2 = login($_POST);

	if(count($errors2) == 0)
	{
		header("Location: dashboard.php");
		die;
	}
}

?>


<?php


?>





<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/slide.css">
        <title>login and sign up</title>
         <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="../public/css/login.css">
</head>
        <body>
        <br>
<br>
    <div class="cont">
        <div class="form Log-in">
            <h2>Welcome</h2>
            <form action="" method="post">
            <?php if(count($errors2) > 0):?>
				<?php foreach ($errors2 as $error2):?>
					<?= $error2?> <br>	
				<?php endforeach;?>
			<?php endif;?>
            <label>
                <span>Email</span>
                <input type="email" name="email" />
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="password"/>
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <button type="submit" class="submit">Sign In</button>
             </form>
         
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Create your Account</h2>
                <form action="" method="post">
                    <?php 
                    // if(isset($error)){
                    //     foreach($error as $error){
                    //         echo '<span class="error-msg">'.$error.'</span>';
                    //     };
                    // };
                    ?>

<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>
            <label>
                <span>First Name</span>
                <input type="fname" />
            </label>
            <label>
                <span>Last Name</span>
                <input type="lname" />
            </label>
            <label>
                <span>Phone</span>
                <input type="phone" />
            </label>
            <label>
                <span>Address</span>
                <input type="address" />
            </label>
            <label>
                <span>Age</span>
                <input type="age" />
            </label>
                <label>
                    <span>Email</span>
                    <input type="text" Name="email" />
                </label>
                <label>
                    <span>Password</span>
                    <input type="text" Name="password" />
                </label>

                
                
                <button type="submit" name="submit" class="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
</body>
</html>