        <!-- sidebar start -->
        <aside>
            <div class="top">
                <div class="logo">
                    <a href="index.php"> <img src="../public/images/Linko logo transperant.png" alt="">
                    </a>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="dashboard.php" class="<?php echo ($currentPage === 'dashboard') ? 'active' : ''; ?>"><span class="material-symbols-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="custdash.php" class="<?php echo ($currentPage === 'custdash') ? 'active' : ''; ?>"><span class="material-symbols-sharp">person</span>
                    <h3>Customers</h3>
                </a>
                <a href="orderdash.php" class="<?php echo ($currentPage === 'ordersdash') ? 'active' : ''; ?>"><span class="material-symbols-sharp">receipt_long</span>
                    <h3>Orders</h3>
                </a>
                <!-- <a href="" class="<?php echo ($currentPage === 'employersdash') ? 'active' : ''; ?>"><span class="material-symbols-sharp">business</span>
                    <h3>Employers</h3>
                </a> -->
                <a href=""><span class="material-symbols-sharp">chat</span>
                    <h3>Chat</h3><span class="message-count">3</span>
                </a>
                <a href="displayproducts.php" class="<?php echo ($currentPage === 'displayproducts') ? 'active' : ''; ?>"><span class="material-symbols-sharp">inventory</span>
                    <h3>Products</h3>
                </a>
                <!-- <a href="" class="<?php echo ($currentPage === 'reports') ? 'active' : ''; ?>"><span class="material-symbols-sharp">report</span>
                    <h3>Reports</h3>
                </a>-->
                <a href="" class="<?php echo ($currentPage === 'settings') ? 'active' : ''; ?>"><span class="material-symbols-sharp">Settings</span>
                    <h3>Settings</h3>
                </a>
                <a href="index.php" class="<?php echo ($currentPage === 'home') ? 'active' : ''; ?>">
                    <span class="material-symbols-sharp">home</span>
                    <h3>Return to Homepage</h3>
                </a>
                <a href="logout.php"><span class="material-symbols-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
                

            </div>
        </aside>
        <!-- sidebar end -->