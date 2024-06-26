<?php
require_once "../../models/User.php";
require_once "../../models/Comment.php";
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
            unset($_SESSION["error"]);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }
    public static function getUserComments($userId){
        $database = new Database();
        $conn = $database->getConnection();

        $returnComments = [];

        $stmt = $conn->prepare("SELECT * FROM comments WHERE user_id=?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $comments = $stmt->get_result()->fetch_all();
        foreach($comments as $comment){
            $newComment = new Comment($comment[0], $comment[2], $comment[1], $comment[3]);
            array_push($returnComments, $newComment);
        }
        $_SESSION["comments"]=serialize($returnComments);
        header("Location: ../../views/comments.php");
    }
    public static function deleteComment ($commentId){
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare("DELETE FROM comments WHERE id=?");
        $stmt->bind_param("i", $commentId);
        $excecuted = $stmt->execute();
        if(!$excecuted){
            $_SESSION['comment_error']="Comment could not be deleted right now, please try again later";
        }
        header('Location: view_comments.php');
    }
    public static function editComment($commentId, $commentBody){
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare("UPDATE comments SET body=? WHERE id=?");
        $stmt->bind_param("si", $commentBody, $commentId);

        $res = $stmt->execute();
    
        if(!$res){
            $_SESSION['comment_error']="Comment Was Not Edited Please Try Again Later";
        }
        header("Location: view_comments.php");
    }
}