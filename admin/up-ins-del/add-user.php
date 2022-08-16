<?php include_once("../../componet/conn.php"); ?>
<?php include_once("../../componet/func.php"); ?>


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
    <title>EZSOP - Add User</title>
</head>
<body>

      <div class="form">
      <div class="sign-up-form">
      

        <strong>ADD USER</strong>

        <form action="add-user.php" method="get">
            <input type="text" placeholder="Name" name="name" required>
            <input type="email" placeholder="xyz@gmail.com" name="email" required>
            <input type="password" placeholder="password" name="pwd" maxlength="15" required>

            <input type="submit" value="add user" name="adduser">
        </form>

   </div>
   </div>

</body>
</html>

<?php
    if(isset($_REQUEST["adduser"])){
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $pwd = $_REQUEST["pwd"];
        
        if(($name == "") ||($pwd == "")){
            echo "enter info";
        }
        else{
            echo "priint";
            $q1 = "SELECT * FROM `users` WHERE email='$email'";
            $checkemail = mysqli_query($con, $q1);
            if (mysqli_num_rows($checkemail) == 1) {
                echo "same email";
            }
            else{
                echo "inserting";
                insert($con,$_REQUEST); 
                header("location:../user.php");
            }
            
        }
    }
?>