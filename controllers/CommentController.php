<?php
require_once "../../models/User.php";
require_once "../../models/Database.php";

class CommentController{
    public function addComment($body, $postId){
        session_start();
        $user = unserialize($_SESSION['user']);

        $userId = $user->getId();
        
        $database = new Database();
        $conn=$database->getConnection();
        $stmt = $conn->prepare("INSERT INTO comments (user_id, post_id, body) VALUES (?,?,?)");
        $stmt->bind_param("iis", $userId, $postId, $body);
        if($stmt->execute()){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }
}