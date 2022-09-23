<?php include "../componet/conn.php" ?>
<?php
session_start();
if (!isset($_SESSION["adminlogin"])) {
    header("location:admin-login.php");
}
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
            <div class="header-title"><h3>Products</h3></div>
            <div>Welcome <?php echo $_SESSION["name"] ?></div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="index.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">EZSOP</span> </a>
                    <div class="nav_list">
                        <a href="index.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="user.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>
                        <a href="products.php" class="nav_link active"> <i class="fa-solid fa-box-open"></i> <span class="nav_name">Products</span> </a>
                        <a href="category.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Catagory</span> </a>
                        <a href="sub-category.php" class="nav_link"> <i class="fa-solid fa-tag"></i> <span class="nav_name">Sub-Category</span> </a>  <a href="orders.php" class="nav_link"> <i class="fa-solid fa-boxes-stacked"></i> <span class="nav_name">Orders</span> </a>
                        
                    </div>
                </div> 
                <a href="admin-componet/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        </nav>
        <!--Container Main start-->
        <div class="main-container container py-5">
            <!-- <h2>Manage Products</h2> -->
            
            <div class="add-product">
            <a href="up-ins-del/add-product.php">
                       <button type="button" class="btn btn-warning">ADD PRODUCT</button>
                   </a>
            </div>

            <div class="manage-product container">
                <table align="center">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>DESCRIPTION</th>
                        <th>CATEGORY ID</th>
                        <th>SUB-CATEGORY ID</th>
                        <th>PRICE</th>
                        <th>Disable/Enable</th>
                        <th>Update</th>
                        <!-- <th>Delete</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                        <?php include "../componet/conn.php" ?>
                    <?php
                    $select = "SELECT * FROM `products`";

                    $q1 = mysqli_query($con, $select);

                    while ($rec = mysqli_fetch_array($q1)) {
                    ?>
                        <tr>
                            <td><?php echo $rec['pid']; ?></td>
                            <td><?php echo $rec['pname']; ?></td>
                            <td> <p class="pro-desc"><?php echo $rec['desc']; ?></p></td>
                            <td><?php echo $rec['cid']; ?></td>
                            <td><?php echo $rec['subid']; ?></td>
                            <td><?php echo $rec['price']; ?></td>
                            <td>
                                <a href="up-ins-del/dis-enb.php?pid=<?php echo $rec['pid'] ?>">
                                <button type="submit" class="btn btn-<?php if($rec['status'] == 1){ echo 'danger'; }else{ echo 'primary'; } ?> disbtn" name="disbtn">
                                    <?php if($rec['status'] == 1){ echo 'Enable'; }else{ echo 'Disable'; } ?>    
                                </button>
                                </a>
                            </td>
                            <td class="item-icons"><a href="up-ins-del/update-product.php?upid=<?php echo $rec["pid"] ?>">
                            <i class="fa-solid fa-pen-to-square" data-toggle="tooltip" data-placement="top" title="UPDATE"></i>
                            </a></td>
                            

                            <!-- <td class="item-icons"><a onclick="return checkdel()" href="up-ins-del/productdelete.php?pid=<?php //echo $rec['pid']; ?> ">
                            <i class="fa-regular fa-trash-can" data-toggle="tooltip" data-placement="top" title="DELETE"></i>
                            </a></td> -->
                        </tr>
                    <?php
                    } ?>
                        </tr>
                    </tbody>
                </table>
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

                
                    if (toggle && nav && bodypd && headerpd) {
                        toggle.addEventListener('click', () => {
  
                            nav.classList.toggle('show')
  
                            toggle.classList.toggle('bx-x')
          
                            bodypd.classList.toggle('body-pd')
            
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


            function checkdel() {
                if (confirm('Are you sure you want to delete this product?')) {
                    return true
                } else {
                    return false
                }

            }
        </script>
    </body>

</html>