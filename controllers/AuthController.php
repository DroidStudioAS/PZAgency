<?php
require_once "../../models/Database.php";
class AuthController{
  
       public static function loginUser($username, $pass){
            $database = new Database();
            $conn = $database->getConnection();
            $stmt = $conn->prepare("SELECT id, username, password FROM Users WHERE username = ?");
            $stmt->bind_param('s', $username);
    
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
    
            $dbPass = $result["password"];
    
            if(!password_verify($pass, $dbPass)){
                var_dump($pass);
                var_dump($dbPass);
                return false;
            }
            
            $user = new User( $result['id'], $username, $dbPass, strtolower($username));
            session_start();
            $_SESSION['user'] = serialize($user);
    
    
           return true;
            
           
       }
       public static function registerUser($username, $password, $unhashedPass){
        $database = new Database();
        $userRegistered = $database->registerUser($username, $password);
        return $database->loginUser($username, $unhashedPass);

    }
    public static function checkIfUserAlreadyExists($username){
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

}
