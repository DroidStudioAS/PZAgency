<?php
class User{
    //properties
    private $id;
    private $username;
    private $password;
    private $picture;


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



}
 
