<?php
   require_once "database.php";

   class Product extends Database{
        public function productSales($itemtype){
            $sql =  "SELECT * FROM cart INNER JOIN items ON cart.item_id = items.item_id WHERE items.type =$itemtype";
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
        public function ComputeTotales(){
            $sql = "SELECT * FROM cart";
    
            if($result = $this->conn->query($sql)){
                $rows = array();
                while($row = $result->fetch_assoc()){
                $rows[] = $row;
                }

                return $rows;
            } else {
                die("Error retrieving user: " . $this->conn->error);
            }
        }

    }
        

    


?>