<?php
include '../models/adminmodel.php';

function addproduct(){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $availability = $_POST['availability'];
    $file = $_FILES["image"];
    $uploaddirectory = "../public/uploads/";

    if (move_uploaded_file($file["tmp_name"], $uploaddirectory . $file["name"])) {

        $uploadedfileName = $file["name"];
        $fileurl = $uploaddirectory . $uploadedfileName;
        return adminmodel::addproduct($fileurl, $name, $availability, $price, $description, $category);

    } else {
        return false;

    }
    // $product_query = ("INSERT INTO products (image, name, availability, price, description, category) 
    //     VALUES ('$fileurl', '$name', '$availability', '$price', '$description', '$category')");
    // mysqli_query($conn, $product_query);

}




function addcustomer(){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $isAdded = adminmodel::addcustomer($firstname, $lastname, $username, $email, $gender, $password);

    if ($isAdded) {
        return true;

    } else {
        return false;
    }
}
?>