<?php
    include "../../componet/conn.php";
    $subid = $_REQUEST["subcatid"];

    

    $secq = "SELECT * FROM `sub-catagory` where subid={$subid};";
    $excsecq = mysqli_query($con, $secq);
    $data = mysqli_fetch_assoc($excsecq);
    $getcid = $data["cid"];
    $checkcid = "SELECT * FROM `sub-catagory` where cid={$getcid};";
    $exccheckcid= mysqli_query($con, $checkcid);
    
    $delq = "DELETE FROM `sub-catagory` WHERE subid={$subid};";
    $excdel = $con->query($delq);

    if(mysqli_num_rows($exccheckcid) > 1){
        
    }else{
        $sq="update `product-catagory` set issubset=0 where cid={$getcid}";
        $con->query($sq);
    }

    header("location:../sub-category.php");
?>