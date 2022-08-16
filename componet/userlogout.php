<?php
session_start();
    $_SESSION["login"] = false;
    $_SESSION["email"] = "hello";
    session_unset();
    session_destroy();
    header("location:../index.php");
?>