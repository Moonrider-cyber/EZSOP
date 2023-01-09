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
            
            $getadr = "SELECT * FROM `user-address` WHERE `number`={$_REQUEST["num"]}";
            $excgetadr = $con->query($getadr);
            $addressrec = $excgetadr->fetch_assoc();
            // echo "    " . $excgetadr->num_rows ."   ";
            if($excgetadr){
                $getcart = "SELECT * FROM `mycart` where userid={$uid}";
                $excgetcart = $con->query($getcart);
                    if($excgetcart){
                        $onecomplet = 0;
                    while($rec = $excgetcart->fetch_assoc()){
                        if($onecomplet == 0){
                            $grpid =  $rec["cartid"] . $rec["pid"]; 
                        }
                        $insertorderq = "INSERT INTO `orders`(`ogrp_id`,`uid`, `adrid`, `pid`,`qty`) VALUES ('{$grpid}','{$uid}','{$addressrec["adrid"]}','{$rec["pid"]}','{$rec["cartqty"]}')";
                        $excinsert = $con->query($insertorderq);
                            if($excinsert){
                                $deletecart = "DELETE FROM `mycart` WHERE cartid={$rec["cartid"]}";
                                $con->query($deletecart);
                            }
                        $onecomplet = 1;
                    }
                }
                
                if($excinsert){
                    header("location:../successorder.php");
                }
            }
            else{
                echo "<script> window.location.reload(); </script>";

                
                // header("location:../checkout.php");
            }
            
            
        }

        if(isset($_REQUEST["addressid"])){
            $num = $_REQUEST["addressid"];

            $getcart = "SELECT * FROM `mycart` where userid={$uid}";
            $excgetcart = $con->query($getcart);
            $onecomplet = 0;
                while($rec = $excgetcart->fetch_assoc()){
                    if($onecomplet == 0){
                        $grpid =  $rec["cartid"] . $rec["pid"]; 
                    }
                    $insertorderq = "INSERT INTO `orders`(`ogrp_id`,`uid`, `adrid`, `pid`,`qty`) VALUES ('{$grpid}','{$uid}','{$num}','{$rec["pid"]}','{$rec["cartqty"]}')";
                    $excinsert = $con->query($insertorderq);
                        if($excinsert){
                            $deletecart = "DELETE FROM `mycart` WHERE cartid={$rec["cartid"]}";
                            $con->query($deletecart);
                        }
                    $onecomplet = 1;
                }
            if($excinsert){
                header("location:../successorder.php");
            }
        }
    }
?>