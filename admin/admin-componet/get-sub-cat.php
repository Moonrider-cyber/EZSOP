<?php
    include "../../componet/conn.php";

    $cid = $_POST["cat-id"];
    $getcat = "select * from `sub-catagory` where cid = {$cid};";
    $excque = $con ->query($getcat);
    if(mysqli_num_rows($excque) > 0){
        $html = "<option value='0'>select Sub-Category</option>";
        while($rows = mysqli_fetch_assoc($excque)){
            $html.="
            
            <option value=".$rows['subid'].">".$rows['subname']."</option>";
        }
        echo $html;
    }else{
        echo '<option value="0">No Sub Category Found<option>';
    }
?>