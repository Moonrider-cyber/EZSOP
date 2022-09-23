<?php 
include_once("conn.php");
 ?>


<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
    }else{

        $uid = $_SESSION["id"];
        
        if(isset($_REQUEST["num"])){
            // $num = $_REQUEST["num"];
            // echo $num;
            $getadr = "SELECT * FROM `user-address` WHERE `number`={$_REQUEST["num"]}";
            $excgetadr = $con->query($getadr);
            $addressrec = $excgetadr->fetch_assoc();
            // echo "    " . $excgetadr->num_rows ."   ";
            if($addressrec){
                $getcart = "SELECT * FROM `mycart` where userid={$uid}";
                $excgetcart = $con->query($getcart);
                    if($excgetcart){
                    while($rec = $excgetcart->fetch_assoc()){
                        $insertorderq = "INSERT INTO `orders`(`uid`, `adrid`, `pid`) VALUES ('{$uid}','{$addressrec["adrid"]}','{$rec["pid"]}')";
                        $excinsert = $con->query($insertorderq);
                            if($excinsert){
                                $deletecart = "DELETE FROM `mycart` WHERE cartid={$rec["cartid"]}";
                                $con->query($deletecart);
                            }
                    }
                }
                
                if($excinsert){
                    header("location:../successorder.php");
                }
            }
            else{
                header("location:../checkout.php");
            }
            
            
        }

        if(isset($_REQUEST["addressid"])){
            $num = $_REQUEST["addressid"];

            $getcart = "SELECT * FROM `mycart` where userid={$uid}";
            $excgetcart = $con->query($getcart);
                while($rec = $excgetcart->fetch_assoc()){
                    $insertorderq = "INSERT INTO `orders`(`uid`, `adrid`, `pid`) VALUES ('{$uid}','{$num}','{$rec["pid"]}')";
                    $excinsert = $con->query($insertorderq);
                        if($excinsert){
                            $deletecart = "DELETE FROM `mycart` WHERE cartid={$rec["cartid"]}";
                            $con->query($deletecart);
                        }
                }
            if($excinsert){
                header("location:../successorder.php");
            }
        }
    }
?>