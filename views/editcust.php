<?php
require_once '../controllers/CustomerController.php';
$customerController = new CustomerController();

// Initialize customer details
$customerId = $firstName = $lastName = $userName = $email = $gender = '';

if (isset($_GET['id'])) {
    $customerId = $_GET['id'];
    $customer = $customerController->getCustomerById($customerId);

    if ($customer) {
        $firstName = $customer['firstname'];
        $lastName = $customer['lastname'];
        $userName = $customer['username'];
        $email = $customer['email'];
        $gender = $customer['gender'];
    } else {
        echo "No customer found with this ID";
    }
}

if (isset($_POST['edituser'])) {
    if ($customerController->updateCustomer()) {
        header("Location: custdash.php?message=User updated successfully");
        exit;
    } else {
        echo "Error updating the customer";
    }
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
    <title>Edit Customer</title>
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
            <h1>Edit Customer</h1>
            <div class="addprod">
                <form class="form" method="POST">
                    <h2 class="title">Update Customer</h2>
                    <div class="user-container" style="display: block;">
                        <input type="hidden" name="id" value="<?php echo $customerId; ?>">

                        <div class="input">
                            <label for="firstname">First Name</label>
                            <div><input type="text" id="firstname" name="firstname" required value="<?php echo $firstName; ?>"></div>
                        </div>

                        <div class="input">
                            <label for="lastname">Last Name</label>
                            <div><input type="text" id="lastname" name="lastname" required value="<?php echo $lastName; ?>"></div>
                        </div>

                        <div class="input">
                            <label for="username">Username</label>
                            <div><input type="text" id="username" name="username" required value="<?php echo $userName; ?>"></div>
                        </div>

                        <div class="input">
                            <label for="email">Email</label>
                            <div><input type="email" id="email" name="email" required value="<?php echo $email; ?>"></div>
                        </div>

                        <div class="input">
                            <label for="gender">Gender</label>
                            <div><input type="text" id="gender" name="gender" required value="<?php echo $gender; ?>"></div>
                        </div>

                        <input type="submit" name="edituser" id="add" value="Update"></input>
                        <span>
                            <a href="custdash.php">Cancel</a>
                        </span>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
