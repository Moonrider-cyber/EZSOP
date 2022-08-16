<?php
     $_SESSION["adminlogin"] = "adlogout";
     session_unset();
     session_destroy();
     header("location:../admin-login.php");
?>