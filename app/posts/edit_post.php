<?php
require_once "../validation/Validator.php";
require_once "../../models/Post.php";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $postId = htmlspecialchars($_POST["id"]); 
    $title = htmlspecialchars($_POST["title"]);
    $body = htmlspecialchars($_POST["body"]);

    if(!Validator::validatePost($postId,$title,$body)){
        session_start();
        $_SESSION['error']='You can not send empty data';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
    }
    if(!Post::editPost($postId,$title,$body)){
        session_start();
        $_SESSION['error']='Post was not edited';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        return;
    }
    unset($_SESSION["error"]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    

}