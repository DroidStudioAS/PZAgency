<?php

require_once "../models/Database.php";
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
    public static function deletePost($postId){
        $db= new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("DELETE FROM posts WHERE post_id=?");
        $stmt->bind_param("i",$postId);
        if(!$stmt->execute()){
            return false;
        }

        return true;
    }
}