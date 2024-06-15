<?php
require_once "Database.php";
class Comment{
private $id;
private $postId;
private $userId;
private $body;

public function __construct($id, $postId, $userId, $body)
{
$this->id = $id;    
$this->postId = $postId;    
$this->userId = $userId;
$this->body = $body;
}

public function getBody(){
    return $this->body;
}

}