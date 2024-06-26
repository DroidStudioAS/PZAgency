<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
class UserController{
  public static function addToFriends($friendId){
        session_start();
        $user = unserialize($_SESSION['user']);
        $userId = $user->getId();
        //get a db instance
        $database = new Database();
        $conn=$database->getConnection();
        //check if is already in friends
        $stmt = $conn->prepare("SELECT id FROM friends WHERE user_id=? AND friend_id=?");
        $stmt->bind_param('ii', $userId,$friendId);
        $stmt->execute();
        $result=$stmt->get_result()->fetch_assoc();
        $stmt->close();
        //if result === null, he is not a friend
        if($result==null){
            $stmt=$conn->prepare("INSERT INTO friends (user_id, friend_id) VALUES(?,?)");
            $stmt->bind_param("ii",$userId,$friendId);
            //execute statement and http differ
            $inserted = $stmt->execute();
            if(!$inserted){
                //add message to session for error
            }
        }else{
            //remove him
            $stmt=$conn->prepare("DELETE FROM friends WHERE user_id=? AND friend_id=?");
            $stmt->bind_param("ii",$userId,$friendId);
            //execute statement and http differ
            $deleted = $stmt->execute();
            if(!$deleted){
                //add message to session for error
            }
        }

       
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        

        
    }
   
    


}


