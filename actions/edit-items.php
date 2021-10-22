<?php
    include "../classes/item.php";
  
    $item_id   = $_POST["item_id"];
    $item_name = $_POST["iname"];
    $item_stock = $_POST["stock"];
    $item_price = $_POST["price"];
   
    $item = new Item;

    $item->updateItems($item_id,$item_name,$item_stock,$item_price);
?>
