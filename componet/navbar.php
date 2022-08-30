<?php
    if(isset($_SESSION["login"])){
        $name = $_SESSION["username"];
    }
?>

<nav>
        <section class="full-navbar">
            <div class="navbar">
                <div class="navbar-left">
                    <h1 class="websitelogo"><a href="index.php">EZSOP</a></h1>
                    <div class="serchbox">
                        <form action="searchresult.php" method="get">
                        <input type="search" placeholder="Search..." name="search" id="product-search">
                        <button class="fa-solid fa-magnifying-glass icon">
                        </button>
                        </form>
                    </div>
                </div>
                <div class="bs-nav">
                    <ul class="nav-links">
                        
                    
                    <?php  
                        if(isset($_SESSION["login"])){
                            if($_SESSION["login"] == true){
                            ?> 
                                <li class="nav-link nav-loggd">
                                    <a>
                                        <i class="far fa-user"></i>
                                        <span class="nav-link-text"><?php echo $name ?></span> 
                                    </a>
                                    
                                    <div class="navdropbar">
                                    <div class="navdropdown">
                                        <ul class="navdropdown-list">
                                            <li class="navdropdown-link">
                                            <a href="#">    
                                                <i class="fa-solid fa-user"></i>
                                                <span>Profile</span>
                                            </a>
                                            </li>
                                            <li class="navdropdown-link">
                                            <a href="componet/userlogout.php">    
                                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                                <span>Log out</span>
                                                </a>
                                            </li>
                                        </ul>   
                                    </div>
                                    </div>
                                    
                                </li> 
                                <?php
                            }else{
                                echo '  
                                <li class="nav-link">
                                    <a href="login.php">
                                        <i class="far fa-user"></i>
                                            <span class="nav-link-text">Log In</span> 
                                    </a>
                                </li> ';
                                }
                        }else{
                            echo '  
                                <li class="nav-link">
                                    <a href="login.php">
                                        <i class="far fa-user"></i>
                                            <span class="nav-link-text">Log In</span> 
                                    </a>
                                </li> '; 
                        }
                                ?>
                            
                                
                           
                        <li class="nav-link">
                            <a href="#">
                                <i class="far fa-heart"></i>
                                <span class="nav-link-text">favorites(0)</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="my-cart.php">
                                <img src="img/shopping-cart.png" alt="">
                                <?php 
                                if(isset($_SESSION['id'])){
                                    $getcartnum = "select * from mycart where userid={$_SESSION['id']}";
                                    $exccartnum = $con->query($getcartnum);
                                    $itemnum = mysqli_num_rows($exccartnum);
                                    ?> 
                                    <span class="nav-link-text">(<?php echo $itemnum; ?>)</span> <?php
                                }else{
                                ?> <span class="nav-link-text">(0)</span>
                                <?php }
                                ?>
 
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="ss-nav">

                    <ul class="res-nav-links">
                        <li class="nav-link">
                            <a href="my-cart.php">
                                <img src="img/shopping-cart.png" alt="">
                                <?php 
                                if(isset($_SESSION['id'])){
                                    ?> 
                                    <span class="nav-link-text"><?php echo $itemnum; ?></span> <?php
                                }else{
                                ?> <span class="nav-link-text">0</span>
                                <?php }
                                ?>
                                
                            </a>
                        </li>
                        <li class="nav-link" id="nav-menu-bar">
                            <button id="nav-menu" class="nav-open">
                                <i class="fa-solid fa-bars bars"></i>
                            </button>
                            <button id="nav-menu" class="nav-close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="res-nav">
                <div class="ss-serchbox">
                    <form action="searchresult.php" method="get">
                        <input type="search" placeholder="Search..." name="search" id="product-search">
                        <button class="fa-solid fa-magnifying-glass icon" type="submit">
                        </button>
                    </form>
                </div>
                <ul class="nav-links-menu">

                    <?php  
                        if(isset($_SESSION["login"])){
                            ?>
                            <li class="nav-link-menu">
                                <a>
                                    <i class="far fa-user"></i>
                                    <span class="nav-link-text"><?php echo $name; ?></span> 
                                </a>
                                <div class="navdropbar">
                                    <div class="navdropdown">
                                        <ul class="navdropdown-list">
                                            <li class="navdropdown-link">
                                                <i class="fa-solid fa-user"></i>
                                                <a href="#">Profile</a>
                                            </li>
                                            <li class="navdropdown-link">
                                                <a href="componet/userlogout.php">
                                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                                Log out
                                                </a>
                                            </li>
                                        </ul>   
                                    </div>
                                    </div>
                            </li>
                            <?php
                        }
                        else{
                            echo 
                                ' <li class="nav-link-menu">
                                    <a href="login.php">
                                        <i class="far fa-user"></i>
                                        <span class="nav-link-text">Log In</span>
                                    </a>
                                </li>';

                        }

                    ?>
                    <li class="nav-link-menu">
                        <a href="#">
                            <i class="far fa-heart"></i>
                            <span class="nav-link-text">favorites(0)</span>
                        </a>

                    </li>
                </ul>
                <div class="sub-nav">
                    <ul class="sub-nav-links">
                    <li class="sub-nav-link">
                            <a href="ShopAll.php">
                                <p>Shop All</p>
                            </a>
                        </li>
                        <?php 
                            $scq="SELECT * FROM `product-catagory` where status=0";
                            $excscq = $con ->query($scq);

                            while($row = mysqli_fetch_array($excscq)){

                                if($row["issubset"] == 1){ 
                                    $subcq="SELECT * FROM `sub-catagory` where cid={$row['cid']} and status=0";
                                    $excsubcat = $con ->query($subcq);
                                        

                                        ?> <li class="sub-nav-link sub-sub-nav">
                                            <a href="products.php?category=<?php echo $row['cid'] ?>">
                                            <p><?php echo $row['cname']; ?></p>
                                            </a>
                                                <div class="sub-nav-dropbox">
                                                    <?php
                                                        while($subcat = mysqli_fetch_assoc($excsubcat)){    
                                                    ?>
                                                    <ul class="sn-dropbox-list">
                                                        
                                                        <li class="sn-dropbox-link"><a href="products.php?subcategory=<?php echo $subcat['subid'] ?>"><?php echo $subcat['subname'] ?></a></li>
                                                    </ul>
                                                        <?php } ?>
                                                </div>
                                            </li>
                                    
                                <?php  }
                                else{ ?>
                                    <li class="sub-nav-link">
                                    <a href="products.php?category=<?php echo $row['cid'] ?>">
                                    <p><?php echo $row["cname"]; ?></p>
                                    </a>
                                    </li>
                                <?php }
                            ?>
                                  
                           <?php } 
                           
                        ?>
                    
               

                    </ul>
                </div>
            </div>
        </section>
    </nav>