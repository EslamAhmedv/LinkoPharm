<html>
    <head>
        <title> Wishlist</title>
        <link rel="stylesheet" href="../public/css/wishlist.css">
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
            <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> 
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




// if (isset($_POST['remove_item'])) {
//     $itemIdToRemove = $_POST['remove_item'];
//     $cartController->removeItem($itemIdToRemove);
//     // Optionally you can redirect the user or perform additional actions after removing the item
// }




// if (isset($_POST['remove_all'])) {
//     $cartController->removeAllItems($user_id);
//     // Optionally you can redirect the user or perform additional actions after removing all items
// }

?>






























    <body>




        
    <?php
include('../partials/navbar.php'); ?>
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
                           <a href="">
                              <button>Delete</button></td>
                           </a>
               </td>
                        <td><img src="<?php echo htmlspecialchars($row['image']); ?>"  width="100"height="100"></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?> </td>
                        <td><a href="">
                              <button class ="add">Add to cart</button></td>
                           </a>
                    </tr>

                    <td>
                        
               </td>
                    <tr>   
                   
                       
                    </tr>
                    <?php endforeach; ?>
                </table> 
            </div>
            <a href="/deletewishlist">
                <button class="delbutton">Delete All</button>

            </a>

            <?php
  include('../partials/footer.php');
  // include('../partials/chat.php'); 
  ?>

    </body>            
</html>               
          
       
     



      