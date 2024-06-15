<?php
require_once "../../models/User.php";
require_once "../../models/Post.php";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
    $user = unserialize($_SESSION['user']);
    $userId = $user->getId();
    $title = htmlspecialchars($_POST["title"]);
    $body = htmlspecialchars($_POST["body"]);

    if(Post::addPost($userId, $title, $body)){
        echo "Added post";
    }

}