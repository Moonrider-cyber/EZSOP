<?php include_once("componet/conn.php"); ?>

<?php
    $error = false;
    if(isset($_REQUEST["signsubmit"])){
        $name = $_REQUEST["name"];
        $email = $_REQUEST["email"];
        $pwd = $_REQUEST["pwd"];
        
        if(($name == "") ||($pwd == "")){
            echo "enter info";
        }
        else{
            $q1 = "SELECT * FROM `users` WHERE email='$email'";
            $checkemail = mysqli_query($con, $q1);
            if (mysqli_num_rows($checkemail) == 1) {
                $error = true;
            }
            else{
                $name = $_REQUEST["name"];
                $email = $_REQUEST["email"];
                $pwd = $_REQUEST["pwd"];
                $safepwd=password_hash($pwd, PASSWORD_DEFAULT);
                $insq = "INSERT INTO `users`(`name`, `password`, `email`) VALUES ('{$name}','{$safepwd}','{$email}');";
                $con -> query($insq); 
                header("location:login.php");
            }
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginsignup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>EZSOP - Sign Up</title>
</head>
<body>
    <?php
    if($error){
        
        echo '
        <div class="alertbox">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> Email Already Exist
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>';
    }
?>
<div class="section">
        <div class="container">
            <div class="form">
                <div class="left-side">
                    <div class="content">
                        <h1>EZSOP</h1>
                        <h5>Shop with confidence</h5>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>  -->
                            <img src="img/loginbg.png" width="300">
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
                </div>
                <div class="right-side">
                    <form action="signup.php" method="post">
                        <div class="forms">
                            <h1 class="forms-heading">Sign Up</h1>
                            <div class="form-inputs"> 
                                <i class="fa fa-user"></i> 
                                <input type="text" placeholder="User name" name="name" required> 
                            </div>
                            <div class="form-inputs"> 
                                <input type="email" placeholder="Email" autocomplete='chrome-off' name="email" required>
                                <i class="fa fa-envelope"></i> 
                            </div>
                            <div class="form-inputs"> 
                                <input class="password-input" autocomplete='chrome-off' type="password" placeholder="Password" name="pwd" required>
                                <i class="fa fa-eye" id="password_eye"></i>
                            </div>

                            <div class="submit-button"> 
                                <input type="submit" name="signsubmit"> 
                            </div>
                            
                            <div class="form-acc">
                                <p>Already have account?</p><a href="login.php">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>  