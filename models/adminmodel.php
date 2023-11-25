<?php
include "../includes/db.php";

class adminmodel
{

    public static function addproduct($fileurl, $name, $availability, $price, $description, $category)
    {
        include "../includes/db.php";
        $query =  "INSERT INTO products (image, name, availability, price, description, category) VALUES ('$fileurl', '$name', '$availability', '$price', '$description', '$category')";
        mysqli_query($conn, $query);
    }
}
