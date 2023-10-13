<hb>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/checkout.css">
    <link rel="stylesheet" href="../public/css/homepage.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <title>Checkout</title>
</style>
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
      </div>
      </nav>

        <div class="container">
            <div class="checkoutLayout">
                <div class="returnCart">
                    <a class="keepShopping" href="../views/index.php">Keep shopping</a>
                    <h1>List Products In Cart</h1>
                    <div class="list">
                        <div class="item">
                            <img src="../public/images/Sunblock_SPF60_120ml_1200x1200.webp" alt="">
                            <div class="info">
                                <div class="name">Product 1</div>
                                <div class="price">50 EGP</div>
                            </div>
                            <div class="quantity">2</div>
                            <div class="returnPrice">100 EGP</div>
                        </div>
                        <div class="item">
                            <img src="../public/images/376089-1.jpeg" alt="">
                            <div class="info">
                                <div class="name">Product 2</div>
                                <div class="price">80 EGP</div>
                            </div>
                            <div class="quantity">1</div>
                            <div class="returnPrice">80 EGP</div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <h1>CHECKOUT</h1>
                    <h1 class="sInfo">Shipping information</h1>
                    <div class="form">
                        <div class="group">
                            <label for="">First Name</label>
                            <input type="text" name="" id="" placeholder="Your First Name">
                        </div>
                        <div class="group">
                            <label for="">Last Name</label>
                            <input type="text" name="" id="" placeholder="Your Last Name">
                        </div>
                        <div class="group">
                            <label for="">Phone Number</label>
                            <input type="text" name="" id="" placeholder="Your Phone Number">
                        </div>
                        <div class="group">
                            <label for="">Address</label>
                            <input type="text" name="" id="" placeholder="Your Address">
                        </div>
                        <div class="group">
                            <label for="">City</label>
                            <select name="" id="">
                                <option value="">Choose..</option>
                                <option value="Cairo">Cairo</option>
                            </select>
                        </div>
                        <h1 class="details">Payment details</h1>
                        <div></div>
                        <div class="group">
                            <label for="">Name on card</label>
                            <input type="text" name="" id="" placeholder="Your name and surname">
                        </div>
                        <div class="group">
                            <label for="">Card number</label>
                            <input type="text" name="" id="" placeholder="1111-2222-3333-4444">
                        </div>
                        <div class="group">
                            <label for="">Expiring Date</label>
                            <input type="text" name="" id="" placeholder="09-21">
                        </div>
                        <div class="group">
                            <label for="">CVC</label>
                            <input type="text" name="" id="" placeholder="***">
                        </div>
                    </div>
                    <div class="return">
                        <div class="row">
                            <div>Total Quantity</div>
                            <div class="totalQuantity">3</div>
                        </div>
                        <div class="row">
                            <div>Total Price</div>
                            <div class="totalPrice">180 EGP</div>
                        </div>
                    </div>
                    <button class="buttonCheckout">
                        PLACE ORDER
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
    let profileDropdownList = document.querySelector(".profile-dropdown-list");
    let btn = document.querySelector(".profile-dropdown-btn"); 
    let classList = profileDropdownList.classList;
    const toggle = () => classList.toggle("active");
    window.addEventListener("click", function (e) {
        if (!btn.contains(e.target)) classList.remove("active");
        });
    </script>

    </body>
</html>