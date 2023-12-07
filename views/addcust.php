<?php
require_once '../controllers/CustomerController.php';

$customerController = new CustomerController();
$customerAdded = false;

if (isset($_POST['submit'])) {
    $customerAdded = $customerController->addCustomer();
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
    <title>Add User</title>
</head>

<body>
    <div class="container">
        <aside>
            <?php
            $currentPage = 'custdash';

            include('../partials/dashboardsidebar.php'); ?>
        </aside>

        <main>
            <h1>Add User</h1>
            <div class="adduser">
                <form action="addcust.php" class="form" method="POST">
                    <h2 class="title">Add a User</h2>
                    <div class="user-container">
                        <div class="input">
                            <label for="firstname">First Name</label>
                            <div><input type="text" id="firstname" name="firstname" placeholder="First Name" required></div>
                        </div>

                        <div class="input">
                            <label for="lastname">Last Name</label>
                            <div><input type="text" id="lastname" name="lastname" placeholder="Last Name" required></div>
                        </div>

                        <div class="input">
                            <label for="username">Username</label>
                            <div><input type="text" id="username" name="username" placeholder="Username" required></div>
                        </div>

                        <div class="input">
                            <label for="email">Email</label>
                            <div><input type="email" id="email" name="email" placeholder="Email" required></div>
                        </div>

                        <div class="input">
                            <label for="gender">Gender</label>
                            <div><input type="text" id="gender" name="gender" placeholder="Gender" required></div>
                        </div>

                        <div class="input">
                            <label for="password">Password</label>
                            <div><input type="password" id="password" name="password" placeholder="Password" required></div>
                        </div>

                        <button type="submit" name="submit" id="add">Add</button>
                        <a href="custdash.php"><button id="cancel" type="button">Cancel</button></a>
                    </div>
                </form>
            </div>

            <div id="successPopup" style="display: none; position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); background-color: green; color: white; padding: 20px; border-radius: 5px; font-size: 1.2em; z-index: 1000;">
                User added successfully!
            </div>
        </main>
    </div>

    <script>
        <?php if ($customerAdded) : ?>
            document.getElementById('successPopup').style.display = 'block';
            setTimeout(function() {
                document.getElementById('successPopup').style.display = 'none';
            }, 3000);
        <?php endif; ?>
    </script>
</body>

</html>