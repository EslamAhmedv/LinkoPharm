<?php
include "../includes/db.php";

class adminmodel
{



    public static function addcustomer($firstname, $lastname, $username, $email, $gender, $password)
    {
        include "../includes/db.php";

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (firstname, lastname, username, email, gender, password)
        VALUES ('$firstname', '$lastname', '$username', '$email', '$gender', '$hashedPassword')";

        if (mysqli_query($conn, $query)) {
            return true; 
        } else {
            return false; 
        }
    }

    

}
