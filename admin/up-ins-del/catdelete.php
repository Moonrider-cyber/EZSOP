<?php
include "../../componet/conn.php";

$cid = $_REQUEST["cid"];
$delq = "DELETE FROM `product-catagory` WHERE cid={$cid};";
$con -> query($delq);
header("location:../category.php");
?> 