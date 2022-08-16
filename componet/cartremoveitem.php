<?php
    include "conn.php";
    if(isset($_REQUEST['cid'])){
        $cartid = $_REQUEST['cid'];

        $delq = "DELETE FROM `mycart` WHERE cartid={$cartid}";
        $excdel = $con->query($delq);
    }
    header("location:../my-cart.php");
?>