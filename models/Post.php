<?php
require_once "Database.php";
class Post{
    private $id;
    private $title;
    private $body;

    private $userId;

    public function __construct($id, $title, $body, $userId)
    {
        $this->id = $id ;    
        $this->title = $title;
        $this->body = $body;  
        $this->userId=  $userId;
    }

    public function getTitle(){
        return $this->title;
    }
    public function getBody(){
        return $this->body;
    }
    public function getUserId(){
        return $this->userId;
    }

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
    public function getUsernameById($id){
        $database = new Database();
        $conn = $database->getConnection();
    
        $stmt = $conn->prepare("SELECT username FROM users WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $results=$stmt->get_result()->fetch_assoc()['username'];
        
        return $results;
    }

}