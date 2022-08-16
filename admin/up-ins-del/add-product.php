<?php include "../../componet/conn.php";
$chacking= true;
?>

<?php
if (isset($_REQUEST["addsubmit"])) {
    $pname = $_REQUEST["pname"];
    $price = $_REQUEST["price"];
    $disprice = $_REQUEST["disprice"];
    $cat = $_REQUEST["cat"];
    $subcat = $_REQUEST["sub-cat"];
    $desc = $_REQUEST["desc"];
    $img = $_FILES["photo"];

    $file_name = $img["name"];
    $file_path = $img["tmp_name"];
    $file_error = $img["error"];
    
    if($file_error == 0){
        $destfile='admin/product-photos/'. $file_name;
        //check file size
        if ($_FILES["photo"]["size"] > 500000) {
            $errormsg = "Sorry, your file is too large.";
        }else{
        //check photo
        $imageFileType = strtolower(pathinfo($destfile,PATHINFO_EXTENSION));
        if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "webp" || $imageFileType == "jpeg" ) {            
            $uppathname="../product-photos/$file_name";
            move_uploaded_file($file_path,$uppathname);
            $insq = "INSERT INTO products( `pname`, `cid`,`subid`, `price`, `dis-price`, `desc`, `pimg`) VALUES('$pname',$cat,$subcat,$price,$disprice,'$desc','$destfile');";
            $excins = mysqli_query($con,$insq);
            
            if($excins){
                
                header("location:../products.php");
            }
        }else{
            $chacking= false;
            $errormsg = "Sorry, only JPG, JPEG, PNG files are allowed.";
        }
          
        }
    }

   
}
?>
<html>


<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    body{
        margin: 30px 0;
        padding: 0;
    }
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
        <h1>ADD PRODUCT</h1>
        <form action="add-product.php" method="post" enctype="multipart/form-data">
            <table align="center">
                <tr>
                    <td>
                        <div>
                            <label for="productname" class="form-label">PRODUCT NAME</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="text" class="form-control" placeholder="Enter Product Name" name="pname" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="productSelect" class="form-label">PRODUCT CATAGORY</label>

                    </td>
                    <td>
                        
                        <select class="form-select" name="cat" id="cat-select" onchange="changecat()">
                        <?php
                            $sq = "SELECT * FROM `product-catagory`";
                            $result = mysqli_query($con,$sq);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <option value="<?php echo $row['cid']; ?>" ><?php echo $row['cname']; ?></option>
                        <?php
                            }
                        ?>    
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="productSelect" class="form-label">SUB-PRODUCT CATAGORY</label>

                    </td>
                    <td>
                        
                        <select class="form-select" name="sub-cat" id="sub-cat-select" placeholder="select category">
                                <option value="0">Select Category</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="price" class="form-label">PRODUCT PRICE</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="number" oninput="convertper()" class="form-control price" placeholder="Enter Product Price" name="price" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="price" class="form-label">DISCOUNT PERCENTAGE</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input class="form-control disper" placeholder="Enter discount %" name="disper"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); convertper()"
                                type = "number"
                                maxlength = "2"
                                oninput="convertper()"
                                required
                            />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="price" class="form-label">DISCOUNT PRICE</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="number" class="form-control disprice" placeholder="Enter discount Product Price" name="disprice" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <label for="desc" class="form-label">description</label>
                        </div>
                    </td>
                    <td>
                        <div>
                            <textarea name="desc" rows="3" cols="42" class="my-3 form-control"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="formphoto" class="form-label">PRODUCT PHOTO</label>
                    </td>
                    <td>
                        <div class="mb-3">

                            <input class="form-control" type="file" id="formFile" name="photo" required>
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
            <div class="d-grid gap-2 col-6 mx-auto">
                <input type="submit" class="btn btn-warning h-auto" name="addsubmit" value="ADD PRODUCT">
            </div>
        </form>
    </div>
    <script>
    function changecat(){
        var categorie_id = jQuery("#cat-select").val();
        jQuery.ajax({
            url:'../admin-componet/get-sub-cat.php',
            type:"post",
            data:"cat-id="+categorie_id,
            success:function(result){
                jQuery("#sub-cat-select").html(result);
            }
        });
    }

    const price_input = document.querySelector(".price");
    const dis_per = document.querySelector(".disper");
    const dis_price = document.querySelector(".disprice");

    function convertper(){
        if(!dis_per.value == "" && !price_input.value == ""){
            
        let getprice = parseInt(price_input.value);
        let getper = parseInt(dis_per.value);
        let savemoney = getprice * (getper / 100)
        dis_price.value = getprice - savemoney;    
        }
    }
</script>

</body>
</html> 