<?php include "../../componet/conn.php";
$chacking= true;
?>
 
<?php
if (isset($_REQUEST["addsub-category"])) {
    $sname = $_REQUEST["sname"];
    $cid = $_REQUEST["catid"];
    $subid = $_REQUEST["subid"];
    if($cid == 0){

    }else{
        
        $insq = "UPDATE `sub-catagory` set subname='{$sname}',cid={$cid} WHERE subid={$subid}";
            $excup = mysqli_query($con,$insq);
            if($excup){
                header("location:../sub-category.php");
            }
        
    }
}        

?>
<?php
 $gname = "";
 $gcid = "";
    if(isset($_REQUEST['subcatid'])){
        $gsubid = $_REQUEST['subcatid'];

        $upq = "SELECT * FROM `sub-catagory` WHERE subid={$gsubid};";
        $excupq = $con->query($upq);
        $result = $excupq->fetch_assoc();
        $gname = $result['subname'];
        $gcid = $result['cid'];
    }
?>

<html>

<head>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
    <style>
    .add-item h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-label {
        text-align: left;
    }

    .add-item td {
        padding: 20px;
    }
    .add-item td:last-child{
        padding: 1px;
    }
    .add-item .form-control {
        width: 400px;
    }
    .alert-text {
            background-color: rgb(249, 173, 173);
            border-color: rgb(249, 173, 173);
            color: #856404;
            border-radius: 3px;
            font-size: 15px;
            padding: 5px 0px;
            margin-bottom: 10px;
            font-weight: 600;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="align-items-center add-item">
        <h1>ADD SUB-CATEGORY</h1>
        <form action="update-subcat.php" method="post">
            <table align="center">
            <tr>
                    <td>
                        <div>
                            <label for="productname" class="form-label my-1">CATAGORY ID</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" value="<?php echo $gsubid ?>" name="subid" readonly>
                            <label for="floatingPassword" >sub-category Name</label>
                        </div>
                    </td>
                </tr>
            <tr>
                    <td>
                        <div>
                            <label for="productname" class="form-label my-1">Catagory name</label>
                        </div>
                    </td>
                    <td>
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" name="catid">
                            <option value="0">select category</option>
                            <?php
                                $sq="select * from `product-catagory`";
                                $exc = $con->query($sq);
                                while($rows=mysqli_fetch_assoc($exc)){
                                    ?>
                                    <option value="<?php echo $rows["cid"] ?>" <?php if($rows["cid"] == $gcid){ ?> selected <?php } ?>> <?php echo $rows["cname"] ?></option>
                                
                                <?php }
                            ?>
                            
                        </select>
                        <label for="floatingSelect">select category</label>
                        </div>
                    </td>
                </tr>    
            <tr>
                    <td>
                        <div>
                            <label for="productname" class="form-label my-1">CATAGORY NAME</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" value="<?php echo $gname ?>" name="sname" required>
                            <label for="floatingPassword" >sub-category Name</label>
                        </div>
                    </td>
                </tr>
                
                
                

            </table>
<?php
                if ($chacking == false) {
                    echo '<div class="alert alert-warning d-grid gap-2 col-3 mx-auto alert-text" role="alert">
                    ' . $errormsg . '
                </div>';
                } ?>


            <div class="d-grid gap-2 col-6 mx-auto my-3">
                <input type="submit" class="btn btn-warning h-auto" name="addsub-category" value="ADD SUB-CATEGORY">
            </div>
        </form>
    </div>
</body>

</html>
