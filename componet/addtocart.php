<?php
 include_once("conn.php");
    session_start();


    if(!isset($_SESSION["login"]) || $_SESSION["login"] == false){
        header("location:../login.php");
    }
    else{
        if(!isset($_REQUEST["proid"])){
            header("location:../index.php");
        }
        else{
            $uid = $_SESSION["id"];
            $proid = $_REQUEST["proid"];
            $checkalrady = "select * from mycart where pid={$proid}";
            $exccheck = $con->query($checkalrady);
            if(mysqli_num_rows($exccheck) > 0){         
                $data = mysqli_fetch_assoc($exccheck);
                $newqty = $data['cartqty'] +=1;       
                
                $upcartq = "UPDATE `mycart` set cartqty = {$newqty} where `cartid`={$data['cartid']}";
                $excupcart = $con->query($upcartq);
            }else{

                $findprodq = "select * from products where pid={$proid}";
                $getprod = $con->query($findprodq);
                $product = $getprod->fetch_array();
                $addcartq = "INSERT INTO `mycart`(`userid`, `pid`, `carttitle`, `cartdesc`, `cartprice`, `cartimg`) VALUES ({$uid},{$product['pid']},'{$product['pname']}','{$product['desc']}',{$product['dis-price']},'{$product['pimg']}')";
                $excaddcart = $con->query($addcartq);
            }
            
            
        header("location:../my-cart.php");
            
        }

    }
?>