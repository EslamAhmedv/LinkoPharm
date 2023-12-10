<?php
require_once("../controllers/UserController.php");
require_once("../models/UserModel.php");
require_once '../controllers/productscontroller.php';

$userController = new UserController(new UserModel());

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Assuming you have form fields named 'email' and 'password'
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $loginResult = $userController->userLogin($email, $password);

//     if ($loginResult === true) {
//         // Redirect to the dashboard or another page upon successful login
//         header("Location: index.php");
//         exit();
//     } else {
//         // Display the login error message using JavaScript
//         echo "<script>alert('$loginResult');</script>";
//     }
// }


if (isset($_GET['search'])){
   $search=$_GET['search'];
   $sql="select * from 'products' where name='$search'";
   $result=mysqli_query($conn,$sql);
   return $result;
   
}

$isUserLoggedIn = isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
















//$userId = $_SESSION['auth_user']['user_id'];
//$userRole = $userController->getUserRole($userId);

//Check if the user is an admin
//if ($userRole == 1) {
 // header("Location: dashboard.php");
   // Display admin-specific content, e.g., a link to the admin dashboard
   
//}


?>






























      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

      <link rel="stylesheet" href="../views/search.php">
      
      <link rel="stylesheet" href="../public/css/navbar.css">

 

   
   <?php if ($isUserLoggedIn){?>
    
    

   
      <header class="headerm" id="header">
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
                     <a href="contactus.php" class="nav__link">contact us</a>
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
               
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  <i class="ri-search-line nav__search" id="search-btn"></i>

            
               <a href="checkout.php"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line"></i>
               </div>
             
            </div>
         </nav>
      </header>

      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="get" action="search_backend.php" id="searchForm">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="search" name="search" id="searchInput">
                    <div class="data-details" id="searchResults">
                        <!-- Searched data will be displayed here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="searchButton">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
               
            
               <a href="cart.php"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line"></i>
               </div>
             
            </div>
         </nav>
      </header>

      
      <!-- <div class="search" id="search">
         <form action="search" class="search__form">
            <i class="ri-search-line search__icon"></i>
            <input type="text" placeholder="searching" class="search__input">
         </form>

         <i class="ri-close-line search__close" id="search-close"></i>
      </div> -->
      

        
            
















      

<?php } 
     else{  ?>
   <header class="headerm" id="header">
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
                     <a href="contactus.php" class="nav__link">Contact us</a>
                  </li>
               </ul>

               <div class="nav__close" id="nav-close">
                  <i class="i-close-line"></i>
               </div>
            </div>

            <div class="nav__actions">
               
               <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  <i class="ri-search-line nav__search" id="search-btn"></i>
                  
</button>
               
<a href="login.php"> <i class="ri-user-line nav__login" id="login-btn"></i></a>
               <a href="checkout.php"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line"></i>
               </div>
             
            </div>
         </nav>
      </header>

      
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="get" action="search_backend.php" id="searchForm">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="search" name="search" id="searchInput">
                    <div class="data-details" id="searchResults">
                        <!-- Searched data will be displayed here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="searchButton">Search</button>
                </div>
            </form>
        </div>
    </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchButton').on('click', function() {
            var searchTerm = $('#searchInput').val(); // Get the search term

            $.ajax({
                type: 'GET',
                url: 'search_backend.php',
                data: { search: searchTerm },
                success: function(response) {
                    $('#searchResults').html(response); // Update search results in the div
                },
                error: function() {
                    $('#searchResults').html('Error occurred while processing the search.');
                }
            });
        });
    });
</script>

