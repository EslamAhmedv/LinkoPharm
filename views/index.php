<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../public/css/homepage.css">
    <link rel="stylesheet" href="../public/css/chat.css">
    <link rel="stylesheet" href="../public/css/categories.css">
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
            <a href="userprofle.php">
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
        <div class="slideshow-container">

<div class="mySlides fade">
  
  <img src="../public/images/slide6.png" style="width:600px">
  
</div>

<div class="mySlides fade">
  
  <img src="../public/images/slide5.png.jpg" style="width:600px">
  
</div>

<div class="mySlides fade">
  
  <img src="../public/images/slide7.jpg" style="width:600px">

</div>

<div class="mySlides fade">
  
  <img src="../public/images/slide1.png.jpg" style="width:600px">

</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
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

<section class="section__container sale__container">
    <h2 class="section__title">OUR CATEGORIES </h2>
    <div class="sale__grid">
        <div class="sale__card">
        <img src="../public/images/medications.png.jpg" alt="sale" />
        <div class="sale__content">
            <p class="sale__subtitle">Medications </p>
            <h4 class="sale__title">sale <span>40% </span>off </h4>
            <p class="sale__subtitle">Dont miss</p>
            <button class="btnn sale__btnn">shop now </button>
            
    </div>
    </div>
    <div class="sale__card">
        <img src="../public/images/vitamines.png.jpg" alt="sale" />
        <div class="sale__content">
            <p class="sale__subtitle">Vitamines </p>
            <h4 class="sale__title">sale <span>40% </span>off </h4>
            <p class="sale__subtitle">Dont miss</p>
            <button class="btnn sale__btnn">shop now </button>
            
    </div>
    </div>

    <div class="sale__card">
        <img src="../public/images/haircare.png.jpg" alt="sale" />
        <div class="sale__content">
            <p class="sale__subtitle">Hair Care </p>
            <h4 class="sale__title">sale <span>40% </span>off </h4>
            <p class="sale__subtitle">Dont miss</p>
            <button class="btnn sale__btnn">shop now </button>
            
    </div>
    </div>
    <div class="sale__card">
        <img src="../public/images/skincare.png.jpg" alt="sale" />
        <div class="sale__content">
            <p class="sale__subtitle">Skin Care </p>
            <h4 class="sale__title">sale <span>40% </span>off </h4>
            <p class="sale__subtitle">Dont miss</p>
            <button class="btnn sale__btnn">shop now </button>
            
    </div>
    </div>
    <div class="sale__card">
        <img src="../public/images/medical.png.jpg" alt="sale" />
        <div class="sale__content">
            <p class="sale__subtitle">Medical Supplies </p>
            <h4 class="sale__title">sale <span>40% </span>off </h4>
            <p class="sale__subtitle">Dont miss</p>
            <button class="btnn sale__btnn">shop now </button>
            
    </div>
    </div>
    <div class="sale__card">
        <img src="../public/images/babyycare.png.webp" alt="sale" />
        <div class="sale__content">
            <p class="sale__subtitle">Baby Care </p>
            <h4 class="sale__title">sale <span>40% </span>off </h4>
            <p class="sale__subtitle">Dont miss</p>
            <button class="btnn sale__btnn">shop now </button>
            
    </div>
    </div>
    </div>   
 </section>

 <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>company</h4>
  	 			<ul>
  	 				<li><a href="#">about us</a></li>
  	 				<li><a href="#">our services</a></li>
  	 				<li><a href="#">privacy policy</a></li>
  	 				<li><a href="#">affiliate program</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">shipping</a></li>
  	 				<li><a href="#">returns</a></li>
  	 				<li><a href="#">order status</a></li>
  	 				<li><a href="#">payment options</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>online shop</h4>
  	 			<ul>
  	 				<li><a href="#">Hair Care</a></li>
  	 				<li><a href="#">Skin Care</a></li>
  	 				<li><a href="#">Medical Supplies</a></li>
  	 				<li><a href="#">Vitamines</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><img src="images/facebook.png"></i></a>
  	 				<a href="#"><img src="images/twitter.png"></a>
  	 				<a href="#"><img src="images/linkedd.png"></i></a>
  	 				<a href="#"><img src="images/instagram.webp"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
  
</body>
</html>