<?php include_once("componet/conn.php"); ?>
<?php include_once("componet/func.php"); ?>

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
    <link rel="stylesheet" href="style-login-sign.css">
    <link rel="stylesheet" href="style-res.css">
    <title>EZSOP - login</title>
</head>

<body>
    
    <form action="login.php" method="post">
    <div class="form-bg"></div>
    <div class="form">
        <div class="login-form">
            <strong>Log In</strong>
            <form>
                <input type="email" placeholder="xyz@gmail.com" name="email" required>
                <input type="password" placeholder="password" name="pwd" maxlength="15" required>
                <input type="submit" value="Log In" name="loginbtn">
            </form>
            <div class="form-btns">
                <!-- <a href="#" class="forget">Forget Your Password</a> -->
                <a href="signup.php" class="sign-up-btn">Create Account</a>
            </div>
        </div>
    </div>
    </form>
</body>
</html>
<?php
    if(isset($_REQUEST["loginbtn"])){
        $email = $_REQUEST["email"];
        $pwd = $_REQUEST["pwd"];
        
        $sq = "select * from users where email='{$email}';";
        $exc = $con -> query($sq);
        
        if(mysqli_num_rows($exc) == 1){
            $data = mysqli_fetch_assoc($exc);
            if(password_verify($pwd,$data["password"])){
                session_start();
                $_SESSION["login"] = true;
                $_SESSION["name"] = $data["name"];
                $_SESSION["id"] = $data["id"];
                header("location:index.php"); 
            }
        }
    }
?>