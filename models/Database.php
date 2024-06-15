<?php
class Database{
   // Properties
   private $servername;
   private $username;
   private $password;
   private $dbname;
   private $conn;

   public function __construct(){
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "BlogBook";

    // Create connection
    $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

    // Check connection
    if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
    }
   }
   public function getConnection(){
    return $this->conn;
   }
   public function registerUser($username, $password){


    $stmt = $this->conn->prepare("INSERT INTO Users (username, password, profile_picture) VALUES (?,?,?)");

    $stmt->bind_param("sss",$username, $password, $username);
    if($stmt->execute()){
        return true;
    }
    return false;
 
   }
}
