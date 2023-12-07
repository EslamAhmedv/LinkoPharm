<?php
require_once '../controllers/CustomerController.php';

$customerController = new CustomerController();
$customers = $customerController->getAllCustomers();

if (isset($_POST['deleteUser'])) {
    $customerController->deleteCustomer();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../public/css/displayproducts.css">
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Customers</title>
</head>
<body>
    <div class="container">
        <aside>
            <?php
            $currentPage = 'custdash';
            include('../partials/dashboardsidebar.php');
            ?>
        </aside>
        <main class="table">
            <section class="theader">
                <h1>User Management</h1>
                <div class="search">
                    <input type="search" placeholder="Search existing users...">
                </div>
                <div class="add_user">
                    <a href="addcust.php">
                        <button class="btn add-product"><i class="fa fa-plus"></i> Add User</button>
                    </a>
                </div>
            </section>
            <section class="table_body">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $customer) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($customer['id']); ?></td>
                                <td><?php echo htmlspecialchars($customer['firstname']); ?></td>
                                <td><?php echo htmlspecialchars($customer['lastname']); ?></td>
                                <td><?php echo htmlspecialchars($customer['username']); ?></td>
                                <td><?php echo htmlspecialchars($customer['email']); ?></td>
                                <td><?php echo htmlspecialchars($customer['gender']); ?></td>
                                <td><?php echo ($customer['role'] == 1) ? 'Admin' : 'User'; ?></td>
                                <td>
                                    <a href="editcust.php?id=<?php echo $customer['id']; ?>">
                                        <button class="btn edit-user"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <form method="POST">
                                        <input type="hidden" name="userId" value="<?php echo $customer['id']; ?>">
                                        <button class="btn delete-user" type="submit" name="deleteUser"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
