<html>
    <head>
        <title> Wishlist</title>
        <link rel="stylesheet" href="../public/css/wishlist.css">
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
            <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> 
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    </head>







    <?php
require_once '../controllers/CartController.php';
require_once '../controllers/productscontroller.php';
require_once("../controllers/UserController.php");
if (isset($_SESSION['auth_user'])) {
    $user_id = $_SESSION['auth_user']['user_id'];}
    else {
        // Set a default value for $user_id or handle the case where "auth_user" is not set
        $user_id = 0; // Set to a default value or use a value that makes sense in your context
    }
$cartController = new CartController();
$cartProducts = $cartController->getWishProducts($user_id);




if (isset($_POST['remove_item'])) {
    $itemIdToRemove = $_POST['remove_item'];
    $cartController->removewish($itemIdToRemove);
    // Optionally you can redirect the user or perform additional actions after removing the item
}




if (isset($_POST['remove_all'])) {
    $cartController->removeAllwish($user_id);
    // Optionally you can redirect the user or perform additional actions after removing all items
}





















if (isset($_SESSION['auth_user'])) {
   if(isset($_POST['SubmitButton'])){
       $user_id = $_SESSION['auth_user']['user_id'];
       $product_image = $_POST['image'];
       $product_name = $_POST['name'];
       $product_price = $_POST['price'];
       $product_quantity = $_POST['quantity'];
       $loginResult= $cartController->addToCart($user_id, $product_image,  $product_name, $product_price, $product_quantity);
       if ($loginResult ===  "Product added to cart!") {
        $successMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Product added to cart successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {
        $successMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Product already added to cart.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }


 
   }
 
}




?>






























    <body>




        
    <?php
include('../partials/navbar.php'); ?>
     <?php
    if (isset($successMessage)) {
        echo $successMessage;
    }
    ?>	
        <section id="wish">
   
           
            <h1>My Wishlist &#9829</h1>
            <div class = "wishTable">
                
                <table width="100%">

                    <tr>
                        <th>    </th>
                        <th>    </th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>    </th>
                       </tr>
                    
                    
                       <?php foreach ($cartProducts as $row) : ?>
                    <tr>   
                    <td>

                         <form action="" method="post">
                         <input type="hidden" name="remove_item" value="<?php echo htmlspecialchars($row['id']); ?>">
                              <button  type="submit">Delete</button></td>
                              </form>
                          
               </td>
                        <td><img src="<?php echo htmlspecialchars($row['image']); ?>"  width="100"height="100"></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?> </td>
                        <td>

                        <form action="" method="POST" class="single-product">
                     
                        <input type="hidden" name="image" value="<?php echo htmlspecialchars($row['image']); ?>">
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($row['name']); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($row['price']); ?>">
                        <input type="hidden" name="quantity" value="1">
                    
                              <button class ="add"  type="submit" name="SubmitButton">Add to cart</button></td>
                           
                              </form>
                    </tr>

                    <td>
                        
               </td>
                    <tr>   
                   
                       
                    </tr>
                    <?php endforeach; ?>
                </table> 
            </div>
            
            <form action="" method="POST">
    <input type="hidden" name="remove_all" value="1">
  

    <button class="delbutton">Delete All</button>
            </form>
           
               

            
            <?php
  include('../partials/footer.php');
  // include('../partials/chat.php'); 
  ?>

    </body>            
</html>               
          
       
     



      