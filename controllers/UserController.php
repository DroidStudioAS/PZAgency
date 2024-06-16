<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
class UserController{

    public function registerUser($username, $password, $unhashedPass){
        $database = new Database();
        $conn = $database->getConnection();

        $userRegistered = $database->registerUser($username, $password);
        
        return $database->loginUser($username, $unhashedPass);

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
        //get a db instance
        $database = new Database();
        $conn=$database->getConnection();
        //prepare statement
        $stmt=$conn->prepare("INSERT INTO friends (user_id, friend_id) VALUES(?,?)");
        $stmt->bind_param("ii",$userId,$friendId);
        //execute statement and http differ
        $inserted = $stmt->execute();
        if(!$inserted){
            //add message to session for error
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        

        
    }
   
    


}


