<?php
// Assuming you have a cart array with products details

$cart = array(
  array(
    'name' => 'Bioderma Photoderm Max Tinted Aquafluid Light Color SPF 50+ - 40ml',
    'price' => 900.00,
    'quantity' =>2,
    'description' => 'Sun protection products',
    'code' => 376089,
    'image' => '../public/images/bioderma-photoderm-max-tinted-aquafluid-light-color-spf-50-40ml-782493.webp'
    ),
  array(
    'name' => 'prod2',
    'price' => 500.00,
    'quantity' =>3,
    'description' => '---',
    'code' => 376080,
    'image' => '../public/images/376089-1.jpeg'
    )
  );


// Validation
// define variables and set to empty values

$Fname = $Lname = $Phone = $Address = $City = $NameCard = $CardNo = $ExDate = $CVC = "";
$FnameErr  = $LnameErr = $PhoneErr = $AddressErr = $CityErr = $NameCardErr = $CardNoErr = $ExDateErr = $CVCErr = "";
$Error=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // checks if cart empty or not if empty will display alert 

  if (!empty($cart)) {
    if (empty($_POST["Fname"])) {
      $FnameErr = "*First Name is required";
      $Error=true;
    } else {
      $Fname = $_POST["Fname"];
    }

    if (empty($_POST["Lname"])) {
      $LnameErr = "*Last Name is required";
      $Error=true;
    } else {
      $Lname = $_POST["Lname"];
    }
    
    if (empty($_POST["Phone"])) {
      $PhoneErr = "*Phone Number is required";
      $Error=true;
    } else {
      $Phone = $_POST["Phone"];
    }

    if (empty($_POST["Address"])) {
      $AddressErr = "*Address is required";
      $Error=true;
    } else {
      $Address = $_POST["Address"];
    }

    if (empty($_POST["City"])) {
      $CityErr = "*City is required";
      $Error=true;
    } else {
      $City = $_POST["City"];
    }

    if (empty($_POST["NameCard"])) {
      $NameCardErr = "*Name on card is required";
      $Error=true;
    } else {
      $NameCard = $_POST["NameCard"];
    }

    if (empty($_POST["CardNo"])) {
      $CardNoErr = "*Card number is required";
      $Error=true;
    } else {
      $CardNo = $_POST["CardNo"];
    }

    if (empty($_POST["ExDate"])) {
      $ExDateErr = "*Expiring Date is required";
      $Error=true;
    } else {
      $ExDate = $_POST["ExDate"];
    }

    if (empty($_POST["CVC"])) {
      $CVCErr = "*CVC is required";
      $Error=true;
    } else {
      $CVC = $_POST["CVC"];
    }
    if ($Error!=true) {

    }
  }
  else {
    echo '<script>alert("Your cart is empty")</script>';
  }
  
}
?>

<hb>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/checkout.css">
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
                        <!-- checks if cart empty or not, if empty will display "Your cart is empty!", if not will display products-->
                        <?php 
                          if (empty($cart)) {
                            echo "<h2> Your cart is empty! </h2>";
                          } else {
                            foreach ($cart as $item) {
                              echo 
                              '<div class="item">
                                <img src="' . $item['image'] . '" alt="">
                                <div class="info">
                                  <div class="name">' . $item['name'] . '</div>
                                  <div class="price">' . $item['price'] . ' EGP</div>
                                </div>
                                <div class="quantity">' . $item['quantity'] . '</div>
                                <div class="returnPrice">' . ($item['price'] * $item['quantity']) . ' EGP</div>
                              </div> ';
                            }
                          } 
                        ?>     
                    </div>
                </div>
                <div class="right">
                    <h1>CHECKOUT</h1>
                    <h1 class="sInfo">Shipping information</h1>
                    <form method="post"> 
                    <div class="form">
                        <div class="group">
                            <label for="" class="text">First Name</label>
                            <div class="error"><?php echo $FnameErr;?></div>
                            <input type="text" name="Fname" id="" placeholder="Your First Name">
                        </div>
                        <div class="group">
                            <label for="" class="text">Last Name</label>
                            <div class="error"><?php echo $LnameErr;?></div>
                            <input type="text" name="Lname" id="" placeholder="Your Last Name">
                        </div>
                        <div class="group">
                            <label for="" class="text">Phone Number</label>
                            <div class="error"><?php echo $PhoneErr;?></div>
                            <input type="tel" name="Phone" id="" placeholder="Your Phone Number">
                        </div>
                        <div class="group">
                            <label for="" class="text">Address</label>
                            <div class="error"><?php echo $AddressErr?></div>
                            <input type="text" name="Address" id="" placeholder="Your Address">
                        </div>
                        <div class="group">
                            <label for="" class="text">City</label>
                            <div class="error"><?php echo $CityErr;?></div>
                            <select name="City" id="">
                                <option value="">Choose..</option>
                                <option value="Cairo">Cairo</option>
                            </select>
                        </div>
                        <h1 class="details">Payment details</h1>
                        <div></div>
                        <div class="group">
                            <label for="" class="text">Name on card</label>
                            <div class="error"><?php echo $NameCardErr?></div>
                            <input type="text" name="NameCard" id="" placeholder="Your name and surname">
                        </div>
                        <div class="group">
                            <label for="" class="text">Card number</label>
                            <div class="error"><?php echo $CardNoErr;?></div>
                            <input type="text" name="CardNo" id="" placeholder="1111-2222-3333-4444">
                        </div>
                        <div class="group">
                            <label for="" class="text">Expiring Date</label>
                            <div class="error"><?php echo $ExDateErr;?></div>
                            <input type="text" name="ExDate" id="" placeholder="09-21">
                        </div>
                        <div class="group">
                            <label for="" class="text">CVC</label>
                            <div class="error"><?php echo $CVCErr?></div>
                            <input type="text" name="CVC" id="" placeholder="***">
                        </div>
                    </div>
                    <div class="return">
                        <div class="row">
                            <div class="text">Total Quantity</div>
                            <div class="totalQuantity">
                              <?php 
                              $totalQuantity = array_sum(array_column($cart, 'quantity'));
                              echo $totalQuantity
                              ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text">Total Price</div>
                            <div class="totalPrice">
                            <?php 
                              $totalPrice = 0;
                              foreach ($cart as $item) {
                                $totalPrice += $item['price'] * $item['quantity'];
                              }
                              echo $totalPrice
                            ?> EGP
                            </div>
                        </div>
                    </div>
                    <button class="buttonCheckout" type="submit">
                        PLACE ORDER
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>