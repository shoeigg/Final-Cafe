<?php
   require_once "database.php";

   class Comment extends Database{
        public function AddComment($user_comment,$item_id){
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO comment(user_comment,item_id) VALUES ('$user_comment',
            '$item_id')";
            if($result = $this->conn->query($sql)){
                header("Location: ../cart.php");
            } else {
                die("Error retrieving comment: " . $this->conn->error);     
            }
        }
        public function getComments($item_id){
            // use INNER JOIN to query both comments and user table
            // the common column of the two tables is user_id
            $sql =  "SELECT * FROM comment INNER JOIN item_id
            　ON user.user_id = comment.item_id WHERE user.photo = $item_id";
            if($result = $this->conn->query($sql)){
                $rows = array();
                while($row = $result->fetch_assoc()){
                $rows[] = $row;
                }

                return $rows;
            } else {
                die("Error retrieving all comments: " . $this->conn->error);
            }
        }
    }


?>