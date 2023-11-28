<?php
require '../includes/db.php';
include "../controllers/adminfunctions.php";


$customerAdded = false;
if (isset($_POST['submit'])) {
    $customerAdded = addcustomer();
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

    <div id="successPopup" style="display: none; position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); background-color: green; color: white; padding: 20px; border-radius: 5px; font-size: 1.2em; z-index: 1000;">
    User added successfully!
</div>

<script src="../public/js/popup.js"></script>


        <?php if ($customerAdded) : ?>
    <script>
        showSuccessPopup(); 
    </script>
<?php endif; ?>

</body>
</html>
