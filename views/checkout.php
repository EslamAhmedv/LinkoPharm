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
    <?php
    include('../partials/navbar.php');
    ?>
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
                            <label for="" class="text">First Name</label>
                            <input type="text" name="" id="" placeholder="Your First Name">
                        </div>
                        <div class="group">
                            <label for="" class="text">Last Name</label>
                            <input type="text" name="" id="" placeholder="Your Last Name">
                        </div>
                        <div class="group">
                            <label for="" class="text">Phone Number</label>
                            <input type="tel" name="" id="" placeholder="Your Phone Number">
                        </div>
                        <div class="group">
                            <label for="" class="text">Address</label>
                            <input type="text" name="" id="" placeholder="Your Address">
                        </div>
                        <div class="group">
                            <label for="" class="text">City</label>
                            <select name="" id="">
                                <option value="">Choose..</option>
                                <option value="Cairo">Cairo</option>
                            </select>
                        </div>
                        <h1 class="details">Payment details</h1>
                        <div></div>
                        <div class="group">
                            <label for="" class="text">Name on card</label>
                            <input type="text" name="" id="" placeholder="Your name and surname">
                        </div>
                        <div class="group">
                            <label for="" class="text">Card number</label>
                            <input type="text" name="" id="" placeholder="1111-2222-3333-4444">
                        </div>
                        <div class="group">
                            <label for="" class="text">Expiring Date</label>
                            <input type="text" name="" id="" placeholder="09-21">
                        </div>
                        <div class="group">
                            <label for="" class="text">CVC</label>
                            <input type="text" name="" id="" placeholder="***">
                        </div>
                    </div>
                    <div class="return">
                        <div class="row">
                            <div class="text">Total Quantity</div>
                            <div class="totalQuantity">3</div>
                        </div>
                        <div class="row">
                            <div class="text">Total Price</div>
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