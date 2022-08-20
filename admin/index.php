<?php include "../componet/conn.php" ?>
<?php
session_start();
if (!isset($_SESSION["adminlogin"]) || $_SESSION["adminlogin"] == "adlogout") {
    header("location:admin-login.php");
}
?>
<?php
$sq1 = "SELECT * FROM users";
$sq1exc = mysqli_query($con, $sq1);
$totaluser = mysqli_num_rows($sq1exc);


$sq2 = "SELECT * FROM products";
$sq2exc = mysqli_query($con, $sq2);
$totalitems = mysqli_num_rows($sq2exc);

$sq3 = "SELECT * FROM `product-catagory`";
$sq3exc = mysqli_query($con, $sq3);
$totalcat = mysqli_num_rows($sq3exc);

$sq4 = "SELECT * FROM `sub-catagory`";
$sq4exc = mysqli_query($con, $sq4);
$totalsubcat = mysqli_num_rows($sq4exc);
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <body id="body-pd">
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
                        <a href="sub-category.php" class="nav_link"> <i class="fa-solid fa-tag"></i> <span class="nav_name">Sub-Category</span> </a>
                        
                    </div>
                </div> 
                <a href="admin-componet/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        </nav>

        <!--Container Main start-->
        <div>


            <div class="dashbord py-5">
                <div class="dash-card">
                    <div class="dash-icons">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="dash-desc">
                        <ul>
                            <li class="dash-label">Total Users</li>
                            <li class="dash-data"><?php echo $totaluser; ?></li>
                        </ul>
                    </div>


                </div>
                <div class="dash-card">
                    <div class="dash-icons">
                    <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div class="dash-desc">
                        <ul>
                            <li class="dash-label">Total Products</li>
                            <li class="dash-data"><?php echo $totalitems; ?></li>
                        </ul>
                    </div>
                </div>
                


            </div>
            <div class="dashbord">
            <div class="dash-card">
                    <div class="dash-icons">
                    <i class='bx bx-bookmark nav_icon'></i>
                    </div>
                    <div class="dash-desc">
                        <ul>
                            <li class="dash-label">Total Category</li>
                            <li class="dash-data"><?php echo $totalcat; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="dash-card">
                    <div class="dash-icons">
                    <i class="fa-solid fa-tag"></i>
                    </div>
                    <div class="dash-desc">
                        <ul>
                            <li class="dash-label">Total Sub-Category</li>
                            <li class="dash-data"><?php echo $totalsubcat; ?></li>
                        </ul>
                    </div>
                </div>
        </div>


        </div>
        <!--Container Main end-->

        <script>
            document.addEventListener("DOMContentLoaded", function(event) {

                const showNavbar = (toggleId, navId, bodyId, headerId) => {
                    const toggle = document.getElementById(toggleId),
                        nav = document.getElementById(navId),
                        bodypd = document.getElementById(bodyId),
                        headerpd = document.getElementById(headerId)

                    // Validate that all variables exist
                    if (toggle && nav && bodypd && headerpd) {
                        toggle.addEventListener('click', () => {
                            // show navbar
                            nav.classList.toggle('show')
                            // change icon
                            toggle.classList.toggle('bx-x')
                            // add padding to body
                            bodypd.classList.toggle('body-pd')
                            // add padding to header
                            headerpd.classList.toggle('body-pd')
                        })
                    }
                }

                showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

                /*===== LINK ACTIVE =====*/
                const linkColor = document.querySelectorAll('.nav_link')

                function colorLink() {
                    if (linkColor) {
                        linkColor.forEach(l => l.classList.remove('active'))
                        this.classList.add('active')
                    }
                }
                linkColor.forEach(l => l.addEventListener('click', colorLink))

            });
        </script>
    </body>

</html>