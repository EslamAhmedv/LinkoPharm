<?php
require_once("../models/UserModel.php");
$userModel = new UserModel();
$adminInfo = $userModel->getAdminInfo();
$totalUsers = $userModel->getTotalUsers();
require_once("../models/ordersmodel.php");
$orderModel = new ordersmodel();
$recentOrders = $orderModel->getRecentOrders(3);




require_once("../controllers/UserController.php");

// Create an instance of UserController
$userController = new UserController();
$isUserLoggedIn = isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
// Check if the user is logged in
if (!$isUserLoggedIn) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Get the user's ID
$userId = $_SESSION['auth_user']['user_id'];

// Get the user's role
$userRole = $userController->getUserRole($userId);

// Check if the user's role is not 1 (admin)
if ($userRole !== 1) {
    // If the user is not an admin, redirect to the homepage or another page
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" />
    <link rel="stylesheet" href="../public/css/dashboard.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <div class="container">
        <aside>
            <?php
            $currentPage = 'dashboard';
            include('../partials/dashboardsidebar.php');
            ?>
        </aside>

        <main>
            <h1>Dashboard</h1>
            <div class="date">
                <input type="date">
            </div>

            <div class="employer-info">
                <h2>Admin Information</h2>
                <p>Name: <?php echo $adminInfo['firstname'] . ' ' . $adminInfo['lastname']; ?></p>
                <p>Email: <?php echo $adminInfo['email']; ?></p>
            </div>

            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>City</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentOrders as $order) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['id']); ?></td>
                                <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['city']); ?></td>
                                <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                                <td><?php echo htmlspecialchars($order['status']); ?></td>
                                <td><?php echo htmlspecialchars($order['total_price']); ?></td>
                                <td class="primary">
                                    <a href="editorder.php?order_id=<?php echo urlencode($order['id']); ?>">Details</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="orderdash.php">Show All</a>
            </div>

        </main>
        <!-- end of main -->

        <div class="right">
            <div class="top">
                <!-- <button id="menu-btn">
                    <span class="material-symbols-sharp">menu</span>
                </button> -->
                <div class="theme-toggler">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo htmlspecialchars($adminInfo['firstname']); ?></b></p>
                        <small class="text-muted">Admin</small>

                    </div>
                    <div class="profile-photo">

                        <!-- 3lshan ahot profile pic ba3den -->

                    </div>
                </div>
            </div>
            <!-- end of top -->




            <div class="left">
                <h2 class="customers-title">Total number of customers</h2>
                <h1 class="total-customers"><?php echo htmlspecialchars($totalUsers); ?></h1>
            </div>


            <div class="sales-analytics">
                <div class="item customers">
                    <div class="icon"><span class="material-symbols-sharp">person</span></div>
                    <div class="right">
                        <div class="info">
                            <a href="custdash.php">
                                <h3>Check New CUSTOMERS</h3>
                            </a>
                        </div>
                    </div>
                </div>





                <div class="item add-product">
                    <div>
                        <span class="material-symbols-sharp">add</span>
                        <a href="editproducts.html">Add Product</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script>
        const themeToggler = document.querySelector(".theme-toggler");

        //shaghal l darkmode
        themeToggler.addEventListener('click', () => {
            document.body.classList.toggle('dark-theme-variables');
            themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
            themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
        })
    </script>
</body>

</html>