<?php include_once("componet/conn.php"); ?>

<?php
    session_start();
    if(isset($_SESSION['id'])){
        $uid = $_SESSION["id"];
    }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-index.css">
    <link rel="stylesheet" href="style-res.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Acme&family=Barlow:wght@500&family=Quicksand:wght@500&family=Raleway:wght@300&family=Ubuntu:wght@700&display=swap"
        rel="stylesheet">
    <!-- fonts -->
    <title>EZSOP - My cart</title>
</head>
<body>
    <div class="mycart">
        <div class="cart-back">
            <a href="index.php">
        <i class="fa-solid fa-arrow-left-long"></i>
        <span>Back To Home</span>
        </a>
        </div>
        <div class="mycart-hading">
            <i class="fa-solid fa-bag-shopping"></i>
            <h1>My Cart</h1>
        </div>

        <?php
            if(!isset($_SESSION['id'])){
                ?>
                <div class="no-item">
                    <h1>No item added</h1>
                    <a href="ShopAll.php">
                        <button>Shop Now</button>
                    </a>
                    </div>
                    <?php
            }else{
                $getitemquery = "SELECT * FROM `mycart` where userid={$uid}";
                $excgetitem = $con->query($getitemquery);
                $items = mysqli_num_rows($excgetitem);      
        ?>
        <div class="cart-section">
            <div class="cart-items">
                <div class="cart-items-hading">
                    <h2>cart (<?php echo $items; ?> items)</h2>

                    <?php
                        while($res = $excgetitem->fetch_assoc()){
                            ?>
                            <div class="cart-item-card">
                        <div class="cart-item-img">
                            <img src="<?php echo $res["cartimg"] ?>">
                        </div>
                        <div class="cart-item">
                            <div class="item-info">
                                <div class="cart-item-details">    
                                    <div class="cart-item-title">
                                        <h3><?php echo $res["carttitle"] ?></h3>
                                    </div>
                                    <div class="cart-item-desc">
                                        <p><?php echo $res["cartdesc"] ?></p>
                                    </div>
                                    <div class="cart-item-price">
                                        <h1>₹<span class="item-price"><?php echo $res["cartprice"] ?></span></h1>
                                    </div>
                                </div>
                                <div class="cart-qty">
                                    <div class="qty-btns">
                                        <div class="btn-mins"><span>-</span></div>
                                        <div class="qty-num"><span class="num"><?php echo $res['cartqty']; ?></span></div>
                                        <div class="btn-plus"><span>+</span></div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="cart-item-btn">
                                
                                <div class="item-remove-btn">
                                    <i class="fa-solid fa-trash-can"></i>
                                    <a href="componet/cartremoveitem.php?cid=<?php echo $res["cartid"]; ?>">REMOVE ITEM</a>
                                </div>
                                <div class="item-move-btn">
                                    <i class="fa-solid fa-heart"></i>
                                    <a href="#">MOVE TO FAVORITES</a>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <?php
                        }
                    ?>
                    
                 



                </div>
            </div>
            <div class="cart-right">
                <div class="cart-checkout">
                    <h3 class="checkout-heading">The Total Amount Of</h3>
                    <div class="product-prices">
                        <p>Product amount</p>
                        <p>₹<span class="item-total-price">0</span></p>
                    </div>
                    <div class="product-prices">
                        <p>Shipping Charge</p>
                        <p class="shiping-charge">₹100</p>
                    </div>
                    <div class="product-prices">
                        <p>The total amount</p>
                        <p class="total-price">₹0</p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <script>
        let minsdiv = document.querySelectorAll(".btn-mins");
        let numdiv = document.querySelectorAll(".qty-num");
        let plusdiv = document.querySelectorAll(".btn-plus");
        let price = document.getElementsByClassName("item-price");
        let displaysum = document.querySelector(".item-total-price");
        let totalprice = document.querySelector(".total-price");
        for (var i = 0; i < plusdiv.length; i++) {
            let nums = numdiv[i];
            let itemprice = price[i];
            
            plusdiv[i].addEventListener("click", ()=> {
                getnum = nums.textContent;
                getprice = itemprice.textContent;
                intnum = parseInt(getnum,10);
                intprice = parseInt(getprice,10);
                nums.textContent = intnum + 1;

                gettotalprice();
            });

            minsdiv[i].addEventListener("click", ()=> {
                getnum = nums.textContent;
                convintnum = parseInt(getnum,10);
                if(convintnum > 1){
                    nums.textContent = convintnum - 1;
                }
                gettotalprice();
            });
        }
        
    </script>
    <script>
        function gettotalprice(){
            let sum = 0;
            for (i = 0; i < price.length; i++){
                var qtycontainer = document.getElementsByClassName('qty-num');
                itemprice = price[i].textContent;
                itemqty = qtycontainer[i].textContent;

                intallprice = parseInt(itemprice,10);
                intallqty = parseInt(itemqty,10);
                
                sum = sum + (intallprice * intallqty);

                totalprice.textContent ="₹" + (sum + 100);
            }
            
        displaysum.textContent = sum;
        }
        gettotalprice();
       
    </script>
</body>
</html>