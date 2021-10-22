<?php
    include "classes/comment.php";
    $user_comment = $_POST['comment'];
    $item_id = $_POST['item_id'];


    $comment = new Comment;
   

    $comment->AddComment($user_comment,$item_id);
?>