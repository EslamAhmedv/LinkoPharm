<?php
require_once("../controllers/UserController.php");
require_once("../models/UserModel.php");
require_once("../models/MenuModel.php");
require_once("../includes/Dbh.php");
require_once '../controllers/productscontroller.php';

$userController = new UserController(new UserModel());
$menuModel = new MenuModel();
$menuItems = $menuModel->fetchMenuItems();



if (isset($_GET['search'])) {
   $search = $_GET['search'];
   $sql = "select * from 'products' where name='$search'";
   $result = mysqli_query($conn, $sql);
   return $result;
}


$isUserLoggedIn = isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;

if (isset($_SESSION['auth_user'])) {
   require_once("../controllers/UserController.php");

   $userController = new UserController();

   $userId = $_SESSION['auth_user']['user_id'];

   $userRole = $userController->getUserRole($userId);

   var_dump($userRole);

   if ($userRole !== null && $userRole == 1) {
      header("Location: dashboard.php");
      exit();
   }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
   <link rel="stylesheet" href="../views/search.php">
   <link rel="stylesheet" href="../public/css/navbar.css">
   <title>Your Page Title</title>
</head>

<body>





   <header class="headerm" id="header">
      <nav class="nav container">
         <img src="../public/images/logo.png" class="logom">


         <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
               <?php foreach ($menuItems as $menuItem) {

                  if (!$isUserLoggedIn && in_array($menuItem['label'], ['Wishlist', 'Logout'])) {
                     continue;
                  }
                  echo '<li class="nav__item">';
                  echo '<a href="' . $menuItem['url'] . '" class="nav__link">' . $menuItem['label'] . '</a>';
                  echo '</li>';
               }

               if (!$isUserLoggedIn) {

                  echo '<li class="nav__item"><a href="login.php" class="nav__link">Login</a></li>';
               }
               ?>
            </ul>


            <div class="nav__close" id="nav-close">
               <i class="ri-close-line"></i>
            </div>
         </div>

         <div class="nav__actions">
            <a href="userprofile.php"><i class="ri-user-line nav__login" id="login-btn"></i></a>
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
               <i class="ri-search-line nav__search" id="search-btn"></i>
            </button>

            <?php if ($isUserLoggedIn) : ?>
               <a href="checkout.php">
                  <div class="fas fa-shopping-cart" id="cart-btn"></div>
               </a>
            <?php endif; ?>

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


   <a href="cart.php">
      <div class="fas fa-shopping-cart" id="cart-btn"></div>
   </a>

   <div class="nav__toggle" id="nav-toggle">
      <i class="ri-menu-line"></i>
   </div>

   </div>
   </nav>
   </header>



   <!--=============== MAIN JS ===============-->
   <script>
      /*=============== SHOW MENU ===============*/
      const navMenu = document.getElementById('nav-menu'),
         navToggle = document.getElementById('nav-toggle'),
         navClose = document.getElementById('nav-close')

      /* Menu show */
      navToggle.addEventListener('click', () => {
         navMenu.classList.add('show-menu')
      })

      /* Menu hidden */
      navClose.addEventListener('click', () => {
         navMenu.classList.remove('show-menu')
      })

      /*=============== SEARCH ===============*/
      const search = document.getElementById('search'),
         searchBtn = document.getElementById('search-btn'),
         searchClose = document.getElementById('search-close')

      /* Search show */
      searchBtn.addEventListener('click', () => {
         search.classList.add('show-search')
      })

      /* Search hidden */
      searchClose.addEventListener('click', () => {
         search.classList.remove('show-search')
      })

      /*=============== LOGIN ===============*/
      const login = document.getElementById('login'),
         loginBtn = document.getElementById('login-btn'),
         loginClose = document.getElementById('login-close')

      /* Login show */
      loginBtn.addEventListener('click', () => {
         login.classList.add('show-login')
      })

      /* Login hidden */
      loginClose.addEventListener('click', () => {
         login.classList.remove('show-login')
      })
   </script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#searchButton').on('click', function() {
            var searchTerm = $('#searchInput').val(); // Get the search term

            $.ajax({
               type: 'GET',
               url: 'search_backend.php',
               data: {
                  search: searchTerm
               },
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
</body>

</html>