<?php
include "../../componet/conn.php";

if(isset($_REQUEST["pid"])){
    
    $pid = $_REQUEST["pid"];
    $delq = "DELETE FROM `products` WHERE pid={$pid};";
    $con -> query($delq);

}
header("location:../products.php");
?>   