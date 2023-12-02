<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Display</title>
  <link rel="stylesheet" href="../public/css/productslist.css">
</head>

<body>
  
<?php
include('../partials/navbar.php'); ?>



  <h1>Product Display</h1>
  <!-- Filter Form -->
<form id="filterForm">
    <label for="category">Category:</label>
    <select name="category" id="category">
        <option value="all">All</option>
        <option value="medicine">Medicine</option>
        <option value="equipment">Equipment</option>
        <!-- Add more options as needed -->
    </select>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" placeholder="Enter maximum price">

    <button type="button" onclick="applyFilter()">Filter</button>
</form>

<!-- Display Filtered Items -->
<div id="filteredItems">
    <?php
    // Fetch and display all items initially
    // Replace this with your actual PHP code to fetch items from the database
    //$allItems = getMedicalItemsFromDatabase();
    //displayMedicalItems($allItems);
    ?>
</div>
  <div class="product-container">
    <div class="card">
      <img src="../public/images/prod5-removebg-preview.png" alt="Denim Jeans" style="width:100%">
      <h1>Hair gel</h1>
      <p>Hair product</p>
      <p class="price">$200.99</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/wish2.webp" alt="Denim Jeans" style="width:100%">
      <h1>Sun screen</h1>
     <p>Skin product</p>
       <p class="price">$600</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod3-removebg-preview.png" alt="Denim Jeans" style="width:100%">
      <h1>Hair cream</h1>
      <p>Hair product</p>
      <p class="price">$360</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod1-removebg-preview.png" alt="Denim Jeans" style="width:100%">
      <h1>vitamin</h1>
      <p>Hair-skin product</p>
      <p class="price">$1200</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod4-removebg-preview.png" alt="Denim Jeans" style="width:100%">
      <h1>vitamin</h1>
      <p>Hair-skin product</p>
      <p class="price">$1600</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod8.png" alt="Denim Jeans" style="width:100%">
      <h1>Hair spray</h1>
      <p>Hair product</p>
       <p class="price">$500</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod7-removebg-preview.png" alt="Denim Jeans" style="width:100%">
      <h1>Body mist</h1>
      <p class="price">$340</p>
      <p>Skin product</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod2.png" alt="Denim Jeans" style="width:100%">
    <h1>Hair cream</h1>
      <p>Hair product</p>
      <p class="price">$360</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod10.png" alt="Denim Jeans" style="width:100%">
      <h1>Deodrant</h1>
      <p class="price">$240</p>
      <p>Skin product</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod9.png" alt="Denim Jeans" style="width:100%">
      <h1>Hair cream</h1>
      <p>Hair product</p>
      <p class="price">$460</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod6.png" alt="Denim Jeans" style="width:100%">
      <h1>Hair cream</h1>
      <p>Hair product</p>
      <p class="price">$860</p>
      <p><button>Add to Cart</button></p>
    </div>
    <div class="card">
      <img src="../public/images/prod12.png" alt="Denim Jeans" style="width:100%">
      <h1>vitamin</h1>
      <p>Hair-skin product</p>
      <p class="price">$2200</p>
      <p><button>Add to Cart</button></p>
    </div>
  </div>
  
  <script>
    function applyFilter() {
        // Fetch filter criteria
        var category = document.getElementById("category").value;
        var price = document.getElementById("price").value;

        // Make an AJAX request to the server to get filtered items
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("filteredItems").innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "filter.php?category=" + category + "&price=" + price, true);
        xhr.send();
    }

</script>
</body>

</html>