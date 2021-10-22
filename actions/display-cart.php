<?php
include "../classes/item.php";


$item_id = $_POST["item"];
$num_items = $_POST["nums"];
$price = $_POST["price"];
$user_id = $_POST["user"];

// $target_dir = "assets/images/";
// $$target_file = $target_dir .basename($pic)$temp;

$item = new Item;
// $item->itemAdd($iname,$stock,$price,$pic,$tmp_file);
$item->displaycart($item_id,$num_items,$price,$user);
?>