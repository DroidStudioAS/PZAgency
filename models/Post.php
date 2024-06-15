<?php
require_once "Database.php";
class Post{
    private $id;
    private $title;
    private $body;

    public function __construct($id, $title, $body)
    {
        $this->id = $id ;    
        $this->title = $title;
        $this->body = $body;    
    }

    public function getTitle(){
        return $this->title;
    }
    public function getBody(){
        return $this->body;
    }

    public static function get10LastPosts(){
        $db= new Database();
        $conn = $db->getConnection();

        $posts = [];
        $stmt = $conn->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 10");
        $stmt->execute();
        $res = $stmt->get_result();
        foreach($res as $post){
            $newPost = new Post($post['id'], $post['title'], $post['body']);
            array_push($posts,$newPost);
        }
        return $posts;

    }

}