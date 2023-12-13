<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../controllers/CartController.php';
require_once '../controllers/OrdersController.php'; 
require_once '../controllers/UserController.php'; 
include('../controllers/api.php');


$cartController = new CartController();
$user_id = $_SESSION['auth_user']['user_id'] ?? 0; 
$cartProducts = $cartController->getCartProducts($user_id);

// Functions for tax and total calculations
function TaxCalculator($totalPrice)
{
  $sales_tax = $totalPrice * 0.14;
  return $sales_tax;
}

function TotalCalculator($cart)
{
  $totalPrice = 0;
  foreach ($cart as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
  }
  return $totalPrice;
}

function calculateTotalPrice($cartProducts)
{
  $totalPrice = 5; 
  foreach ($cartProducts as $row) {
    $totalPrice += ($row['price'] * $row['quantity']);
  }
  return $totalPrice;
}

// if (isset($_POST['update_cart'])) {
//   $cartController->updateCartItemQuantity();
//   header("Location: checkout.php");
//   exit;
// }

if (isset($_POST['remove_item'])) {
  $cartController->removeItem($_POST['remove_item']);
  header("Location: checkout.php");
  exit;
}


if (isset($_POST['remove_all'])) {
  $cartController->removeAllItems($user_id);
  header("Location: checkout.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['change_quantity'])) {
      $cartItemId = $_POST['item_id'];
      $newQuantity = $_POST['new_quantity'];
      if ($_POST['change_quantity'] === 'Decrease' && $newQuantity > 1) {
          $newQuantity--;
      } elseif ($_POST['change_quantity'] === 'Increase') {
          $newQuantity++;
      }
      $cartController->updateCartItemQuantity($cartItemId, $newQuantity);
      header("Location: checkout.php");
      exit;
  }}

$cart = $cartController->getCartProducts($user_id) ?? []; 

// Validation
// define variables and set to empty values

$Fname = $Lname = $Phone = $Address = $City = $NameCard = $CardNo = $ExDate = $CVC = "";
$FnameErr  = $LnameErr = $PhoneErr = $AddressErr = $CityErr = $NameCardErr = $CardNoErr = $ExDateErr = $CVCErr = "";
$Error=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // checks if cart empty or not if empty will display alert 

  if (!empty($cart)) {
    if (empty($_POST["Fname"]) || gettype($_POST["Fname"])!="string") {
      $FnameErr = "*First Name is required";
      $Error=true;
    } else {
      $Fname = str_replace(' ', '', $_POST["Fname"]);
    }

    if (empty($_POST["Lname"]) || gettype($_POST["Lname"])!="string") {
      $LnameErr = "*Last Name is required";
      $Error=true;
    } else {
      $Lname = str_replace(' ', '', $_POST["Lname"]);
    }
    
    $num_length = strlen((string)$_POST["Phone"]);
    if (empty($_POST["Phone"])) {
      $PhoneErr = "*Phone Number is required";
      $Error=true;
    } elseif ($num_length != 11) {
      $PhoneErr = "*The phone number must be eleven digits";
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

    $num_length = strlen((string)$_POST["CardNo"]);
    if (empty($_POST["CardNo"])) {
      $CardNoErr = "*Card number is required";
      $Error=true;
    } elseif ($num_length != 16) {
      $CardNoErr = "*The card number must be sixteen digits";
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

    $num_length = strlen((string)$_POST["CVC"]);
    if (empty($_POST["Phone"])) {
      $CVCErr = "*CVC is required";
      $Error=true;
    } elseif ($num_length != 3) {
      $CVCErr = "*The CVC must be three numbers";
      $Error=true;
    } else {
      $CVC = $_POST["CVC"];
    }
    if ($Error != true) {

      // Set user ID in session and assign it to a variable
      session_start();
      $_SESSION['user_id'] = $user->getId();
      $userid = $user->getId();

      // determine the date
      $orderDate = date("Y/m/d");

      // initiate status with (pending)
      $status = "pending";

      //c oncatenate first and last names
      $fullName = $Fname . " " . $Lname;

      // calculate total price
      $totalPrice = TotalCalculator($cart);

      // Add taxes to total price
      $gross_total = $totalPrice + TaxCalculator($totalPrice);

      // create new order model
      $OrdersModel = new OrdersModel();

      //checks if order added into DB
      if ($OrdersModel->addOrder($userid, $fullName, $Phone, $Address, $City, $orderDate, $status, $gross_total)) {

        //Send a confirmation message to the customer’s number
        message($Phone,$fullName,$totalPrice);

        // Redirect to the confirmation page
        header("Location:confirmationpage.php");
      }
    }
  } else {
    echo '<script>alert("Your cart is empty")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/checkout.css">
  <link rel="stylesheet" href="../public/css/cart.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <title>Checkout</title>
</head>

<body>
  <div class="hero">
    <?php include('../partials/navbar.php'); ?>

    <div class="container">
      <div class="checkoutLayout">
        <!-- Cart Display Section -->
        <div class="returnCart">
          <h1>List Products In Cart</h1>
          <div class="List">
    <?php foreach ($cartProducts as $row) : ?>
        <div class="item">
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="">
            <div class="item-info">
                <div class="name"><?php echo htmlspecialchars($row['name']); ?></div>
                <div class="price"><?php echo htmlspecialchars($row['price']); ?> EGP</div>
            </div>
            <div class="quantity-adjust">
                <form method="post" action="checkout.php">
                    <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="change_quantity" value="Decrease">-</button>
                    <input type="text" readonly name="new_quantity" value="<?php echo $row['quantity']; ?>">
                    <button type="submit" name="change_quantity" value="Increase">+</button>
                </form>
            </div>
            <form method="post" action="checkout.php">
                <button type="submit" name="remove_item" value="<?php echo $row['id']; ?>">×</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

          <a class="keepShopping" href="../views/index.php">Keep shopping</a>
        </div>


        <div class="right">
          <h1>CHECKOUT</h1>
          <h1 class="sInfo">Shipping information</h1>
          <form method="post">
            <div class="form">
              <div class="group">
                <label for="" class="text">First Name</label>
                <span class="error"><?php echo $FnameErr; ?></span>
                <input type="text" name="Fname" id="" placeholder="Your First Name">
              </div>
              <div class="group">
                <label for="" class="text">Last Name</label>
                <span class="error"><?php echo $LnameErr; ?></span>
                <input type="text" name="Lname" id="" placeholder="Your Last Name">
              </div>
              <div class="group">
                <label for="" class="text">Phone Number</label>
                <span class="error"><?php echo $PhoneErr; ?></span>
                <input type="tel" name="Phone" id="" placeholder="Your Phone Number">
              </div>
              <div class="group">
                <label for="" class="text">Address</label>
                <span class="error"><?php echo $AddressErr ?></span>
                <input type="text" name="Address" id="" placeholder="Your Address">
              </div>
              <div class="group">
                <label for="" class="text">City</label>
                <span class="error"><?php echo $CityErr; ?></span>
                <select name="City" id="">
                  <option value="">Choose..</option>
                  <option value="Alexandria">Alexandria</option>
                  <option value="Cairo">Cairo</option>
                  <option value="Giza">Giza</option>
                  <option value="Luxor">Luxor</option>
                </select>
              </div>
              <h1 class="details">Payment details</h1>
              <div></div>
              <div class="group">
                <label for="" class="text">Name on card</label>
                <span class="error"><?php echo $NameCardErr ?></span>
                <input type="text" name="NameCard" id="" placeholder="Your name and surname">
              </div>
              <div class="group">
                <label for="" class="text">Card number</label>
                <span class="error"><?php echo $CardNoErr; ?></span>
                <input type="text" name="CardNo" id="" placeholder="1111-2222-3333-4444">
              </div>
              <div class="group">
                <label for="" class="text">Expiring Date</label>
                <span class="error"><?php echo $ExDateErr; ?></span>
                <input type="text" name="ExDate" id="" placeholder="09-21">
              </div>
              <div class="group">
                <label for="" class="text">CVC</label>
                <span class="error"><?php echo $CVCErr ?></span>
                <input type="text" name="CVC" id="" placeholder="***">
              </div>
            </div>
            <div class="return">
              <div class="row">
                <div class="text">Total Quantity:</div>
                <div class="totalQuantity">
                  <?php
                  $totalQuantity = 0;
                  if (!empty($cart)) {
                    $totalQuantity = array_sum(array_column($cart, 'quantity'));
                  }
                  echo $totalQuantity;
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="text">Total:</div>
                <div class="Total">
                  <?php
                  $totalPrice = TotalCalculator($cart);
                  echo $totalPrice
                  ?> EGP
                </div>
              </div>
              <div class="row">
                <div class="text">Tax:</div>
                <div class="tax">
                  <?php
                  $totalPrice = TotalCalculator($cart);
                  $tax = TaxCalculator($totalPrice);
                  echo $tax
                  ?> EGP
                </div>
              </div>
              <div class="row">
                <div class="text">Gross Total:</div>
                <div class="GrossTotal">
                  <?php
                  $totalPrice = TotalCalculator($cart);
                  $gross_total = $totalPrice + TaxCalculator($totalPrice);
                  echo $gross_total
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