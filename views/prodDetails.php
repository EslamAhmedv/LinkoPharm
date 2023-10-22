<hb>
<?php
// Assuming you have a product object with details
$product = [
    'name' => 'Bioderma Photoderm Max Tinted Aquafluid Light Color SPF 50+ - 40ml',
    'price' => 950.00,
    'description' => 'Sun protection products',
    'code' => 376089,
    'image' => '../public/images/bioderma-photoderm-max-tinted-aquafluid-light-color-spf-50-40ml-782493.webp',
    'information' =>'Bioderma Photoderm Max Tinted Aquafluid SPF 50+ offers a very high UVA/UVB anti-shine protection 
    evens out the complexion with a tinted light color. Pleasant and easy application thanks to a fluid texture as light 
    as water Dry touch finish Ideal for all skin types, even combination to oily skin, sensitive skin or intolerant to all 
    types of sunlight, very fair skin with freckles, skin exposed to maximum sunlight Oil-free formula - Non-greasy texture 
    Good skin tolerance - Non comedogenic - Unfragranced - Water resistant. A unique technological achievement combining extreme 
    fluidity with a dry touch finish and very high protection. With an association of UVA/UVB filters Photoderm MAX Aquafluide 
    offers optimised protection against the harmful effects of UV rays (sunburn, sun allergies, etc.) combined with an internal 
    biological protection: the Cellular Bio protection patent. This patent activates the natural defences, protects cells and prevents 
    premature skin ageing. Synergetic combination of 3 powders that gives a mattifying dry touch finish.'
];
?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/prodDetails.css">
    <link rel="stylesheet" href="../public/css/homepage.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <title>Product details - <?php echo $product['name']; ?></title>
</style>
</head>
<body>
    <div class="hero">
    <?php
    include('../partials/navbar.php');
    ?>
        <div class="mainContainer">
            <div class="container">
                <div class="left">
                    <a class="back" href="../views/index.php">Back</a>
                    <div class="productInfo">
                        <h1 class="product-name"><?php echo $product['name']; ?> &reg;</h1>
                        <p class="product-price">Price: <?php echo $product['price']; ?> EGP</p>
                        <div class="availability">
                        <div class="product-availability"></div>
                        <p class="stock">In Stock</p>
                        </div>
                        <p class="product-code">Product code: <?php echo $product['code']; ?></p>
                        <p class="product-description">Category: <?php echo $product['description']; ?></p>
                        <button type="button" class="button">
                            <span class="button__text">ADD TO CART</span>
                            <span class="button__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" 
                            viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" 
                            stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12">
                            </line><line y2="12" y1="12" x2="19" x1="5"></line></svg>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="right">
                    <img id="myImg" class="product-image" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                </div>
            </div>
        </div>
        <div class="product-info">
            <h1 class="prodinfo">Product information:</h1>
            <br>
            <p><?php echo $product['information']; ?></p>
        </div>
        <br>
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() { 
            modal.style.display = "none";
        }
    </script>
</body>
</html>