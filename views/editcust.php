<?php
require '../includes/db.php';

// Initialize user details
$userId = $firstName = $lastName = $userName = $email = $gender = $password = '';

if (isset($_POST['edituser'])) {
    updateUser();
}

function updateUser() {
    global $conn;

    $userId = $_POST['id'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    // nmn3 SQL injection
    $userId = mysqli_real_escape_string($conn, $userId);
    $firstName = mysqli_real_escape_string($conn, $firstName);
    $lastName = mysqli_real_escape_string($conn, $lastName);
    $userName = mysqli_real_escape_string($conn, $userName);
    $email = mysqli_real_escape_string($conn, $email);
    $gender = mysqli_real_escape_string($conn, $gender);
    $password = mysqli_real_escape_string($conn, $password);

    // Check if the user with the provided ID exists
    $user_query = "SELECT * FROM users WHERE id = $userId";
    $user_result = mysqli_query($conn, $user_query);

    if ($user_result && mysqli_num_rows($user_result) > 0) {


        $user_query = "UPDATE users SET firstname = '$firstName', lastname = '$lastName', username = '$userName', email = '$email', gender = '$gender', password = '$password' WHERE id = $userId";
        $user_query_run = mysqli_query($conn, $user_query);

        if ($user_query_run) {
            header("Location: editcust.php?id=$userId&message=User updated successfully");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "User not found";
    }
}

// Retrieve the user ID from the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    // 3lshan ageeb l user details
    $user_query = "SELECT * FROM users WHERE id = $userId";
    $user_result = mysqli_query($conn, $user_query);

    if ($user_result && mysqli_num_rows($user_result) > 0) {
        $user = mysqli_fetch_assoc($user_result);

        $firstName = $user['firstname'];
        $lastName = $user['lastname'];
        $userName = $user['username'];
        $email = $user['email'];
        $gender = $user['gender'];
    }
} else {
    echo "No user with this ID";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" />
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="../public/css/editdash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit User</title>
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
            <h1>Edit User</h1>
            <div class="adduser">
                <form class="form" method="POST">
                    <h2 class="title">Update User</h2>
                    <div class="user-container" style="display: block;">
                        <input type="hidden" name="id" value="<?php echo $userId; ?>">
                        <div class="input">
                            <label for="firstname">First Name</label>
                            <div><input type="text" id="firstname" placeholder="First Name" name="firstname" required value="<?php echo $firstName; ?>"></div>
                        </div>

                        <div class="input">
                            <label for="lastname">Last Name</label>
                            <div><input type="text" id="lastname" placeholder="Last Name" name="lastname" required value="<?php echo $lastName; ?>"></div>
                        </div>

                        <div class="input">
                            <label for="username">Username</label>
                            <div><input type="text" id="username" placeholder="Username" name="username" required value="<?php echo $userName; ?>"></div>
                        </div>

                        <div class="input">
                            <label for="email">Email</label>
                            <div><input type="email" id="email" placeholder="Email" name="email" required value="<?php echo $email; ?>"></div>
                        </div>

                        <div class="input">
                            <label for="gender">Gender</label>
                            <div><input type="text" id="gender" placeholder="Gender" name="gender" required value="<?php echo $gender; ?>"></div>
                        </div>

                        <div class="input">
                            <label for="password">Password</label>
                            <div><input type="password" id="password" placeholder="Password" name="password" required value=""></div>
                        </div>

                        <input type="submit" name="edituser" id="add" value="Update"></input>
                        <span>
                            <a href="editcust.php">Cancel</a>
                        </span>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
