<?php
require '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["password_confirm"];

    $errors = [];

    // Validate input data
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($confirmpassword)) {
        $errors[] = "All fields are required";
    }

    if ($password !== $confirmpassword) {
        $errors[] = "Passwords do not match";
    }

    if (count($errors) == 0) {
        // Check for duplicate username or email
        $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            $errors[] = "Username or Email already exists";
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $query = "INSERT INTO users (firstname, lastname, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$hashed_password')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registered successfully');</script>";
                // You can redirect the user to the login page here if needed.
            } else {
                echo "<script>alert('Registration failed. Please try again.');</script>";
            }
        }
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../public/css/register.css">
</head>
<body>
    <div class="container">
        <h2>Registration</h2>
        <form method="POST" autocomplete="off">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" required>
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" required>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="password_confirm">Confirm Password:</label> 
            <input type="password" name="password_confirm" required> 
            <button type="submit" name="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>
</body>
</html>
