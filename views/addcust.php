<?php
require '../includes/db.php';

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    // hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $user_query = "INSERT INTO users (firstname, lastname, username, email, gender, password)
        VALUES ('$firstname', '$lastname', '$username', '$email', '$gender', '$password')";

    if (mysqli_query($conn, $user_query)) {
        header("Location: addcust.php?id=$id&message=user added successfully");
    } else {
        $errorMessage = "Error: " . $user_query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" />
    <link rel="stylesheet" href="../public/css/usermanagement.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="../public/css/editdash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add User</title>
</head>

<body>
    <div class="container">
        <aside>
            <?php
            $currentPage = 'custdash';
            include('../partials/dashboardsidebar.php');
            ?>
        </aside>

        <main>
            <h1>Users</h1>

            <div class="adduser">
                <form action="addcust.php" class="form" method="POST">
                    <h2 class="title">Add a User</h2>
                    <?php if (!empty($successMessage)) { ?>
                        <div class="success-message"><?php echo $successMessage; ?></div>
                    <?php } ?>
                    <div class="user-container" style="display: block;">
                        <div class="input">
                            <label for="firstname">First Name</label>
                            <div><input type="text" id="firstname" placeholder="First Name" name="firstname" required></div>
                        </div>

                        <div class="input">
                            <label for="lastname">Last Name</label>
                            <div><input type="text" id="lastname" placeholder="Last Name" name="lastname" required></div>
                        </div>

                        <div class="input">
                            <label for="username">Username</label>
                            <div><input type="text" id="username" placeholder="Username" name="username" required></div>
                        </div>

                        <div class="input">
                            <label for="email">Email</label>
                            <div><input type="email" id="email" placeholder="Email" name="email" required></div>
                        </div>

                        <div class="input">
                            <label for="gender">Gender</label>
                            <div><input type="text" id="gender" placeholder="Gender" name="gender" required></div>
                        </div>

                        <div class="input">
                            <label for="password">Password</label>
                            <div><input type="password" id="password" placeholder="Password" name="password" required></div>
                        </div>

                        <button type="submit" name="submit" id="add">Add</button>
                        <a href="addcust.php"><button id="cancel">Cancel</button></a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
