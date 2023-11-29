<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">   
<meta name= "viewport" content="intial-scale=1.0,maximum-scale=1.0
,user-scalable=1">
<title>
    404 error
</title>
<link rel="stylesheet" type="text/css" href="../public/css/404error.css">
</head>

<body>
    <div class="container_404">
        <div class="left_404">
            <img src="../public/images/sadface.png">
            
</div>
<div class="right_404">
    <h3>OH NO!<span> 404</span></h3>
    <h1>Page Not Found</h1>
    <P><b>something went wrong.. try again later</b></p>
    <?php  if(isset($_SESSION['message'])){

           echo" <h4>".$_SESSION['message']."</h4>";
           unset($_SESSION['message']);
          
       }?>
</div>

</body>
</html>