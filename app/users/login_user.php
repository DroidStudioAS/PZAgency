<?php
require_once '../../models/Database.php';
require_once '../../models/User.php';
require_once '../../controllers/UserController.php';
require_once '../../controllers/AuthController.php';


if($_SERVER["REQUEST_METHOD"]=="GET"){
    $username = $_GET["username"];
    $pass = $_GET["password"];

    $auth = AuthController::loginUser($username, $pass);

    if($auth){
        header("Location: ../../views/home.php");
    }
    




}

?>