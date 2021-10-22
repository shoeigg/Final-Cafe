<?php
   require_once "database.php";

   class Cart extends Database{
       public function displayCart(){
            // this code is used if we combine two or more tables
            // ON cart.item_id = items.item_id <--- youa re making a bridge between the two table on the common column which is item_id

            // get the user_id of the person who logged in
            // take note the user_id is saved in session already
            // getting the value FROM COMPUTER and giving it to PHP variable
            $user_id = $_SESSION['user_id'];
            // add the WHERE command in the current sql statement
            // WHERE primaryKeyColumn = user_id from session
           $sql = "SELECT * FROM cart INNER JOIN items
                    ON cart.item_id = items.item_id WHERE cart.user_id = '$user_id'";
           if($result = $this->conn->query($sql)){
            $rows = array();
            while($row = $result->fetch_assoc()){
               $rows[] = $row;
            }

            return $rows;
        } else {
            die("Error retrieving all cart: " . $this->conn->error);
        }
       }
   }

   

   
?>