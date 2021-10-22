<?php
    require_once "database.php";

    class User extends Database{
        public function createUser($first_name, $last_name, $uname, $pass){
            // encrypting the password using password_hash()
            // PASSWORD_DEFAULT is the encrypting method that we are using
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(first_name, last_name, user_name, password)
                    VALUES ('$first_name', '$last_name', '$uname', '$pass')";
            
            // execute the SQL statement
            // $conn->query($sql)
            if($this->conn->query($sql)){
                header("Location: ../login.php");
            }else{
                die("Error in creating the user: " .$this->conn->error);
            }
        }
    
    public function login($uname, $pass){
        $sql = "SELECT * FROM users WHERE user_name = '$uname'";
        $result = $this->conn->query($sql);

        if($result == TRUE){
            // this checks if the username existed
            if($result->num_rows == 1){
                // checks if the password entered by the user is the same with the password in the table
                $user_details = $result->fetch_assoc();

                if(password_verify($pass, $user_details['password'])){
                    
                    $_SESSION['user_id'] = $user_details['user_id'];
                    $_SESSION['user_name'] = $user_details['user_name'];
                    $_SESSION['status'] = $user_details['status'];

                    if($user_details['status'] == 'A')
                        header("location: ../dashboard.php");
                    else
                        header("location: ../profile.php");
                }else{
                    die("Incorrect password");
                }
            }else{
                die("Username not found.");
            }
        }else{
            die("Error in logging in: " .$this->conn->error);
        }
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM users";

        // if($result = $this->conn->query($sql)){
        //     // expecting one or more rows
        //     return $result;
        // } else {
        //     die("Error retrieving all users: " . $this->conn->error);
        // }

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

    public function getUser($user_id){
        $sql = "SELECT * FROM users WHERE user_id = $user_id";

        if($result = $this->conn->query($sql)){
            // expecting one row only
            return $result->fetch_assoc();
        } else {
            die("Error retrieving user: " . $this->conn->error);
        }
    }

    public function deleteUser($user_id){
        $sql = "DELETE FROM users WHERE user_id = $user_id";

        if($this->conn->query($sql)){
            header("location: ../dashboard.php");
            exit;
        } else {
            die("Error deleting user: " . $this->conn->error);
        }
    }

    public function updateUser($user_id, $first_name, $last_name, $username){
        $sql = "UPDATE users   
                SET first_name = '$first_name', 
                    last_name = '$last_name', 
                    user_name = '$username' 
                WHERE user_id = $user_id";

        if($this->conn->query($sql)){
            header("location: ../dashboard.php");
        } else {
            die("Error updating user: " . $this->conn->error);
        }
    }

    public function updateComment($user_id,$comment){
        $sql = "UPDATE users   
                SET 
                    comment = '$comment'
                WHERE `user_id` = $user_id";

        if($this->conn->query($sql)){
            header("location: ..");
            exit;
        } else {
            die("Error updating user: " . $this->conn->error);
        }
    }
   


    public function uploadPhoto($user_id, $photo_name, $tmp_name){
        $sql = "UPDATE users SET photo = '$photo_name' WHERE `user_id` = $user_id";

        // Step 1: Update the PHOTO column
        if($this->conn->query($sql)){
            // Step 2: Move the file to our server
            $destination = "../images/$photo_name";
            if(move_uploaded_file($tmp_name, $destination)){
                header("location: ../profile.php");
                exit;
            } else {
                die("Error moving the photo.");
            }
        } else {
            die("Error uploading photo: " . $this->conn->error);
        }
    }

    


}
?>