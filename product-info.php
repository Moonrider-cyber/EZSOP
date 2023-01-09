<?php
    include_once("componet/conn.php");
    if(isset($_REQUEST["productid"])){
        $id = $_REQUEST["productid"];
        $getprodq = "select * from products where pid={$id}";
        $excgetq = $con->query($getprodq);
        $res = $excgetq->fetch_assoc();
    }
    else{
        header("location:index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- links -->
    <link rel="stylesheet" href="style-index.css">
    <link rel="stylesheet" href="style-res.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- javascript sw-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- links -->
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&family=Barlow:wght@500&family=Heebo:wght@100&family=Quicksand:wght@500&family=Raleway:wght@300&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- fonts -->
    <title>TeachWeb</title>
</head>

<body>
    <?php include "componet/navbar.php"; ?>

    <div class="container">

        <div class="detail-navgaction">
            <a href="index.php">Home</a>
            <span>/</span>
            <p><?php echo $res["pname"]; ?></p>
        </div>

        <div class="product-detail">
            <div class="product-detail-img">
                <img src="<?php echo $res["pimg"]; ?>" alt="product-img">
            </div>
            <div class="product-detail-info">
                <div class="product-info-title">
                    <h2><?php echo $res["pname"]; ?></h2>
                </div>
                <div class="product-info-desc">
                    <p><?php echo $res["desc"]; ?></p>
                </div>
                <div class="product-info-price">
                    <h1>₹<?php echo $res["price"]; ?></h1>
                    <h3>-9%</h3>
                </div>
                <div class="product-into-qtybtn">
                    <label for="qty">Quantity:</label>
                    <input type="number" value="1" name="pqty">
                </div>
                <div class="product-info-btn">
                    <button name="addcart">Add To Cart</button>
                    <button><i class="far fa-heart"></i></button>
                </div>
                <div class="product-info-buy-now">
                    <button>Buy Now</button>
                </div>
                <!-- <div class="product-info-fulldesc">
                    <ul>
                        <li>The EvoFox Elite Ops Wireless Gamepad with Type C Charging is the ideal Android TV Gamepad. With all Android TVs supporting at least basic Gaming, a Gamepad at home is a must. Use the provided USB Extender Cable on your TV to ensure optimal wireless performance.</li>
                        <li>This Wireless Controller also supports Windows with X input and D input modes, and PS3s. It automatically detects and changes the gamepad mode based on your system. Simply Plug and Play!</li>
                    
                    </ul>
                </div> -->
            </div>
        </div>

    
    </div>
<div class="bigcontainer">
    <div class="other-product">
        
        <div class="products-cards">
            <div class="other-product-hading">
                <h1>Related Products</h1>
                <button>View All <span>	&rarr;</span></button>
            </div>
        <div class="cards-group">
        <?php
            $getreletedq = "select * from products where cid={$res["cid"]} limit 4";
            $excreltedq = $con->query($getreletedq);
            while($rows = $excreltedq->fetch_assoc()){
                ?>
                <div class="card">
                <div class="card-fav">
                    <button><i class="far fa-heart"></i></button>
                </div>
                <div class="card-img">
                    <img src="<?php echo $rows["pimg"] ?>" alt="product">
                </div>
                <div class="card-text">
                    <div class="card-text-title">
                        <h2><?php echo $rows["pname"] ?></h2>
                    </div>
                    <div class="card-text-price">
                                        <span class="disprice">₹ <?php echo $rows["dis-price"] ?></span>
                                        <span class="price">₹ <?php echo $rows["price"] ?></span>
                                        <span class="disper"></span>
                                    </div>
                    <div class="card-text-cart">
                        <button>Add To Cart</button>
                    </div>
                </div>
            </div>
                <?php 
            }
        ?>

            

        </div>
    </div>
</div>

</div>

    <!-- footer  -->
    <footer>
        <div class="content">
            <div class="top">
                <div class="logo-details">
                    <span class="logo_name">EZSOP</span>
                </div>
                <div class="media-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="link-boxes">
                <ul class="box">
                    <li class="link_name">menu </li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Service</a></li>
                </ul>
                <ul class="box">
                    <li class="link_name">Services</li>
                    <li><a href="#">Home Delevary</a></li>
                    <li><a href=""> Fast Delevary</a></li>
                    <li><a href=""> Best Product</a></li>

                </ul>
                <ul class="box">
                    <li class="link_name">Account</li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#">Login</a></li>

                </ul>
                <ul class="box">
                    <li class="link_name">Devaloper</li>
                    <li>Patel Jainex</li>
                    <li>Parmar Rohit</li>
                    <li>Makadiya Parth</li>
                    <li>Vaghani Tirth</li>
                    <li>Parmar Jay</li>
                </ul>
                <ul class="box input-box">
                    <li class="link_name">Subscribe</li>
                    <li><input type="text" placeholder="Enter your email"></li>
                    <li><input type="button" value="Subscribe"></li>
                </ul>
            </div>
        </div>
        <div class="bottom-details">
            <div class="bottom_text">
                <span class="copyright_text">Copyright &#169; 2022 <a href="#">EZSOP.</a>All rights
                    reserved</span>
                <span class="policy_terms">
                    <a href="#">Privacy policy</a>
                    <a href="#">Terms & condition</a>
                </span>
            </div>
        </div>
    </footer>
    <!-- footer  -->
    </div>
    <!-- javascript sw -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script src="index.js"></script>
</body>

</html>