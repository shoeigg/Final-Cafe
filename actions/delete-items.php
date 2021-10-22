<?php
include "../classes/item.php";

$item = new Item;

// this is used if you are passing the ID in the URL or address bar
// $user->deleteUser($_GET['user_id']);

// you use this if you are using forms
$item->deleteItems($_POST['item_id']);

?>