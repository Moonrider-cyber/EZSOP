<?php
include "../../componet/conn.php";

$uid = $_REQUEST["uid"];
$delq = "DELETE FROM `users` WHERE id={$uid};";
$con -> query($delq);
header("location:../user.php");
?> 