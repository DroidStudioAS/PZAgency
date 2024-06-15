<?php
require_once 'User.php';
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
   public function loginUser($username, $pass){
        $stmt = $this->conn->prepare("SELECT id, username, password FROM Users WHERE username = ?");
        $stmt->bind_param('s', $username);

        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        $dbPass = $result["password"];

        if(!password_verify($pass, $dbPass)){
            return false;
        }
        
        $user = new User( $result['id'], $username, $dbPass, strtolower($username));
        session_start();
        $_SESSION['user'] = serialize($user);


       return true;
        
       
   }
}
