<?php
   require_once "database.php";

   class Comment extends Database{
        public function AddComment($user_comment,$item_id){
            $user_id = $_SESSION['user_id'];
            $sql = "INSERT INTO comment(user_comment,item_id,user_id) VALUES ('$user_comment',
            '$item_id','$user_id')";
            if($result = $this->conn->query($sql)){
                header("Location: ../.php");
            } else {
                die("Error retrieving comment: " . $this->conn->error);     
            }
        }
        public function getComments($item_id){
            // use INNER JOIN to query both comments and user table
            // the common column of the two tables is user_id
            $sql =  "SELECT * FROM users INNER JOIN comment ON users.user_id = comment.user_id WHERE comment.item_id='$item_id'";
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

        public function getCommentsOfUser($user_id){
            $sql =  "SELECT * FROM comment INNER JOIN items ON comment.item_id = items.item_id  WHERE  comment.user_id = $user_id";
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