
<?php 
 include_once("../config/app.php");




?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
	  <link rel="stylesheet" href="../public/css/navbar.css">
    <script src="https://kit.fontawesome.com/f4bd0b4361.js" crossorigin="anonymous"></script>
	</head>


   
    
  

<body>










































   
<nav class="navbarr">
   
            

<img src="../public/images/logo.png" class="logom">


 
   <a href="#" class="toggle-button">
       <span class="bar"></span>
       <span class="bar"></span>
       <span class="bar"></span>
     </a>
     <div class="navbar-links">

   <ul>

       <li>
           <form action="/products/search" method="post">
           <input class="search" type="text" placeholder="Search Food" name="search">
        <button type="submit" style="background: orangered"><i class="fa-solid fa-magnifying-glass" id="q1" ></i></button> 
       </form>
       </li>
       


       <li class="part2"><a href="<?=base_url('index.php')?>">Home</a></li>
       <li class="part2"><a href="/products/All">Menu</a></li>
       <li class="part2" id="cart" onclick="dis()">

           <span id="notification">
             
           </span>
           <!-- <span style="position: relative; top: -20px;">0</span> -->
           <i class="fa-solid fa-cart-shopping">
           </i>


           <!-- onclick="check_out(event.target)" -->
           <!-- <div class="kk" >
               <div style="width: 98%;height: 78.5%;  overflow: auto; border: 1px solid rgb(23, 28, 100);" class="cc">
                   
               <%if(s.length>0){%>
               <% s.forEach( function(itemss) { %> 
                  
                   <div class ="art"><img src="<%-itemss.item.path%>"alt="" class="item_img" >
                       
                   <span class="s1"> <b>item name :</b> <%- itemss.item.name %></span>
                   <br>
                   <span class="s2"><b>Price : <%-itemss.item.price%> $ Qty : </b> <b class="qty1"><%-itemss.qty%></b> </span>
                   
               </div>  
               <% }); %>  
           </div>
           
<%}%>
<div style="border: 1px soild black ;" id="div-btn"> 
<a href="/products/cart/end/checkout" ><button id ="check_now" >CheckOut Now </button></a></div>

            </div> -->

           <!-- <div style="height: 90%; width: 80%; border: 1px solid black;"></div> -->
           
       </li>

      
           <li class="part2"><a class="sign" href="/customers/profile/login">
                
             login  </a></li>
          
               <li class="part2"><a class="sign" href="/customers/signin">Profile</a></li>
             
                 
   </ul>
</div>
</nav>









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