<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
class UserController{

    public function registerUser($username, $password){
        $database = new Database();
        $conn = $database->getConnection();

        $userRegistered = $database->registerUser($username, $password);
        if ($userRegistered){
            header("Location: ../../views/home.php");
        }

    }
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
    public static function addToFriends($friendId){
        session_start();
        $user = unserialize($_SESSION['user']);

        $userId = $user->getId();
        
    }
   
    


}


