<html>
    <head>
        <title> Wishlist</title>
        <link rel="stylesheet" href="../public/css/wishlist.css">
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
            <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> 
    </head>
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
                        <th>Stock status</th>
                        <th>Price</th>
                        <th>    </th>
                       </tr>
                    
                    
                      
                    <tr>   
                    <td>
                           <a href="">
                              <button>Delete</button></td>
                           </a>
               </td>
                        <td><img src="../public/images/prod5-removebg-preview.png"  width="100"height="100"></td>
                        <td>Gel</td>
                        <td>In Stock</td>
                        <td>$500</td>
                        <td><a href="">
                              <button class ="add">Add to cart</button></td>
                           </a>
                    </tr>

                    <td>
                        
               </td>
                    <tr>   
                   
                       
                    </tr>
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
          
       
     



      