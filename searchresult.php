<?php include_once("componet/conn.php"); ?>
<?php session_start();

if(isset($_REQUEST['search'])){
    $searchstr = $_REQUEST['search'];
    $searchq = "SELECT * FROM `products` WHERE `pname` LIKE '%{$searchstr}%' or `desc` LIKE '%{$searchstr}%'";
    $excser = $con->query($searchq);
    $snum = mysqli_num_rows($excser);
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
    <link
        href="https://fonts.googleapis.com/css2?family=Acme&family=Barlow:wght@500&family=Quicksand:wght@500&family=Raleway:wght@300&family=Ubuntu:wght@700&display=swap"
        rel="stylesheet">
    <!-- fonts -->
    <title>EZSOP - search</title>
</head>

<body>
<?php include("componet/navbar.php"); ?>

<?php 
if(isset($_REQUEST['search']) && !$_REQUEST['search'] == ""){
    if($snum > 0){
        

?>

    <div class="main-body">
        <!-- page navigator -->
        <div class="page-navigator">
            <div class="bigcontainer">
                <div class="page-names">
                    <a href="index.php">Home</a>
                    <span>></span>
                    <p>search result of <?php echo $searchstr ?></p>
                </div>
            </div>
        </div>
        <!-- page navigator -->

        <!--shopall items -->
        <section>
            <div class="bigcontainer">
                <div class="cat-products">
                    <div class="products-cards">
                        <div class="hading">
                            <h1>Search result of <?php echo $searchstr ?></h1>
                            <hr>
                        </div>
                        <!-- <div class="product-filter">

                    </div> -->
                        <div class="cards-group">

                            <?php
                            while($rows = mysqli_fetch_assoc($excser)){
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
                                    <div class="card-text-desc">
                                        <span><?php echo $rows["desc"] ?></span>
                                    </div>
                                    <div class="card-text-price">
                                        <span>₹ <?php echo $rows["dis-price"] ?></span>
                                        <span>₹ <?php echo $rows["price"] ?></span>
                                        <span>15% off</span>
                                    </div>
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
            </div>
        </section>
    </div>
    <?php
}else{
    echo '<div class="hading">
    <h1>No result Found</h1>
    <hr>
</div>';
}

}else{
    echo '<div class="hading">
    <h1>No result Found</h1>
    <hr>
</div>';
}
    ?>
    <!-- footer  -->
    <?php include "componet/footer.php"; ?>




    <!-- javascript sw -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="index.js"></script>
</body>

</html>