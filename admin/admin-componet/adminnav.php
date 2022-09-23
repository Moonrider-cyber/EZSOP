<nav>    
    <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header-title"><h3>Dashboard</h3></div>
            <div>Welcome <?php echo $_SESSION["name"] ?></div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="index.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">EZSOP</span> </a>
                    <div class="nav_list">
                        <a href="index.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="user.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>
                        <a href="products.php" class="nav_link"> <i class="fa-solid fa-box-open"></i> <span class="nav_name">Products</span> </a>
                        <a href="category.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Catagory</span> </a>
                        <a href="sub-category.php" class="nav_link"> <i class="fa-solid fa-tag"></i> <span class="nav_name">Sub-Category</span> </a>  <a href="orders.php" class="nav_link"> <i class="fa-solid fa-boxes-stacked"></i> <span class="nav_name">Orders</span> </a>
                        <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Reviews</span> </a>
                    </div>
                </div> 
                <a href="admin-componet/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        </nav>