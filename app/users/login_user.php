<?php
require '../../models/Database.php';
require '../../models/User.php';
require '../../controllers/UserController.php';


if($_SERVER["REQUEST_METHOD"]=="GET"){
    $database = new Database();
    $conn = $database->getConnection();

    $username = $_GET["username"];
    $pass = $_GET["password"];

    $auth = $database->loginUser($username, $pass);
    if($auth){
        header("Location: ../../views/home.php");
    }
    




}

?>