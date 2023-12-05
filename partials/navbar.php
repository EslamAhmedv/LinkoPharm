<?php
require_once("../controllers/UserController.php");
require_once("../models/UserModel.php");
require_once("../controllers/productscontroller.php");

$userController = new UserController(new UserModel());
$productsController = new ProductController(); // Add this line

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
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

$userId = $_SESSION['auth_user']['user_id'];
$userRole = $userController->getUserRole($userId);

// Check if the user is an admin
if ($userRole == 1) {
    header("Location: dashboard.php");
    // Display admin-specific content, e.g., a link to the admin dashboard
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    <link rel="stylesheet" href="../public/css/navbar.css">
    <title>navbar</title>
</head>
<body>
<?php if ($isUserLoggedIn) { ?>
    <header class="header" id="header">
        <nav class="nav container">
            <img src="../public/images/logo.png" class="logom">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="products.php" class="nav__link">Menu</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">Services</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">Featured</a>
                    </li>
                    <li class="nav__item">
                        <a href="logout.php" class="nav__link">Log Out</a>
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

    <!-- Search Form -->
    <div class="search" id="search">
        <form action="#" class="search__form" method="post">
            <i class="ri-search-line search__icon"></i>
            <input type="search" placeholder="Search products" class="search__input" name="search">
            <button class="btn btn-dark" name="submit">Search</button>
        </form>
        <div id="search-results" class="search-results">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                $search = $_POST['search'];

                $result = $productsController->searchProducts($search);

                if (!empty($result)) {
                    echo "<h2>Search Results:</h2>";
                    foreach ($result as $product) {
                        // Display search results here
                        echo "<div class='product'>";
                        echo "<img src='{$product['image']}' alt='{$product['name']}' />";
                        echo "<h3>{$product['name']}</h3>";
                        echo "<p>Price: {$product['price']}</p>";
                        echo "<p>Description: {$product['description']}</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No results found.</p>";
                }
            }
            ?>
        </div>
    </div>

<?php } else { ?>
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

    <!-- Search Form -->
    <div class="search" id="search">
        <form method="post" class="search__form">
            <i class="ri-search-line search__icon"></i>
            <input type="search" placeholder="Search products" name="search">
            <button class="btn btn-dark" name="submit">Search</button>
        </form>
        <div id="search-results" class="search-results">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                $search = $_POST['search'];

                $result = $productsController->searchProducts($search);

                if (!empty($result)) {
                    echo "<h2>Search Results:</h2>";
                    foreach ($result as $product) {
                        echo "<div class='product'>";
                        echo "<img src='{$product['image']}' alt='{$product['name']}' />";
                        echo "<h3>{$product['name']}</h3>";
                        echo "<p>Price: {$product['price']}</p>";
                        echo "<p>Description: {$product['description']}</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No results found.</p>";
                }
            }
            ?>
        </div>
    </div>
<?php } ?>
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