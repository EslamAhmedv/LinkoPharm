<?php
require_once("../controllers/UserController.php");
require_once("../models/UserModel.php");
include '../models/ProductsModel.php';
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
        echo "<script>alert('$loginResult');</script>";
    }
}


$isUserLoggedIn = isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
















// $userId = $_SESSION['auth_user']['user_id'];
//$userRole = $userController->getUserRole($userId);

// Check if the user is an admin
//if ($userRole == 1) {
//   header("Location: dashboard.php");
    // Display admin-specific content, e.g., a link to the admin dashboard
   
//}


?>































<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

      <link rel="stylesheet" href="../views/search.php">
      
      <link rel="stylesheet" href="../public/css/navbar.css">

      <title>navbar</title>
   </head>
   <body>
   
   <?php if ($isUserLoggedIn){?>
    
    

   
      <header class="header" id="header">
         <nav class="nav container">
         <img src="../public/images/logo.png" class="logom">
      
        
            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li class="nav__item">
                 
        
    
              
                 
             <a href="index.php" class="nav__link">Home</a>
                  </li>

                  <li class="nav__item">
                     <a href="products.php" class="nav__link">menu</a>
                  </li>
                  

                  <li class="nav__item">
                     <a href="#" class="nav__link">Services</a>
                  </li>

                  <li class="nav__item">
                     <a href="#" class="nav__link">Featured</a>
                  </li>

                  <li class="nav__item">
                     <a href="logout.php" class="nav__link">log out</a>
                  </li>
               </ul>
               
      
               <div class="nav__close" id="nav-close">
                  <i class="ri-close-line"></i>
               </div>
            </div>

            <div class="nav__actions">
            <a href="userprofile.php"> <i class="ri-user-line nav__login" id="login-btn"></i></a>
               
               <i class="ri-search-line nav__search" id="search-btn"></i>

               
            
               <a href="cart.php"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line"></i>
               </div>
             
            </div>
         </nav>
      </header>

      
      <div class="search" id="search">
         <form action="" class="search__form">
            <i class="ri-search-line search__icon"></i>
            <input type="search" placeholder="searching" class="search__input">
         </form>

         <i class="ri-close-line search__close" id="search-close"></i>
      </div>
      

        
            



<?php } 
     else{  ?>
   <header class="header" id="header">
         <nav class="nav container">
         <img src="../public/images/logo.png" class="logom">

            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li class="nav__item">
                     <a href="index.php" class="nav__link">Home</a>
                  </li>

                  <li class="nav__item">
                     <a href="#" class="nav__link">About Us</a>
                  </li>

                  <li class="nav__item">
                     <a href="#" class="nav__link">Services</a>
                  </li>

                  <li class="nav__item">
                     <a href="#" class="nav__link">Featured</a>
                  </li>

                  <li class="nav__item">
                     <a href="#" class="nav__link">Contact Me</a>
                  </li>
               </ul>

               <div class="nav__close" id="nav-close">
                  <i class="ri-close-line"></i>
               </div>
            </div>

            <div class="nav__actions">
               
               <i class="ri-search-line nav__search" id="search-btn"></i>

               
               <i class="ri-user-line nav__login" id="login-btn"></i>
               <a href="signup.php"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line"></i>
               </div>
             
            </div>
         </nav>
      </header>

      
      <div class="search" id="search">
         <form method="post" class="search__form">
            <i class="ri-search-line search__icon"></i>
            <input type="search" placeholder="searching ?" name="search">
            <button class="btn btn-dark" name="submit" > search </button>


         </form>
<div class="search" id="search">
   <table class="table">
      <?php
        if(isset($_POST['submit'])){
         $search=$_POST['search'];
         $sql="select * from 'products'  '$search' ";
         $result=mysqli_query($con,$sql);
         if($result){
           if(mysqli_num_rows($result)>0){
            echo '<thead>
            <tr>
            <th>id</th>
            <th>image</th>
            <th>name</th>
            <th>price</th>
            </tr>
            </thead>
            ';
            $row=mysqli_fetch_assoc($result);
            echo '<tbody>
            <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['image'].'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['price'].'</td>
            </tr>
            </tbody>';
           }else{
            echo'<h2 class=:text-danger>Data not found</h2>';
           }
         }
        }
      ?>
   </table>
</div>


         <i class="ri-close-line search__close" id="search-close"></i>
      </div>
      
      
      <div class="login" id="login">
         <form action="" class="login__form"  method='POST'>
            <h2 class="login__title">Log In</h2>
            
            <div class="login__group">
               <div>
                  <label for="email" class="login__label">Email</label>
                  <input type="email" placeholder="Write your email" id="email" class="login__input"  name="email">
               </div>
               
               <div>
                  <label for="password" class="login__label"  >Password</label>
                  <input type="password" placeholder="Enter your password" id="password" class="login__input" name="password">
               </div>
            </div>

            <div>
               <p class="login__signup">
                  You do not have an account? <a href="signup.php">Sign up</a>
               </p>
   
               <a href="#" class="login__forgot">
                  You forgot your password
               </a>
   
               <button type="submit" class="login__button" value="signup" name="log">Log In</button>
            </div>
         </form>

         <i class="ri-close-line login__close" id="login-close"></i>
      </div>
      <?php  } ?>

      <!--=============== MAIN JS ===============-->
      <script>/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/* Menu show */
navToggle.addEventListener('click', () =>{
   navMenu.classList.add('show-menu')
})

/* Menu hidden */
navClose.addEventListener('click', () =>{
   navMenu.classList.remove('show-menu')
})

/*=============== SEARCH ===============*/
const search = document.getElementById('search'),
      searchBtn = document.getElementById('search-btn'),
      searchClose = document.getElementById('search-close')

/* Search show */
searchBtn.addEventListener('click', () =>{
   search.classList.add('show-search')
})

/* Search hidden */
searchClose.addEventListener('click', () =>{
   search.classList.remove('show-search')
})

/*=============== LOGIN ===============*/
const login = document.getElementById('login'),
      loginBtn = document.getElementById('login-btn'),
      loginClose = document.getElementById('login-close')

/* Login show */
loginBtn.addEventListener('click', () =>{
   login.classList.add('show-login')
})

/* Login hidden */
loginClose.addEventListener('click', () =>{
   login.classList.remove('show-login')
})</script>
   </body>
</html>