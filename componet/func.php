<?php
    function insert($con,$data){
        $name = $data["name"];
        $email = $data["email"];
        $pwd = $data["pwd"];
        $safepwd=password_hash($pwd, PASSWORD_DEFAULT);
        $insq = "INSERT INTO `users`(`name`, `password`, `email`) VALUES ('{$name}','{$safepwd}','{$email}');";
        $con -> query($insq);
    }
?>