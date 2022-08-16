<?php include_once("../../componet/conn.php"); ?>

<?php
$id = "";
$name = "";
$email =  "";
$password = "";
if(isset($_REQUEST["uid"])){
    $sq="select * from users where id={$_REQUEST["uid"]}";
    $exc = mysqli_query($con,$sq);
    if($exc){
        $rows = mysqli_fetch_assoc($exc);
        $id = $rows["id"];
        $name = $rows["name"];
        $email = $rows["email"];
        $password = $rows["password"];
    }
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Acme&family=Barlow:wght@500&family=Quicksand:wght@500&family=
        Raleway:wght@300&family=Ubuntu:wght@700&display=swap"rel="stylesheet">
    <!-- fonts -->
    <!-- links -->
    
    <link rel="stylesheet" href="../../style-login-sign.css">
    <link rel="stylesheet" href="../../style-res.css">
    <title>EZSOP - update user</title>
</head>
<body>

      <div class="form">
      <div class="sign-up-form">
      

        <strong>update user</strong>

        <form action="update-user.php" method="get">
            <input type="text" placeholder="id" name="id" value="<?php echo $id ?>" readonly>
            <input type="text" placeholder="Name" name="name" value="<?php echo $name ?>" required>
            <input type="email" placeholder="xyz@gmail.com" name="email" value="<?php echo $email ?>" required>
            <!-- <input type="password" placeholder="update password" name="pwd" maxlength="15" > -->

            <input type="submit" value="update user" name="updateuser">
        </form>

   </div>
   </div>

</body>
</html>

<?php
    if(isset($_REQUEST["updateuser"])){
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $id = $_REQUEST["id"];
        
        if(($name == "") ||($email == "")){
            echo "enter info";
        }
        else{
                $updq = "update `users` set name='{$name}',email='{$email}' where id={$id};";
                $con -> query($updq); 
                header("location:../user.php");
            
            
        }
    }
?>