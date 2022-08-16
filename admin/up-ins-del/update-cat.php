<?php include "../../componet/conn.php";
$chacking= true;
?>

<?php
if (isset($_REQUEST["updatecategory"])) {
    $id = $_REQUEST["id"];
    $cname = $_REQUEST["cname"];
    $slug = $_REQUEST["slug"];

        $updq = "UPDATE `product-catagory` SET `cname`='{$cname}',`slug`='$slug' WHERE cid={$id}";
            $excupd = mysqli_query($con,$updq);
            
            if($excupd){
                header("location:../category.php");
            }
        
    
        
}

?>

<?php
$id = "";
$name = "";
$slug =  "";
if(isset($_REQUEST["cid"])){
    $sq="select * from `product-catagory` where cid={$_REQUEST["cid"]}";
    $exc = mysqli_query($con,$sq);
    if($exc){
        $rows = mysqli_fetch_assoc($exc);
        $id = $rows["cid"];
        $name = $rows["cname"];
        $slug = $rows["slug"];
    }
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
    .update-item h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-label {
        text-align: left;
    }

    .update-item td {
        padding: 20px;
    }
    .update-item td:last-child{
        padding: 1px;
    }
    .update-item .form-control {
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
    <div class="align-items-center update-item">
        <h1>UPDATE CATEGORY</h1>
        <form action="update-cat.php" method="post">
            <table align="center">
                <tr>
                    <td>
                        <div>
                            <label for="productname" class="form-label my-1">CATAGORY NAME</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="text" class="form-control" placeholder="id" name="id" value="<?php echo $id; ?>" readonly>
                            
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
                            <input type="text" class="form-control" placeholder="Enter category Name" name="cname" value="<?php echo $name; ?>" required>
                            <label for="floatingPassword">Category Name</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="productname" class="form-label my-1">SLUG</label>
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Give slug" name="slug" value="<?php echo $slug; ?>" required>
                            <label for="floatingPassword">Enter Slug</label>
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
                <input type="submit" class="btn btn-warning h-auto" name="updatecategory" value="UPDATE CATEGORY">
            </div>
        </form>
    </div>
</body>

</html>
