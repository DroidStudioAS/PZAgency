<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
require_once '../../controllers/UserController.php';


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