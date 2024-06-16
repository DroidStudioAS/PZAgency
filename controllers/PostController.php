<?php

require_once "../models/User.php";
require_once "../models/Post.php";

class PostController{
    public static function get10LastPosts(){
        $db= new Database();
        $conn = $db->getConnection();

        $posts = [];
        $stmt = $conn->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 10");
        $stmt->execute();
        $res = $stmt->get_result();
        foreach($res as $post){
            $newPost = new Post($post['id'], $post['title'], $post['body'], $post["user_id"]);
            array_push($posts,$newPost);
        }
        return $posts;

    }
    public static function getPostsByOtherUser($userId){
       $posts = Post::getUsersPosts($userId);
        
        session_start();
        $_SESSION["posts"] = serialize($posts);

        header("location ../views/relevent.php");
    }
}