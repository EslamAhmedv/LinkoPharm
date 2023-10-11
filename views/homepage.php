<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/homepage.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
</head>
<body>
 <div class="hero">
    <nav>
        <img src="../public/images/logo.png" class="logo">
        <ul>
            <li><a href="#">Wishlist</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Profile</a></li>
        </ul>
        
    <div class="profile-dropdown">
        <div onclick="toggle()" class="profile-dropdown-btn">
          <div class="profile-img">
            <i class="fa-solid fa-circle"></i>
          </div>

          <span>
         user1
            <i class="fa-solid fa-angle-down"></i>
          </span>
        </div>

        <ul class="profile-dropdown-list">
          <li class="profile-dropdown-list-item">
            <a href="dashborad.php">
              <i class="fa-regular fa-user"></i>
              Edit Profile
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-regular fa-envelope"></i>
              Inbox
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="#">
              <i class="fa-solid fa-chart-line"></i>
              Analytics
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
            <a href="#">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              Log out
            </a>
          </li>
        </ul>
      </div>
        <div>
            <a href="#" class="login-btn">Log in</a>
            <a href="#" class="btn">Download app</a>
        </div>
   


      </nav>






    <div class="content">
        <h1>Stay Home <br> & Order Online</h1>
        <p>
            Now you can shop online, select all what you need from the pharmacy through
             our online store on web or on mobile app., and we will deliver it to you directly from our diffuse branches.
        </p>
        <a href="#" class="btn">Join Now</a>
    </div>
    <!-- <img src="../public/images/doct.png.png" class="feature-img"> -->
 </div>

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