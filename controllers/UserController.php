<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
class UserController{

    public function checkIfUserAlreadyExists($username){
        $db = new Database();
        $conn=$db->getConnection();

        $stmt =$conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            return true;
        }
        //success
        return false;

    }
    public function registerUser(User $user){
        $database = new Database();
        $conn = $database->getConnection();

    }
    


}



?>