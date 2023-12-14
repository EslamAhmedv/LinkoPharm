<?php
require_once '../controllers/productscontroller.php';

$productController = new ProductController();
$products = $productController->getAllProducts();

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Linko Pharm</title>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mr+De+Haviland" />
  <link rel="stylesheet" href="../public/css/categories.css">

  <link href="../public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="stylesheet" href="../public/css/homepage.css">


</head>


<body>

  <?php include('../partials/navbar.php'); ?>

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <video controls autoplay muted style="width: 100%; height: auto;">
          <source src="../public/images/slideshow1.mp4" type="video/mp4">
        </video>
        <div class="carousel-caption text-center">
          <img src="../public/images/Linko logo transperant.png" alt="" style="max-width: 200px; height: auto;" class="mx-auto">
          <p>THE SCIENCE FOR HEALTHIER LIVING</p>
          <p><a href="aboutus.php" class="btnnn">ABOUT US</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <video controls autoplay muted style="width: 100%; height: auto;">
          <source src="../public/images/slideshow2.mp4" type="video/mp4">
        </video>
        <div class="carousel-caption">
          <h5>SCIENCE, TECHNOLOGY AND INNOVATION</h5>

          <p><a href="#" class="btnnn">OUR RESEARCH</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <video controls autoplay muted style="width: 100%; height: auto;">
          <source src="../public/images/slideshow3.mp4" type="video/mp4">
        </video>
        <div class="carousel-caption">
          <h5>HIGH QUALITY PRODUCTS FOR EACH NEED</h5>
          <p><a href="products.php" class="btnnn">DISCOVER PRODUCTS</a></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <div class="start">
    <h6>The leading</h6>
    <h1 class="start-title">LINKO PHARM PHARMACEUTICALS</h1>
    <p>Your Beauty and Well-being, Our Commitment.</p>
  </div>



  <div class="section__container news__container">
    <h2 class="section__title">Latest Products</h2>

    <div class="container swiper">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <?php foreach ($products as $product) : ?>
            <a href="prodDetails.php?id=<?php echo $product['id']; ?>" class="product-link">
              <div class="card swiper-slide">
                <div class="image-box">
                  <img src="<?php echo $product['image']; ?>" alt="" />
            </a>
        </div>
        <div class="profile-details">
          <div class="name-job">
            <h3 class="name"><?php echo $product['name']; ?></h3>
            <h4 class="job"><?php echo $product['category']; ?></h4>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
  <div class="swiper-button-next swiper-navBtn"></div>
  <div class="swiper-button-prev swiper-navBtn"></div>
  <div class="swiper-pagination"></div>
  </div>
  </div>



  <section class="section__container sale__container">
    <h2 class="section__title">OUR CATEGORIES </h2>
    <div class="sale__grid">
      <div class="sale__card">
        <img src="../public/images/skin care.jpg" alt="sale" />
        <div class="sale__content">
          <p class="sale__subtitle">SKIN CARE</p>
          <h4 class="sale__title">sale <span>50% </span>off </h4>
          <p class="sale__subtitle">Dont miss</p>
          <button class="btnn sale__btnn">shop now </button>

        </div>
      </div>


      <div class="sale__card">
        <img src="../public/images/haircare.jpg" alt="sale" />
        <div class="sale__content">
          <p class="sale__subtitle">
            HAIR CARE</p>
          <h4 class="sale__title">sale <span>40% </span>off </h4>
          <p class="sale__subtitle">Dont miss</p>
          <button class="btnn sale__btnn">shop now </button>

        </div>
      </div>


      <div class="sale__card">
        <img src="../public/images/oral.jpg" alt="sale" />
        <div class="sale__content">
          <p class="sale__subtitle">ORAL CARE</p>
          <h4 class="sale__title">sale <span>40% </span>off </h4>
          <p class="sale__subtitle">Dont miss</p>
          <button class="btnn sale__btnn">shop now </button>

        </div>
      </div>

      <div class="sale__card">
        <img src="../public/images/nutrients.jpg" alt="sale" />
        <div class="sale__content">
          <p class="sale__subtitle">Nutrients</p>
          <h4 class="sale__title">sale <span>40% </span>off </h4>
          <p class="sale__subtitle">Dont miss</p>
          <button class="btnn sale__btnn">shop now </button>

        </div>
      </div>




      <div class="sale__card">
        <img src="../public/images/TOPICAL MUSCLE RELAXANTS.jpeg" alt="sale" />
        <div class="sale__content">
          <p class="sale__subtitle">TOPICAL MUSCLE RELAXANTS</p>
          <h4 class="sale__title">sale <span>40% </span>off </h4>
          <p class="sale__subtitle">Dont miss</p>
          <button class="btnn sale__btnn">shop now </button>

        </div>
      </div>


      <div class="sale__card">
        <img src="../public/images/ff.jpg" alt="sale" />
        <div class="sale__content">
          <p class="sale__subtitle">Feminine</p>
          <h4 class="sale__title">sale <span>40% </span>off </h4>
          <p class="sale__subtitle">Dont miss</p>
          <button class="btnn sale__btnn">shop now </button>

        </div>
      </div>



    </div>
  </section>




  <?php include('../partials/footer.php'); ?>

<button class="whatsapp_float" onclick="openForm()"><i class="fa-brands fa-whatsapp whatsapp-icon"></i></button> 
<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <label for="msg"><b>Message</b></label>
    <br>
    <br>
    <div class="containery">
   <img src="../public/images/logo.png" alt="Avatar">
   <p>Hello. How can we help you ?</p>

  <button class="whatsapp_float" onclick="openForm()"><i class="fa-brands fa-whatsapp whatsapp-icon"></i></button>
  <div class="chat-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
      <label for="msg"><b>Message</b></label>
      <br>
      <br>
      <div class="containery">
        <img src="../public/images/logo.png" alt="Avatar">
        <p>Hello. How can we help you ?</p>

      </div>
      <div class="containery darker">
        <p>Hey! </p>
        <p>I was asking about a product!</p>


      </div>
      <br>
      <a href="https:/wa.me/201066656123" target="_blank" button class="btn">Send
        us via WP
        </button> ></a>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
  </div>

  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>



</body>


<script src="../public/js/swiper-bundle.min.js"></script>
<script src="../public/js/swiper.js"></script>
<script src="../public/js/bootstrap.bundle.min.js"></script>
<script src="../public/js/chat.js"></script>


</html>