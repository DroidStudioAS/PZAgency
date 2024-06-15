<?php
require_once 'Database.php';
class User{
    //properties
    private $id;
    private $username;
    private $password;
    private $picture;

    public $friends = [];


public function __construct($id, $username, $password, $picture){
    $this->id = $id;
    $this->username=$username;
    $this->password=$password;
    $this->picture=$picture;
}
public function getId(){
    return $this->id;
}
public function getUsername(){
    return $this->username;
}
public function getFriends($id){
    $database = new Database();
    $conn=$database->getConnection();

    $stmt = $conn->prepare("SELECT friend_id FROM friends WHERE user_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all();
    foreach($result as $row){
        array_push($this->friends, $row[0]);
    }
    return $this->friends;
    //return $result==null? []:$result;
}

public static function getUsernameById($id){
    $database = new Database();
    $conn = $database->getConnection();

    $stmt = $conn->prepare("SELECT username FROM users WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results=$stmt->get_result()->fetch_assoc()['username'];
    
    return $results;
}




}
 
