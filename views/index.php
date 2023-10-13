<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linko Pharm</title>
   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../public/css/homepage.css">
    <link rel="stylesheet" href="../public/css/chat.css">
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





<div class="chatbox-wrapper">
		<div class="chatbox-toggle">
			<i class='bx bx-message-dots'></i>
		</div>
		<div class="chatbox-message-wrapper">
			<div class="chatbox-message-header">
				<div class="chatbox-message-profile">
					<img src="../public/images/profile-pic.jpg" alt="" class="chatbox-message-image">
					<div>
						<h4 class="chatbox-message-name">user1</h4>
						<p class="chatbox-message-status">online</p>
					</div>
				</div>
				<div class="chatbox-message-dropdown">
					<i class='bx bx-dots-vertical-rounded chatbox-message-dropdown-toggle'></i>
					<ul class="chatbox-message-dropdown-menu">
						<li>
							<a href="#">Search</a>
						</li>
						<li>
							<a href="#">Report</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="chatbox-message-content">
				<h4 class="chatbox-message-no-message">You don't have message yet!</h4>

			</div>
			<div class="chatbox-message-bottom">
				<form action="#" class="chatbox-message-form">
					<textarea rows="1" placeholder="Type message..." class="chatbox-message-input"></textarea>
					<button type="submit" class="chatbox-message-submit"><i class='bx bx-send' ></i></button>
				</form>
			</div>
		</div>
	</div>
	<script src="../public/js/chat.js"></script>


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