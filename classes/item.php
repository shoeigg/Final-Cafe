<?php
    require_once "database.php";

    class Item extends Database{
        public function getAllCoffee(){
            $sql = "SELECT * FROM items WHERE type='coffee'";
            
            if($result = $this->conn->query($sql)){
                $rows = array();
                while($row = $result->fetch_assoc()){
                   $rows[] = $row;
                }

                return $rows;
            } else {
                die("Error retrieving all users: " . $this->conn->error);
            }
        }
        

        public function getAllMainDish(){
            $sql = "SELECT * FROM items WHERE type='maindish'";
            
            if($result = $this->conn->query($sql)){
                $rows = array();
                while($row = $result->fetch_assoc()){
                   $rows[] = $row;
                }

                return $rows;
            } else {
                die("Error retrieving all users: " . $this->conn->error);
            }
        }

        public function getAllDrinks(){
            $sql = "SELECT * FROM items WHERE type='drinks'";
            
            if($result = $this->conn->query($sql)){
                $rows = array();
                while($row = $result->fetch_assoc()){
                   $rows[] = $row;
                }

                return $rows;
            } else {
                die("Error retrieving all users: " . $this->conn->error);
            }
        }

        public function getAllDesserts(){
            $sql = "SELECT * FROM items WHERE type='desserts'";
            
            if($result = $this->conn->query($sql)){
                $rows = array();
                while($row = $result->fetch_assoc()){
                   $rows[] = $row;
                }

                return $rows;
            } else {
                die("Error retrieving all users: " . $this->conn->error);
            }
        }

        
        public function getItem($item_id){
            $sql = "SELECT * FROM items WHERE item_id = $item_id";
    
            if($result = $this->conn->query($sql)){
                // expecting one row only
                return $result->fetch_assoc();
            } else {
                die("Error retrieving user: " . $this->conn->error);
            }
        }
        public function itemAdd($iname,$stock,$price,$photo,$tmp_name,$type){
            $sql = "INSERT INTO items(item_name,item_stock,item_price,item_photo,type) VALUES ('$iname','$stock',
            '$price','$photo','$type')";
            $result = $this->conn->query($sql);

            if($result){
                $target_file = "../images/$photo";
                if(move_uploaded_file($tmp_name,$target_file)){
                    header("location: ../item.php");
                    // echo $type;
                }else{
                    die("Error moving the photo.");
                }
            }else{
                die("Error inserting the image: " . $this->conn->error);
            }
                
            
        }
        public function deleteItems($item_id){
            $sql = "DELETE FROM items WHERE item_id = $item_id";
    
            if($this->conn->query($sql)){
                header("location: ../add-items.php");
                exit;
            } else {
                die("Error deleting item: " . $this->conn->error);
            }
        }

        public function updateItems($item_id,$iname,$stock,$price){
            $sql = "UPDATE items   
                    SET 
                       item_name = '$iname', 
                       item_stock = '$stock', 
                       item_price = '$price' 
                       
                    WHERE item_id = $item_id";
    
            if($this->conn->query($sql)){
                header("location: ../add-items.php");
            } else {
                die("Error updating item: " . $this->conn->error);
            }
        }
     
        public function cartAdd($item,$nums,$price,$user){
           $user_id =$_SESSION['user_id'];
            $sql = "INSERT INTO cart(item_id,num_items,price,user_id) VALUES ('$item',
            '$nums','$price',$user)";
            $result = $this->conn->query($sql);
            if($result){
                    header("location: ../cart.php");
            }else{
                die("Error inserting the item: " . $this->conn->error);
            }
                
            
        }

        public function displaycart($cart,$item,$nums,$price,$user){
            $user_id =$_SESSION['user_id'];
             $sql = "INSERT INTO cart(cart_id,item_id,num_items,price,user_id) VALUES ('$cart','$item',
             '$nums','$price',$user)";
             $result = $this->conn->query($sql);
             if($result){
                     header("location: ../item.php");

             }else{
                 die("Error inserting the item: " . $this->conn->error);
             }
                 
             
         }



    }

    

?>  