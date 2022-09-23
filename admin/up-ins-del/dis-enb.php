<?php
    include "../../componet/conn.php";
    
    if(isset($_REQUEST['uid'])){
        $uid = $_REQUEST['uid'];
        $getuserdataq = "select * from users where id={$uid}";
        $excgetuser = $con -> query($getuserdataq);

        $data = $excgetuser->fetch_assoc();

        if($data['status'] == 0){
            $updatedataq = "update users set status=1 where id={$uid}";
            $con->query($updatedataq);
        }
        elseif($data['status'] == 1){
            $updatedataq = "update users set status=0 where id={$uid}";
            $con->query($updatedataq);
        }
        header("location:../user.php");
    }
    if(isset($_REQUEST['pid'])){
        $pid = $_REQUEST['pid'];
        $getproddataq = "select * from products where pid={$pid}";
        $excgetuser = $con -> query($getproddataq);

        $data = $excgetuser->fetch_assoc();

        if($data['status'] == 0){
            $updatedataq = "update products set status=1 where pid={$pid}";
            $con->query($updatedataq);
        }
        elseif($data['status'] == 1){
            $updatedataq = "update products set status=0 where pid={$pid}";
            $con->query($updatedataq);
        }
        header("location:../products.php");
    }
    if(isset($_REQUEST['cid'])){
        $cid = $_REQUEST['cid'];
        $getcatdataq = "select * from `product-catagory` where cid={$cid}";
        $excgetcat = $con -> query($getcatdataq);

        $data = $excgetcat->fetch_assoc();

        if($data['status'] == 0){
            $updatedataq = "update `product-catagory` set status=1 where cid={$cid}";
            $con->query($updatedataq);
        }
        elseif($data['status'] == 1){
            $updatedataq = "update `product-catagory` set status=0 where cid={$cid}";
            $con->query($updatedataq);
        }
        header("location:../category.php");
    }
    if(isset($_REQUEST['subid'])){
        $subid = $_REQUEST['subid'];
        $getsubcatdataq = "select * from `sub-catagory` where subid={$subid}";
        $excgetsubcat = $con -> query($getsubcatdataq);

        $data = $excgetsubcat->fetch_assoc();

        if($data['status'] == 0){
            $updatedataq = "update `sub-catagory` set status=1 where subid={$subid}";
            $con->query($updatedataq);
        }
        elseif($data['status'] == 1){
            $updatedataq = "update `sub-catagory` set status=0 where subid={$subid}";
            $con->query($updatedataq);
        }
        header("location:../sub-category.php");
    }
    if(isset($_REQUEST["oid"])){
        $oid = $_REQUEST["oid"];
        // $getorder = "select * from orders where oid={$oid}";
        // $excgetorder = $con->query($getorder);

        // $order = $excgetorder->fetch_assoc();

        $updatevalue = "update orders set status=1 where oid={$oid}";
        $excupdatevalue = $con->query($updatevalue);
        header("location:../orders.php");
    }
    // header("location:../index.php");
?>