<?php
include "../classes/user.php";

$user = new User;

// this is used if you are passing the ID in the URL or address bar
// $user->deleteUser($_GET['user_id']);

// you use this if you are using forms
$user->deleteUser($_POST['user_id']);

?>