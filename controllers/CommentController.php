<?php
require_once "../../models/User.php";
require_once "../../models/Database.php";
require_once "../../app/validation/Validator.php";


class CommentController{
    public function addComment($body, $postId){
        session_start();
        $user = unserialize($_SESSION['user']);

        $userId = $user->getId();
        //check if body is valid
        if(!Validator::validateCommentBody($body)){
            session_start();
            $_SESSION['error']='Comment must be longer then 0 charachters and smaller then 500 charachters';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return;
        };
        $database = new Database();
        $conn=$database->getConnection();
        $stmt = $conn->prepare("INSERT INTO comments (user_id, post_id, body) VALUES (?,?,?)");
        $stmt->bind_param("iis", $userId, $postId, $body);
        if($stmt->execute()){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }
}