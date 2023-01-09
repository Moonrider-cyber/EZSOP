<?php include_once("../componet/conn.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../loginsignup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <style>
        .form{
            margin: 0 27%;
        }
        .section .container .right-side .forms input{
            background-color: white;
            border: none;
            border-bottom: 1px black solid;
            padding-left: 60px;
            width: 80%;
        }
        .section .container .right-side .forms input:focus {
            border: none;
            border-bottom: 1px black solid;
        }
        .section .container .right-side .forms input[type="submit"]{
            margin-top: 30px;
            width: 95%;
            padding: 0px;
        }
        .form-inputs i{
            left: 15px;
            right: unset;
        }
    </style>
    <title>EZSOP - Admin Login</title>
</head>
<body>
    <div class="section">
        <div class="container">
            <div class="form">
                <!-- <div class="left-side">
                    <div class="content">
                        <h1>EZSOP</h1>
                        <h5>Welcome Back</h5>
                        
                            <img src="../img/loginbg.png" width="300">
                    </div>
                    <div class="social">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <ul class="terms">
                            <li><a href="#">Terms</a></li>
                            <li><span class="dots"></span></li>
                            <li><a href="#">Services</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="right-side">
                    <form action="admin-login.php" method="post">
                        <div class="forms">
                            <h1 class="forms-heading">Admin Login</h1>
                            <!-- <div class="form-inputs"> <i class="fa fa-user"></i> <input type="text" placeholder="User name"> 
                            </div> -->
                            <div class="form-inputs">
                                <i class="fa fa-envelope"></i> 
                                <input type="email" placeholder="Email" autocomplete='chrome-off' name="email" required>
                            </div>
                            <div class="form-inputs"> 
                                <i class="fa fa-eye" id="password_eye"></i>
                                <input class="password-input"  type="password" placeholder="Password" name="pwd" maxlength="30" required>
                            </div>

                            <div class="submit-button"> 
                                <input type="submit" value="Login" name="adminloginbtn"> 
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 

<?php
    if(isset($_REQUEST["adminloginbtn"])){
        $email = $_REQUEST["email"];
        $pwd = $_REQUEST["pwd"];
        
        $sq = "select * from admins where email='{$email}' and password='{$pwd}';";
        $exc = $con -> query($sq);
        
        if(mysqli_num_rows($exc) == 1){
            $data = mysqli_fetch_assoc($exc);
            
                session_start();
                $_SESSION["adminlogin"] = "adlog";
                $_SESSION["name"] = $data["name"];
                header("location:index.php");
            
        }
    }
?>
