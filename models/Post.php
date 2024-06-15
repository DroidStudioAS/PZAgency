<?php
require_once "Database.php";
require_once 'Comment.php';
class Post{
    private $id;
    private $title;
    private $body;

    private $userId;

    private $comments = [];

    public function __construct($id, $title, $body, $userId)
    {
        $this->id = $id ;    
        $this->title = $title;
        $this->body = $body;  
        $this->userId= $userId;
    }

    public function getId(){
        return $this->id;    
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


    public function getUsernameById($id){
        $database = new Database();
        $conn = $database->getConnection();
    
        $stmt = $conn->prepare("SELECT username FROM users WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $results=$stmt->get_result()->fetch_assoc()['username'];
        
        return $results;
    }

    public static function addPost($userId, $title, $body){
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare("INSERT INTO posts (user_id, title, body) VALUES (?,?,?)");
        $stmt->bind_param("iss", $userId, $title, $body);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public static function getComments($postId){
        $comments = [];
        $database = new Database();
        $conn = $database->getConnection();

        $stmt = $conn->prepare("SELECT * FROM comments WHERE post_id=?");
        $stmt->bind_param('i',$postId);
        $stmt->execute();
        $result = $stmt->get_result();

       while($row=$result->fetch_assoc()){
            $comment = new Comment($row['id'], $row["post_id"], $row["user_id"], $row["body"]);
            array_push($comments, $comment);
       }

        return $comments;        


    }

}