<?php include_once("componet/conn.php"); ?>
<?php session_start();
    if(isset($_SESSION["login"])){
        $name = $_SESSION["username"];
        $uid = $_SESSION["id"];
    }else{
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
    <style>
        footer{
            margin-top: 0;
        }
    </style>
    <title>EZSOP - my order</title>
</head>

<body>
    
    <?php include("componet/navbar.php"); ?>


    <div class="main-body">
        <div class="myorders">

            <div class="heading">
                <h1>My Orders</h1>
            </div>
            <?php
                $getorder = "SELECT * FROM orders where uid={$uid}";
                $q1 = mysqli_query($con, $getorder);
                if(mysqli_num_rows($q1) <= 0){
                    ?>
                        <div class="no-order">
                            <h2>Looks like you haven't placed an order</h2>
                            <a href="shopall.php">
                                <button>Buy Now</button>
                            </a>
                        </div>
                    <?php
                }else{

                
            ?>
            <div class="myorder-table">
                <table>
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    while ($rec = mysqli_fetch_assoc($q1)) {
                    ?>
                        <tr>
                            <td><?php echo $rec["oid"] ?></td>
                            <td><?php echo $rec["date"] ?></td>
                            <td><?php if($rec["status"] == 1){ echo "deliverd"; }else{ echo "pending"; } ?></td>
                            <?php
                            $findprod = "SELECT * FROM `products` where pid={$rec['pid']}";
                            $excfindprod = $con->query($findprod);
                            $prod = mysqli_fetch_assoc($excfindprod);
                            ?>
                            <td><a href="product-info.php?productid=<?php echo $rec["pid"] ?>"><?php echo $prod['pname']; ?></a></td>
                            <td><?php echo $prod['dis-price']; ?></td>
                            <td><?php echo $rec['qty']; ?></td>
                            <td><?php echo ($prod['dis-price'] * $rec['qty']) ?></td>
                            <!-- <td><a href="product-info.php?productid=<?php //echo $rec["pid"] ?>">
                                <button>view</button>
                                </a></td> -->
                            <td><a href="invoice.php?oid=<?php echo $rec["oid"] ?>">
                                <button>Invoice</button>
                                </a></td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
            
        </div>



        <?php include "componet/footer.php"; ?>
    </div>
    <!-- javascript sw -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    
    <script src="index.js"></script>
    <script>
        function invoiceclick(){

        }
    </script>
</body>

</html>