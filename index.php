<?php include_once("componet/conn.php"); ?>
<?php session_start();
    if(isset($_SESSION["login"])){
        $name = $_SESSION["name"];
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
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- javascript sw-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- links -->
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Acme&family=Barlow:wght@500&family=Quicksand:wght@500&family=Raleway:wght@300&family=Ubuntu:wght@700&display=swap"
        rel="stylesheet">
    <!-- fonts -->
    <title>EZSOP</title>
</head>

<body>
    
    <?php include("componet/navbar.php"); ?>


    <div class="main-body">
 
        <!-- img Swiper -->
        <section>
            <div class="imgswiper">
                <div class="swiper-text">
                    <span>BEST PRICE</span>
                    <h1>Incredible Prices on All Your Favorite Item</h1>
                    <p>Get more for less on selected brands</p>
                    <a href="pages/ShopAll.php"><button>Shop Now</button></a>
                </div>
                <div class="swiper myimgSwiper">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <img src="img/slider1.png" />
                            bb
                        </div>
                        <div class="swiper-slide">
                            <img src="img/slider2.png" />
                        </div>
                        <div class="swiper-slide">
                            <img src="img/slider3.png" />
                        </div>
                        <!-- <div class="swiper-slide">
                        <img src="img/bac.png" />
                    </div> -->
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- img Swiper -->

        <!-- modal -->
            <section>
            <div class="modal">
                <div class="modal1">
                    <div class="modal-text">
                        <p> Holiday Deals</p>
                        <h1> Up to 30% off</h1>
                        <p> Selected Smartphone Brands</p>
                        <a href="pages/mobile.php"><button>Shop Now</button></a>
                    </div>
                    <div class="modal-img">
                        <img src="img/modal1.webp" alt="modal1 photo">
                    </div>
                </div>
                <div class="modal2">
                    <div class="modal-text">
                        <p> Just In</p>
                        <h1> Take Your Sound Anywhere</h1>
                        <p>Top Headphone Brands</p>
                        <a href="pages/headphone.php"><button>Shop Now</button></a>
                    </div>
                    <div class="modal-img">
                        <img src="img/modal2.webp" alt="modal2 photo">
                    </div>
                </div>
            </div>
        </section>

        <!-- modal -->

        <!-- cat Swiper -->
        <!-- <div class="container">
            <div class="swiper catSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swiper-item">
                            <a href="pages/mobile.php">
                            <img src="img/icon1.png" alt="product catagory">
                        </a>
                            <h3>Mobile</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-item">
                            <img src="img/icon2.png" alt="product catagory">
                            <h3>Laptop</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-item">
                            <img src="img/icon3.png" alt="product catagory">
                            <h3>Tablate</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-item">
                            <img src="img/icon4.png" alt="product catagory">
                            <h3>Watch</h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swiper-item">
                            <img src="img/icon5.png" alt="product catagory">
                            <h3>headphone</h3>
                        </div>
                    </div>
                  

                </div>
                <div class="swiper-arrow">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div> -->
        <!-- cat Swiper -->

        <!-- best items -->
        <section>
            <div class="bigcontainer">
                <div class="products-cards">
                    <div class="hading">
                        <h1>Best Sellers</h1>
                        <hr>
                    </div>
                    <div class="cards-group">

                    <?php
                        $fetchprodq = "select * from products limit 6";
                        $excfetchprodq = $con->query($fetchprodq);
                        while($rows = $excfetchprodq->fetch_assoc()){
                            ?>
                            
                            <div class="card">
                            <div class="card-fav">
                                <button><i class="far fa-heart"></i></button>
                            </div> 
                            <a href="product-info.php?productid=<?php echo $rows["pid"]; ?>">
                            <div class="card-img">
                                <img src="<?php echo $rows["pimg"] ?>" alt="product">
                            </div>
                            <div class="card-text">
                                <div class="card-text-title">
                                    <h2><?php echo $rows["pname"] ?></h2>
                                </div>
                                <div class="card-text-desc">
                                        <span><?php echo $rows["desc"] ?></span>
                                    </div>
                                    <div class="card-text-price"> 
                                        <span class="disprice">₹ <?php echo $rows["dis-price"] ?></span>
                                        <span class="price">₹ <?php echo $rows["price"] ?></span>
                                        <span class="disper"></span>
                                    </div>
                                    </a>
                                    <div class="card-text-cart">
                                        <a href="componet/addtocart.php?proid=<?php echo $rows["pid"]; ?>"><button class="addcartbtn">Add To Cart</button></a>
                                    </div>
                            </div>
                        </div>
                            
                        <?php }
                    ?>
                      

                    </div>
                </div>
            </div>
        </section>

        <?php include "componet/footer.php"; ?>
    </div>
    <!-- javascript sw -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    
    <script src="index.js"></script>
</body>

</html>