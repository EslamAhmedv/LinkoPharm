
<?php 
 include_once("../includes/Dbh.php");




?>




   
    
    <link rel="stylesheet" href="../public/css/navbar.css">

<body>
    <header class="headerm">
    <img src="../public/images/logo.png" class="logom">
      
   
      
      


        <nav class="navbarm">
       
        <a class="mm" href="index.php">home</a>
       <!-- <a href="#features">features</a> -->
       <a  class="mm" href="products.php">products</a>
       <a  class="mm" href="contactus.php">contact us</a>
       <a  class="mm" href="wishlist.php">wishlist</a>
     
       
       

   </nav>
  

        <div class="profile-dropdown">
        <div onclick="toggle()" class="profile-dropdown-btn">
          <!-- <div class="profile-img">
            <i class="fa-solid fa-circle"></i>
          </div> -->

          <span>
        

            <i class="fa-solid fa-angle-down">alii</i>
          </span>
        </div>
       <ul class="profile-dropdown-list">
         <li class="profile-dropdown-list-item">    <a href="userprofile.php">
            <i class="fa-regular fa-user"></i>
          login
          </a>
        </li>

        <li class="profile-dropdown-list-item">
        <a href="signup.php">
            <i class="fa-regular fa-envelope"></i>
          signup
          </a>
        </li>

        

        <li class="profile-dropdown-list-item">
          <a href="#">
            <i class="fa-solid fa-sliders"></i>
            Settings
          </a>
        </li>

        <li class="profile-dropdown-list-item">
          <a href="#">
            <i class="fa-regular fa-circle-question"></i>
            Help & Support
          </a>
        </li>
        <hr />

        <li class="profile-dropdown-list-item">
          <a href="signout.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            Log out
          </a>
        </li>
      </ul>
        </div>
        



        <div class="iconsm">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn" ></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
        </div>
        
      
        
        <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here..." >
            <label for="search-box" class="fas fa-search"></label>
        </form>
        
        <div class="shopping-cart">
            <div class="box">
                <i class="fas fa-trash"></i>
                <img src="../public/images/haircare.png.jpg" alt="">
                <div class="content">
                    <h3>hair care</h3>
                    <span class="price">$4.99</span>
                    <span class="Quantity">qty:4</span>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-trash"></i>
                <img src="../public/images/haircare.png.jpg" alt="">
                <div class="content">
                    <h3>hair care</h3>
                    <span class="price">$4.99</span>
                    <span class="Quantity">qty:4</span>
                </div>
            </div>
        
            <div class="total">total : $19.69</div>
            <a href="" class="btn">checkout</a>
        </div>

   
    </header>
   <script>

let searchForm=document.querySelector('.search-form');
 document.querySelector('#search-btn').onclick=()=>{
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    Navbar.classList.remove('active');
 }
 let shoppingCart=document.querySelector('.shopping-cart');
 document.querySelector('#cart-btn').onclick=()=>{
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    Navbar.classList.remove('active');
 }

 let Navbar=document.querySelector('.navbar');
 document.querySelector('#menu-btn').onclick=()=>{
    Navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
   
 }

 window.onscroll=()=>{
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    Navbar.classList.remove('active');

 }

</script>







<


  <script>let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");

let classList = profileDropdownList.classList;

const toggle = () => classList.toggle("active");

window.addEventListener("click", function (e) {
  if (!btn.contains(e.target)) classList.remove("active");
});
</script>

</body>
</html>