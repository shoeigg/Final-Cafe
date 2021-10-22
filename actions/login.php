<?php
    include "../classes/user.php";

    $uname = $_POST["username"];
    $pass = $_POST["password"];

    $user = new User;

    $user->login($uname, $pass);
?>