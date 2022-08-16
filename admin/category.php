<?php include "../componet/conn.php" ?>
<?php
session_start();
if (!isset($_SESSION["adminlogin"])) {
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
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        table {
            align-items: center;
            margin-top: 50px;
            margin-bottom: 30px;
            /* background-color: #333; */
            color: black;
            font-size: 20px;
            /* box-shadow: 15px 15px 4px yellowgreen; */
        }

        .t_hading {
            height: 40px;
            text-align: center;
        }

        .t_hading th {
            text-align: center;
            border-bottom: 1px rgb(217, 220, 219) solid;
            font-size: 19px;
        }

        .t_body tr td {
            padding: 10px 30px;
            text-align: center;
            border-bottom: 0.1px rgb(217, 220, 219) solid;
            font-size: 18px;
        }

        .t_body tr td i {
            padding: 10px 15px;
            color: blue;
        }
    </style>
</head>

<body>

    <body id="body-pd">
    <nav>    
    <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header-title"><h3>Category</h3></div>
            <div>Welcome <?php echo $_SESSION["name"] ?></div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="index.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Website</span> </a>
                    <div class="nav_list">
                        <a href="index.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="user.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>
                        <a href="products.php" class="nav_link"> <i class="fa-solid fa-layer-group"></i> <span class="nav_name">Products</span> </a>
                        <a href="category.php" class="nav_link active"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Catagory</span> </a>
                        <a href="sub-category.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Sub-Category</span> </a>
                        <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Reviews</span> </a>
                    </div>
                </div> 
                <a href="admin-componet/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        </nav>
        <!--Container Main start-->
        <div class="height-100  container">
        <div class="add-product d-flex justify-content-end px-5">
            <a href="up-ins-del/add-category.php">
                       <button type="button" class="btn btn-warning">ADD CATEGORY</button>
                   </a>
            </div>
        <table align="center">
                <thead class="t_hading">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>SLUG</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="t_body">
                    
                    <?php
                    $select = "SELECT * FROM `product-catagory`;";

                    $q1 = mysqli_query($con, $select);
                    while ($rec = mysqli_fetch_array($q1)) {
                    ?>
                        <tr>
                            <td><?php echo $rec['cid']; ?></td>
                            <td><?php echo $rec['cname']; ?></td>
                            <td><?php echo $rec['slug']; ?></td>
                            
                            <td><a href="up-ins-del/update-cat.php?cid=<?php echo $rec['cid']; ?>">
                                <i class="fa-solid fa-pen-to-square" data-toggle="tooltip" data-placement="top" title="UPDATE"></i></a>
                            </td>
                            <td><a href="up-ins-del/catdelete.php?cid=<?php echo $rec['cid']; ?>">
                <i class="fa-regular fa-trash-can" data-toggle="tooltip" data-placement="top" title="DELETE"></i></a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
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