<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../public/css/homepage.css">
    <link rel="stylesheet" href="../public/css/confirmationpage.css">
    <title>Document</title>
</head>
<body>
<div class="hero">
    <nav>
        <a href="../views/index.php"><img src="../public/images/logo.png" class="logo"></a>
        <ul>
            <li><a href="#">Wishlist</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Profile</a></li>
        </ul>
        
    
        <div>
            <a href="#" class="login-btn">Log in</a>
            <a href="#" class="btn">Download app</a>
        </div>
   
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
            <a href="profile-edit.php">
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
      </nav>
    <center>
    <div class="container">
        <!-- <div class="Left"> -->
            <img class="check" src="../public/images/checked (1).png" alt="">
            <h1 >Thank you for your order!</h1>
            <p class="header">you order will be delivered within 2 days of your purchase</p>
            <h3>Your order number is</h3>
            <p>#987654</p>
            <a href="index.php">
            <button>
                <span>Continue Shopping</span>
            </button>
            </a>
        <!-- </div> -->
        <!-- <div class="right">
            <table style="width:100%">
            <tr>
                <td>Name:</td>
                <td>Your Name</td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>Your Phone Number</td>
            </tr>
            <tr>
                <td>City:</td>
                <td>Your City</td>
            </tr>
            <tr>
                <td>Address:</td>
                <td>Your Address</td>
            </tr>
            <tr>
                <td>Payment:</td>
                <td>Visa</td>
            </tr>
        </table>
        </div> -->
    </div>
    </center>
    <br>
</div>   
</body>
</html>