<?php
    session_start();

    include "../classes/user.php";

    $user_id = $_SESSION['user_id'];
    $photo_name = $_FILES['photo']['name'];
    // $photo_name = "apricot.jpeg";
    $tmp_name = $_FILES['photo']['tmp_name'];
    // $tmp_name = "C:\xampp\tmp\php16F7.tmp";

    $user = new User;
    $user->uploadPhoto($user_id, $photo_name, $tmp_name);
?>