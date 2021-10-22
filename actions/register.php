<?php
    // user.php <-- contains your sql statement
    include "../classes/user.php";

    // getting/gathering of data entered by the user in the register form
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $uname = $_POST["username"];
    $pass = $_POST["password"];

    // object for the class User
    $user = new User;

    // calling of the inser method in the User class
    $user->createUser($first_name, $last_name, $uname, $pass);
?>