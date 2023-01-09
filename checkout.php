<?php 
include_once("componet/conn.php");
 ?>

<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
    }else{
      $uid = $_SESSION["id"];
      
        $getcart = "SELECT * FROM `mycart` where userid={$uid}";
        $excgetcart = $con->query($getcart);
        if(mysqli_num_rows($excgetcart) == 0){
          header("location:index.php");
        }  
     
        
        $getname = "select * from users where id={$uid}";
        $excgetname = $con->query($getname);
        $username = $excgetname->fetch_assoc();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>checkout - ezsop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style-index.css">
    <link rel="stylesheet" href="style-res.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Acme&family=Barlow:wght@500&family=Quicksand:wght@500&family=Raleway:wght@300&family=Ubuntu:wght@700&display=swap"
        rel="stylesheet">
</head>
  <body>
    <div class="checkout-title">
        <h1>Checkout</h1>
        </div>
        <!-- <div class="container"> -->
          <?php
            $getaddress = "SELECT * FROM `user-address` where uid={$uid} order by adrid desc";
            $excgetaddress = $con->query($getaddress);
            $rec = $excgetaddress->fetch_assoc();
            if($rec){
              ?>
                <div class="old-address">
            <div class="address-details">
              <p><?php echo $rec["name"] ?></p>
              <p><?php echo $rec["address"] ?></p>
              <p><?php echo $rec["number"] ?></p>
              <p><?php echo $rec["city"]."     ,     ". $rec["state"] ?></p>
              <p><?php echo $rec["zip"] ?></p>
            </div>
            <div class="address-btn">
              <a href="componet/addorder.php?addressid=<?php echo $rec['adrid']; ?>">
              <button class="btn btn-primary">Deliver to this Address</button>
              </a>
              <button class="btn btn-danger">Delete</button>
            </div>
          </div>    
              <?php
            }
          ?>
          
        <div class="address">
            <form action="checkout.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputNumber4">Number</label>
                  <input type="Number" class="form-control" id="inputNumber4" placeholder="Enter Number" name="number" 
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); convertper()"
                                type = "number"
                                maxlength = "10"
                  required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputname4">Name</label>
                  <input type="text" class="form-control" id="inputname4" placeholder="Enter name" name="name" value="<?php echo $username["name"] ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Address" name="address" required></textarea>
              </div>
            
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">City</label>
                  <input type="text" class="form-control" id="inputCity" placeholder="Enter City" name="city" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">State</label>
                  <input type="text" id="inputState" class="form-control" placeholder="Enter State" name="state" required>
                    
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Zip</label>
                  <input type="number" class="form-control"  placeholder="Enter Zip" name="zip" required>
                </div>
              </div>
              
              <button type="submit" class="btn btn-primary orderbtn" name="placeorder">Place Order</button>
            </form>
            
        </div>
      <!-- </div> -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  if(isset($_REQUEST["placeorder"])){
    $number = $_REQUEST["number"];
    $name = $_REQUEST["name"];
    $address = $_REQUEST["address"];
    $city = $_REQUEST["city"];
    $state = $_REQUEST["state"];
    $zip = $_REQUEST["zip"];

    $getNumber = "SELECT * FROM `user-address` where Number={$number}";
    $excgetNumber = $con->query($getNumber);
    if($excgetNumber->fetch_assoc() >= 1){
      echo "<script>alert('same Number');</script>";
    }
    else{
      echo "<script>alert('.$number.');</script>";
      $insertq = "INSERT INTO `user-address`(`uid`, `number`, `name`, `address`, `city`, `state`, `zip`) VALUES ('{$uid}','{$number}','{$name}','{$address}','{$city}','{$state}','{$zip}')";
      $excinsertq = $con->query($insertq);
      if($excinsertq){

          
        
          header("location:componet/addorder.php?num={$number}");
        // echo "inserted";
        } 
}
  }
?>